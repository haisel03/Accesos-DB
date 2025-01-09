# Formulario con Acceso a Base de Datos

Este proyecto es un sistema simple de formulario web que permite registrar usuarios en una base de datos MySQL y mostrar los registros existentes en una tabla. Utiliza PHP como lenguaje backend y PDO para las operaciones con la base de datos. El diseño de la interfaz se basa en Bootstrap 5.

## Características
- Registro de usuarios mediante un formulario HTML.
- Listado de usuarios almacenados en la base de datos.
- Validación de datos en el cliente y el servidor.
- Uso de PDO para la conexión y consultas a la base de datos.
- Interfaz responsiva gracias a Bootstrap 5.

## Requisitos
- Servidor web con soporte para PHP (por ejemplo, Apache o Nginx).
- PHP 7.4 o superior con extensión PDO habilitada.
- MySQL 5.7 o superior.
- Composer (opcional para manejar namespaces y dependencias).
- Navegador web moderno.

## Instalación
1. Clona este repositorio:
   ```bash
   git clone https://github.com/haisel03/Accesos-DB.git
   cd nombre-del-repositorio
2. Configura tu entorno:
  - Asegúrate de que PHP y MySQL estén instalados.
  - Crea una base de datos en MySQL y ejecuta el siguiente script para crear la tabla:
    ```sql
      CREATE DATABASE accesos_db;
      USE accesos_db;
      CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        correo VARCHAR(100) NOT NULL UNIQUE,
        telefono VARCHAR(15),
        creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      );
    ```
3. Configura la conexión a la base de datos:
   - Edita el archivo db/Database.php y ajusta las variables $host, $db_name, $username, y $password con los valores de tu entorno.
4. Inicia el servidor:
   - Si no usas xampp, wamp o otro entorno de desarrollo, asegúrate de que el servidor esté configurado
   para ejecutar PHP y que el directorio raíz del proyecto esté accesible o puede usar el servidor de php 
    ```bash
      php -S localhost:8000
    ```
   - Accede a la aplicación desde tu navegador en: http://localhost:8000

## Estructura del Proyecto
```scss
proyecto/
|
├── index.php            (Formulario y listado de usuarios)
├── db/
│   └── Database.php     (Clase para la conexión a la base de datos)
|   └── database.sql     (Archivo de la creacion de la base de datos) 
└── controllers/
    └── FormController.php (Controlador para manejar la lógica del formulario)
```
## Uso
1. Abre el formulario en tu navegador.
2. Ingresa los datos del usuario y presiona "Guardar".
3. Revisa el listado de usuarios registrados en la tabla debajo del formulario.

## Dependencias
-  [Bootstrap 5](https://getbootstrap.com/): Para el diseño de la interfaz.

