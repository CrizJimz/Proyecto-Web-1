<?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        // ... lo mandamos de patitas a la calle (al login)
        header("Location: iniciar_sesion.php");
        exit(); // Matamos el código aquí para que no cargue nada más
    }
    include ('./logic/conexion.php');


    $consultaSql = "SELECT * FROM usuarios";

    $resultado = $conexion->query($consultaSql);

    if($resultado){}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        body {
            background-color: #f5f7f9; 
            color: #4a4a4a;
        }
        .card-panel {
            border-radius: 8px; 
        }
        thead {
            background-color: #e0f2f1;
            color: #00695c;
        }
    </style>
</head>
<body>

    <nav class="teal lighten-1">
        <div>
            <a href="#" class="brand-logo center ">Administración de Usuarios</a>
        </div>
    </nav>

    <div class="container" style="margin-top: 30px;">
        <div class="row">

            <div class="col s12 l4">
                <div class="card-panel white z-depth-2">
                    <h5 class="center teal-text text-lighten-1" >Registrar Usuario</h5>
                    <div class="divider"></div>
                    <br>
                    <form action="./logic/create.php" method="POST">
                        
                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="nombre" name ="nombre" type="text" class="validate" required>
                            <label for="nombre">Nombre Completo</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input id="email" name="email" type="email" class="validate" required>
                            <label for="email">Correo Electrónico</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">phone</i>
                            <input id="telefono" name="telefono" type="tel" class="validate" pattern="[0-9]{10,}">
                            <label for="telefono">Teléfono</label>
                        </div>

                        <div class="center-align" style="margin-top: 20px;">
                            <button class="btn waves-effect waves-light teal lighten-1" type="submit">
                                Guardar
                                <i class="material-icons right">save</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>  

            <div class="col s12 l8">
                <div class="card-panel white z-depth-1">
                    <h5 class="center teal-text text-lighten-1">Usuarios</h5>
                    <br>
                    <table class="highlight responsive-table centered white">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultado->fetch_assoc()){ 
                                $id = $row['id']; // Variable auxiliar para limpiar el código
                            ?>   
                            <tr id="row-<?php echo $id;?>">
                                
                                <td><?php echo $id;?></td> 
                                
                                <td>
                                    <span class="display-mode"><?php echo $row['nombre'];?></span>
                                    <input type="text" id="nombre-<?php echo $id;?>" value="<?php echo $row['nombre'];?>" class="edit-mode browser-default" style="display:none; width: 100%; height: 30px;">
                                </td>

                                <td>
                                    <span class="display-mode"><?php echo $row['email'];?></span>
                                    <input type="email" id="email-<?php echo $id;?>" value="<?php echo $row['email'];?>" class="edit-mode browser-default" style="display:none; width: 100%; height: 30px;">
                                </td>

                                <td>
                                    <span class="display-mode"><?php echo $row['telefono'];?></span>
                                    <input type="tel" pattern="[0-9]{10,}" id="telefono-<?php echo $id;?>" value="<?php echo $row['telefono'];?>" class="edit-mode browser-default" style="display:none; width: 100%; height: 30px;">
                                </td>
                                
                                <td>
                                    <a href="javascript:void(0)" id="btn-edit-<?php echo $id;?>" class="btn-floating btn-small waves-effect waves-light deep-purple lighten-2" onclick="habilitarEdicion(<?php echo $id; ?>)">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <a href="javascript:void(0)" id="btn-save-<?php echo $id;?>" class="btn-floating btn-small waves-effect waves-light green" style="display:none;" onclick="guardarCambios(<?php echo $id; ?>)">
                                        <i class="material-icons">save</i>
                                    </a>

                                    <a href="javascript:void(0)" id="btn-cancel-<?php echo $id;?>" class="btn-floating btn-small waves-effect waves-light grey" style="display:none;" onclick="cancelarEdicion(<?php echo $id; ?>)">
                                        <i class="material-icons">close</i>
                                    </a>

                                    <a href="./logic/delete.php?id=<?php echo $id; ?>" class="btn-floating btn-small waves-effect waves-light red darken-2" onclick="return confirm('¿Seguro que deseas eliminar?');">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a href="logic/salir.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">exit_to_app</i></a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Inicialización de componentes si fuera necesario
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Selecciona todos los elementos con la clase 'fixed-action-btn'
            var fab_elems = document.querySelectorAll('.fixed-action-btn');
            
            // Opciones de inicialización (puedes omitir 'direction' para el valor por defecto 'top')
            var options = {
                direction: 'left', // Por ejemplo, para que los botones secundarios se abran hacia la izquierda
                hoverEnabled: false // O true, según prefieras que se active al hacer hover o solo al hacer click
            };
            
            // Inicializa el/los Floating Action Button/s
            var fab_instances = M.FloatingActionButton.init(fab_elems, options);
            
            // Nota: Las variables 'fab_elems' y 'fab_instances' contendrán los elementos y las instancias, respectivamente.
            // No es necesario llamar a getInstance() inmediatamente a menos que vayas a usar la API.
        });

        // La otra línea "var instance = M.FloatingActionButton.getInstance(elem);" no es necesaria aquí y fallaría sin 'elem' definido.
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        // Variable global para rastrear qué fila se está editando
        let filaEnEdicion = null;

        // Función para habilitar los campos
        function habilitarEdicion(id) {
            // --- LÓGICA DE EDICIÓN ÚNICA ---
            // Si ya hay una fila abierta y es diferente a la actual...
            if (filaEnEdicion !== null && filaEnEdicion !== id) {
                // ...la cerramos automáticamente (se pierden cambios no guardados en esa fila)
                cancelarEdicion(filaEnEdicion);
            }
            
            // Actualizamos la variable global con el ID actual
            filaEnEdicion = id;
            // -------------------------------

            document.querySelectorAll(`#row-${id} .display-mode`).forEach(el => el.style.display = 'none');
            document.querySelectorAll(`#row-${id} .edit-mode`).forEach(el => el.style.display = 'block');

            document.getElementById(`btn-edit-${id}`).style.display = 'none';
            document.getElementById(`btn-save-${id}`).style.display = 'inline-block';
            document.getElementById(`btn-cancel-${id}`).style.display = 'inline-block';
        }

        // Función para cancelar edición
        function cancelarEdicion(id) {
            // Limpiamos la variable global porque ya no se está editando nada
            if (filaEnEdicion === id) {
                filaEnEdicion = null;
            }

            // Revertir visualmente
            document.querySelectorAll(`#row-${id} .display-mode`).forEach(el => el.style.display = 'inline');
            document.querySelectorAll(`#row-${id} .edit-mode`).forEach(el => el.style.display = 'none');

            document.getElementById(`btn-edit-${id}`).style.display = 'inline-block';
            document.getElementById(`btn-save-${id}`).style.display = 'none';
            document.getElementById(`btn-cancel-${id}`).style.display = 'none';
            
            // Opcional: Resetear los inputs al valor original por si el usuario escribió algo y canceló
            // (Esto evita que al volver a abrir aparezca lo que escribió antes)
            const originalNombre = document.querySelector(`#row-${id} td:nth-child(2) .display-mode`).innerText;
            const originalEmail = document.querySelector(`#row-${id} td:nth-child(3) .display-mode`).innerText;
            const originalTel = document.querySelector(`#row-${id} td:nth-child(4) .display-mode`).innerText;
            
            document.getElementById(`nombre-${id}`).value = originalNombre;
            document.getElementById(`email-${id}`).value = originalEmail;
            document.getElementById(`telefono-${id}`).value = originalTel;
        }

        // Función para guardar cambios con VALIDACIONES
        function guardarCambios(id) {
            const nombre = document.getElementById(`nombre-${id}`).value.trim();
            const email = document.getElementById(`email-${id}`).value.trim();
            const telefono = document.getElementById(`telefono-${id}`).value.trim();

            // --- 1. VALIDACIÓN DE CAMPOS VACÍOS ---
            if (nombre === '' || email === '') {
                M.toast({html: 'El nombre y correo son obligatorios', classes: 'red darken-2'});
                return;
            }

            // --- 2. VALIDACIÓN DE FORMATO EMAIL (@ y punto) ---
            // Expresión regular simple para email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                M.toast({html: 'Ingresa un correo válido (ejemplo@correo.com)', classes: 'orange darken-2'});
                return; // Detiene la función
            }

            // --- 3. VALIDACIÓN DE TELÉFONO (Solo números, mín 10 dígitos) ---
            // Esto cumple tu requerimiento de pattern="[0-9]{10,}"
            const telefonoRegex = /^[0-9]{10,}$/;
            
            // Solo validamos si escribió algo (si el teléfono es opcional)
            // Si es obligatorio, quita la parte de (telefono !== '' && ...)
            if (telefono !== '' && !telefonoRegex.test(telefono)) {
                M.toast({html: 'El teléfono debe tener al menos 10 números', classes: 'orange darken-2'});
                return; // Detiene la función
            }

            // Si pasa todas las validaciones, enviamos los datos
            const formData = new FormData();
            formData.append('id', id);
            formData.append('nombre', nombre);
            formData.append('email', email);
            formData.append('telefono', telefono);

            fetch('actualizar_usuario.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if(data.includes("Error")) {
                    M.toast({html: 'Error en el servidor', classes: 'red'});
                } else {
                    // Actualizar interfaz
                    document.querySelector(`#row-${id} td:nth-child(2) .display-mode`).innerText = nombre;
                    document.querySelector(`#row-${id} td:nth-child(3) .display-mode`).innerText = email;
                    document.querySelector(`#row-${id} td:nth-child(4) .display-mode`).innerText = telefono;
                    
                    // Cerrar edición y limpiar variable global
                    cancelarEdicion(id); 
                    M.toast({html: 'Usuario actualizado', classes: 'green'});
                }
            })
            .catch(error => {
                console.error('Error:', error);
                M.toast({html: 'Error de conexión', classes: 'red'});
            });
        }
    </script>
    
</body>
</html>