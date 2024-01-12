# Documentación del Proyecto MVC

<p align=center> <img src="view/img/logo2.png"> </p>

## Introducción

Esta documentación ofrece una guía sobre el proyecto web desarrollado utilizando el patrón Modelo-Vista-Controlador (MVC) en PHP. Se centra en la gestión de comentarios, incluyendo su visualización, inserción y eliminación.

## Estructura del Proyecto

El proyecto sigue la estructura estándar de MVC con las siguientes carpetas y archivos principales:

- `/`
  - `index.php` (Punto de entrada y enrutador)
  - `/config`
    - `database.php`
  - `/controller`
    - `about.php`
    - `home.php`
    - `lista.php`
  - `/model`
    - `CommentModel.php`
  - `/view`
    - `/css`
      - `estilo.css`
    - `/img`
        - `logo.ico`
        - `logo.png`
    - `about.php`
    - `home.php`
    - `lista.php`
    

## Inicio del Proyecto

### Configuración Inicial

1. **Estructura de Carpetas**: Se crea una estructura de carpetas para separar las responsabilidades: modelos, vistas y controladores.
2. **Archivo `index.php`**: Se configura como el enrutador central que maneja las solicitudes y redirige a los controladores adecuados.
3. **Conexión a la Base de Datos**: En `config/database.php`, se establece la conexión usando PDO para una interacción segura con la base de datos.

## Funcionalidades Implementadas

### Visualización de Comentarios

- **Modelo (`CommentModel.php`)**: Se crea un modelo con métodos para interactuar con la base de datos, específicamente para obtener comentarios.
- **Vista**: Se implementa una vista para mostrar los comentarios recuperados desde la base de datos.
- **Controlador (`about.php`)**: Se utiliza para manejar la lógica de recuperar comentarios y pasarlos a la vista.

### Inserción de Comentarios

- **Formulario en Vista**: Se agrega un formulario HTML en la vista para enviar nuevos comentarios.
- **Manejo en el Modelo**: Se actualiza `CommentModel` para incluir un método que maneja la inserción de comentarios en la base de datos.
- **Lógica en el Controlador (`about.php`)**: Se añade la lógica para procesar los datos del formulario y llamar al modelo para insertar el comentario.

### Borrado de Comentarios

- **Checkboxes en Vista**: Se incorporan checkboxes en la vista para seleccionar comentarios a borrar.
- **Método de Borrado en el Modelo**: Se añade un método en `CommentModel` para borrar los comentarios seleccionados de la base de datos.
- **Procesamiento en el Controlador (`lista.php`)**: Se maneja la lógica de capturar los IDs de los comentarios seleccionados y llamar al modelo para realizar la eliminación.

## Mejores Prácticas y Seguridad

- **Consultas Preparadas**: Uso de consultas preparadas en PDO para evitar inyecciones SQL.
- **Validación de Entradas**: Comprobación y limpieza de los datos ingresados en los formularios antes de procesarlos.
- **Redirecciones Post-Acción**: Implementación de redirecciones después de acciones como inserción o borrado para evitar reenvíos del formulario.

## Conclusiones y Recomendaciones

Este proyecto proporciona una base sólida en el desarrollo web con PHP y el patrón MVC. Las prácticas implementadas ofrecen un marco para proyectos futuros y pueden servir como una referencia para conceptos clave en el desarrollo web.

---

*Documentación para servir como guía del proyecto MVC.*

