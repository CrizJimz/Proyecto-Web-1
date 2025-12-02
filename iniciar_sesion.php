<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Estilos personalizados para centrar y darle un ancho máximo al formulario */
        .login-container {
            width: 90%;
            max-width: 400px; /* Limita el ancho en pantallas grandes */
            margin-top: 50px;
            margin: auto;
            padding: 20px;
        }
        body {
            background-color: #f5f5f5; /* Fondo suave para destacar el formulario */
            
            /* Aplica Flexbox al cuerpo para centrar su contenido */
            display: flex;
            /* Centra horizontalmente */
            justify-content: center;
            /* Centra verticalmente */
            align-items: center;
            /* Asegura que el cuerpo ocupe al menos la altura total del viewport */
            min-height: 100vh;
            /* Previene el desbordamiento cuando el formulario es muy alto */
            margin: 0; 
        }
    </style>
</head>
<body class = "teal lighten-4">

    <div class="container">
        <div class="card login-container z-depth-3">
            <div class="card-content">
                <span class="card-title center-align">
                    <i class="material-icons large">account_circle</i>
                    <h4>Iniciar Sesión</h4>
                </span>
                
                <form id="loginForm" action="./logic/validarLogin.php" method="POST">
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="admin" name="admin" type="text" class="validate" required>
                            <label for="admin">Usuario</label>
                            <span class="helper-text" data-error="Ingresa un usuario" data-success="Válido">Ingresa tu usuario</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" name="password" type="password" class="validate" required>
                            <label for="password">Contraseña</label>
                            <span class="helper-text" data-error="Ingresa una contraseña" data-success="Válido">Ingresa tu contraseña</span>
                        </div>
                    </div>

                    <div class="row center-align">
                        <button class="btn waves-effect waves-light blue darken-2" type="submit" name="action">
                            Entrar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Inicialización de Materialize (a veces necesario para que los campos de formulario funcionen correctamente)
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>