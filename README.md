# Acortador de URLs - PHP & MySQL

Este proyecto es una herramienta web funcional que permite a los usuarios transformar URLs largas en enlaces cortos únicos. Implementa una arquitectura cliente-servidor clásica, utilizando una base de datos relacional para la persistencia y lógica de redirección mediante cabeceras HTTP.

El objetivo del proyecto es demostrar habilidades en el manejo de bases de datos con PHP (PDO), validación de datos en el servidor y manipulación dinámica del DOM con JavaScript.

## Características

*   **Generación de códigos únicos:** Crea identificadores alfanuméricos de 6 caracteres para cada URL.
*   **Redirección Automática:** Procesa el código corto y redirige al usuario a la URL original de forma transparente.
*   **Seguridad:** Utiliza sentencias preparadas (PDO) para prevenir ataques de inyección SQL.
*   **Interfaz Moderna:** Diseño limpio y responsivo con feedback instantáneo al usuario.
*   **Validación de URLs:** Asegura que los datos introducidos cumplan con el formato de una URL válida antes de procesarlos.

## Tecnologías Utilizadas

*   **Backend:**
    *   **PHP 8.x:** Lógica de negocio y manejo de peticiones.
    *   **PDO (PHP Data Objects):** Para una interacción segura con la base de datos.
*   **Base de Datos:**
    *   **MySQL:** Almacenamiento persistente de las URLs y sus códigos.
*   **Frontend:**
    *   **HTML5 & CSS3:** Estructura y diseño visual.
    *   **JavaScript (ES6+):** Gestión de la Fetch API para comunicación asíncrona.

## Instalación y Configuración

**1. Base de Datos:**
   Importa el archivo `sql/setup.sql` en tu gestor de MySQL (phpMyAdmin, Workbench, etc.) para crear la base de datos y la tabla necesaria.

**2. Configuración de Conexión:**
   Edita el archivo `config/database.php` con las credenciales de tu servidor MySQL local.

**3. Ejecución:**
   Coloca la carpeta del proyecto en tu servidor local (ej. `htdocs` en XAMPP) y accede a través del navegador:
   `http://localhost/url_shortener/public/index.html`

---
*Desarrollado por David Arenas Cabeza.*
