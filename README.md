# Proyecto-Web-1
Repositorio para el proyecto de web_1 1508 (2026-1)

📋 Panel de Administración de Usuarios (CRUD)
Este proyecto es una aplicación web desarrollada para la gestión eficiente de usuarios y administradores. Implementa un sistema completo CRUD (Crear, Leer, Actualizar, Borrar) y un módulo de Autenticación (Login) seguro mediante sesiones de PHP.

El objetivo principal es demostrar la integración entre un Frontend responsivo y un Backend funcional utilizando tecnologías nativas y el framework Materialize CSS.

🚀 Tecnologías Utilizadas
Backend: PHP (Manejo de sesiones, conexión a BD, lógica de negocio).

Base de Datos: MySQL / MariaDB.

Frontend: HTML5, CSS3, Materialize CSS (Diseño Responsivo).

Interacción: JavaScript (AJAX/Fetch API) para actualizaciones asíncronas sin recargar la página.

✨ Características Principales
🔐 Seguridad y Autenticación
Sistema de Login: Acceso restringido mediante usuario y contraseña.

Protección de Rutas: Validación de sesión activa (session_start) para impedir acceso no autorizado a la plantilla principal.

Logout: Cierre de sesión seguro.

🛠️ Gestión de Usuarios (CRUD)
Crear: Formulario validado para registrar nuevos usuarios.

Leer: Visualización de registros en una tabla dinámica.

Actualizar (AJAX): Edición "in-line" (en la misma tabla) que permite modificar datos y guardarlos sin recargar la página completa.

Borrar: Eliminación de registros con confirmación de seguridad.

✅ Validaciones
Cliente (JS) y Servidor (PHP):

Campos obligatorios (no permite guardar vacíos).

Validación de formato de correo electrónico (type="email" y Regex).

Validación de longitud y formato numérico para teléfonos.

Integridad: Control de concurrencia en la edición (solo permite editar una fila a la vez).
