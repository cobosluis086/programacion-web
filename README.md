
# ReciclaCDMX

ReciclaCDMX es una página web que tiene como objetivo mostrar información sobre reciclaje, materiales reciclables, consejos y algunos centros de reciclaje.

## Versión

0.6.0

## Tecnologías

- HTML5
- CSS3
- PHP
- MySQL
- phpMyAdmin
- Visual Studio Code
- XAMPP

## Requisitos

Para ejecutar el proyecto se necesita:

- XAMPP con Apache y MySQL iniciados.
- PHP con la extensión mysqli habilitada.
- Un navegador como Google Chrome, Safari o Microsoft Edge.
- Tener la carpeta completa del proyecto.
- Importar la base de datos recicla_cdmx en MySQL.

## Ejecución

1. Colocar la carpeta ReciclaCDMX dentro de htdocs de XAMPP.
2. Iniciar Apache y MySQL desde XAMPP.
3. Abrir phpMyAdmin.
4. Crear la base de datos recicla_cdmx si todavía no existe.
5. Importar el archivo database/recicla_cdmx.sql.
6. Revisar la conexión en config/conexion.php.
7. Abrir el navegador.
8. Entrar a http://localhost/ReciclaCDMX/index.php.
9. Utilizar el menú para navegar entre las páginas.

También se puede ejecutar desde la terminal de Visual Studio Code, ubicándose en la carpeta del proyecto y utilizando:

    php -S localhost:8000

Después se abre:

http://localhost:8000/index.php

Para utilizar el registro y el inicio de sesión es necesario tener MySQL funcionando.

## Estructura del proyecto

    ReciclaCDMX/
    |
    |-- index.php
    |-- centros.php
    |-- detalle.php
    |-- materiales.php
    |-- consejos.php
    |-- registro.php
    |-- crear_cuenta.php
    |-- login.php
    |-- logout.php
    |-- admin.php
    |
    |-- CSS/
    |   |-- estilos.css
    |
    |-- img/
    |   |-- reciclaje.png
    |
    |-- config/
    |   |-- conexion.php
    |
    |-- database/
    |   |-- recicla_cdmx.sql
    |
    |-- includes/
    |   |-- nav.php
    |   |-- footer.php
    |   |-- funciones.php
    |   |-- sesion.php
    |
    |-- README.md

## Funcionalidades actuales

El proyecto permite:

- Visualizar la página principal.
- Consultar centros de reciclaje.
- Ver información detallada de cada centro.
- Consultar diferentes materiales reciclables.
- Ver consejos relacionados con el reciclaje.
- Navegar entre las páginas.
- Mostrar contenido dinámico utilizando PHP.
- Generar listados mediante arreglos y foreach.
- Utilizar estructuras condicionales.
- Buscar materiales mediante un formulario GET.
- Registrar información de materiales mediante POST.
- Validar la información recibida.
- Mostrar errores cuando los datos son incorrectos.
- Mostrar confirmaciones cuando los datos son correctos.
- Utilizar funciones PHP reutilizables.
- Registrar cuentas de usuarios en MySQL.
- Proteger contraseñas mediante password_hash().
- Iniciar sesión con usuarios almacenados en MySQL.
- Verificar contraseñas mediante password_verify().
- Recordar el correo mediante cookies.
- Cerrar sesiones.
- Proteger páginas que requieren iniciar sesión.
- Mostrar diferentes opciones de navegación según el rol.
- Acceder a un apartado exclusivo para administradores.

## Uso de PHP

PHP se utiliza para procesar información y generar contenido dinámico dentro del portal.

Se utilizan variables, arreglos, ciclos foreach, estructuras if e if/else y funciones.

También se utilizan formularios mediante los métodos GET y POST.

GET permite consultar materiales reciclables.

POST permite recibir la información de los formularios de registro e inicio de sesión.

Para validar información se utilizan funciones como isset(), empty(), trim(), strlen(), filter_var() e is_numeric().

También se utiliza htmlspecialchars() para mostrar información de forma segura.

## Funciones PHP

El archivo includes/funciones.php contiene funciones reutilizables.

### escaparHTML()

Permite mostrar textos de manera segura utilizando htmlspecialchars().

### obtenerMateriales()

Devuelve un arreglo con información sobre materiales reciclables.

### buscarMaterial()

Busca un material dentro de un arreglo utilizando foreach.

Si encuentra una coincidencia, devuelve la información.

Si no encuentra el material, devuelve null.

## Formularios

### Consulta mediante GET

La página materiales.php permite buscar materiales reciclables.

La información se consulta en un arreglo y se muestra dinámicamente.

### Registro de materiales mediante POST

La página registro.php permite ingresar:

- Nombre.
- Correo electrónico.
- Material.
- Cantidad aproximada.

El formulario valida los datos antes de procesarlos.

Si existen errores, muestra mensajes indicando qué información debe corregirse.

Si los datos son correctos, muestra una confirmación.

Actualmente la información de materiales no se almacena en MySQL.

### Registro de usuarios mediante POST

La página crear_cuenta.php permite registrar nuevos usuarios.

Solicita:

- Nombre.
- Correo electrónico.
- Contraseña.

El formulario valida que la información sea correcta.

También comprueba que el correo no esté registrado previamente.

La contraseña se protege mediante password_hash() y PASSWORD_DEFAULT.

Los usuarios registrados reciben automáticamente el rol usuario.

El formulario público no permite seleccionar el rol administrador.

La información se almacena en la tabla usuarios de MySQL utilizando consultas preparadas.

## Tarea 5: Cookies y sesiones

En la Tarea 5 se incorporaron cookies y sesiones para controlar el acceso temporal de usuarios al portal.

Se utilizaron inicialmente usuarios ficticios definidos en PHP.

También se protegieron algunas páginas y se adaptó la navegación según el rol.

### Inicio de sesión

Se creó el archivo login.php.

Este archivo contiene un formulario que solicita:

- Correo electrónico.
- Contraseña.
- Opción para recordar el correo.

En la Tarea 6 se modificó para consultar los usuarios almacenados en MySQL.

### Cookies

Se utiliza setcookie() para guardar temporalmente el correo electrónico.

La cookie se llama correo_recordado.

Su duración es de una hora.

El correo guardado se recupera mediante $_COOKIE y se muestra nuevamente en el formulario.

Cuando el usuario no selecciona la opción de recordar el correo al iniciar sesión, se elimina la cookie anterior.

La contraseña no se almacena en cookies.

### Sesiones

Se utiliza session_start() para iniciar o recuperar sesiones.

Mediante $_SESSION se almacenan temporalmente:

- Identificador del usuario.
- Nombre.
- Correo electrónico.
- Rol.

Se utiliza session_regenerate_id() al iniciar sesión correctamente.

El archivo includes/sesion.php contiene las funciones necesarias para comprobar sesiones y verificar permisos.

### Usuarios y roles

Se mantienen dos tipos de usuarios.

**Usuario registrado**

Puede consultar las páginas públicas y acceder al formulario de registro de materiales.

**Administrador**

Puede consultar las páginas públicas, acceder al registro y entrar al panel de administración.

### Protección de páginas

Se utiliza la función protegerPagina() para verificar si existe una sesión activa.

La página registro.php requiere que el usuario haya iniciado sesión.

Si un visitante intenta entrar sin iniciar sesión, es redirigido a login.php.

La página admin.php también requiere una sesión activa y verifica que el usuario tenga el rol de administrador.

Si un usuario normal intenta entrar al panel administrativo, es redirigido a index.php.

### Navegación según el usuario

Se modificó includes/nav.php para cambiar las opciones del menú.

Los visitantes pueden consultar las páginas públicas y visualizar el enlace para iniciar sesión.

Los usuarios registrados pueden acceder al registro de materiales y cerrar sesión.

Los administradores también pueden acceder al panel de administración.

### Cierre de sesión

El archivo logout.php elimina la información de $_SESSION y destruye la sesión activa.

Después redirige al usuario al formulario de inicio de sesión.

La cookie del correo recordado se conserva si el usuario eligió recordarlo.

## Tarea 6: Registro y acceso con MySQL

En esta tarea se incorporó MySQL al proyecto ReciclaCDMX.

El objetivo fue sustituir los usuarios temporales definidos en PHP por usuarios almacenados en una base de datos.

Se conservaron las sesiones, cookies, roles y funciones de navegación que se habían desarrollado en la Tarea 5.

### Base de datos

Se creó una base de datos llamada recicla_cdmx.

Actualmente contiene la tabla usuarios.

Esta tabla almacena la información necesaria para registrar usuarios y permitir el inicio de sesión.

### Tabla usuarios

La tabla contiene los siguientes campos:

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | INT | Identificador único y autoincremental. |
| nombre | VARCHAR(100) | Nombre del usuario. |
| correo | VARCHAR(150) | Correo electrónico único. |
| contrasena | VARCHAR(255) | Contraseña protegida mediante hash. |
| rol | VARCHAR(30) | Rol asignado al usuario. |

El campo correo es único para evitar que se registren cuentas duplicadas.

El campo rol tiene como valor predeterminado usuario.

### Conexión con MySQL

Se creó la carpeta config con el archivo conexion.php.

Este archivo permite conectar PHP con la base de datos recicla_cdmx utilizando mysqli.

La conexión se reutiliza en las páginas que necesitan consultar o guardar información en MySQL.

### Registro de usuarios

Se creó el archivo crear_cuenta.php.

El formulario recibe los datos mediante POST.

Antes de guardar la información:

- Comprueba que el nombre sea válido.
- Valida el formato del correo electrónico.
- Comprueba la longitud de la contraseña.
- Verifica que el correo no exista previamente.
- Protege la contraseña mediante password_hash().
- Asigna automáticamente el rol usuario.
- Guarda los datos mediante una consulta preparada.
- Muestra un mensaje de acuerdo con el resultado.

Los usuarios no pueden registrarse directamente como administradores desde el formulario público.

### Inicio de sesión con MySQL

Se modificó login.php para validar los usuarios almacenados en la base de datos.

El proceso funciona de la siguiente manera:

1. El usuario escribe su correo y contraseña.
2. PHP recibe los datos mediante POST.
3. Se busca el correo en MySQL mediante una consulta preparada.
4. Se recupera la información del usuario.
5. Se comprueba la contraseña mediante password_verify().
6. Si los datos son correctos, se inicia la sesión.
7. Se guardan el identificador, nombre, correo y rol.
8. Se redirige al usuario a la página principal.

Si el correo o la contraseña son incorrectos, aparece un mensaje de error.

### Protección de contraseñas

Las contraseñas no se guardan directamente como texto.

Se utiliza password_hash() con PASSWORD_DEFAULT al crear una cuenta.

Para iniciar sesión se utiliza password_verify().

Esto permite verificar la contraseña sin almacenar su valor original en la base de datos.

### Control de acceso

Se conservaron los roles usuario y administrador.

El archivo includes/sesion.php contiene las funciones:

- sesionActiva().
- obtenerRol().
- protegerPagina().
- esAdministrador().

Estas funciones permiten comprobar si existe una sesión activa y determinar los permisos del usuario.

El administrador puede acceder a admin.php.

Los usuarios normales no pueden acceder al panel administrativo.

### Usuarios de prueba

Se crearon cuentas ficticias para comprobar el funcionamiento de los diferentes roles.

| Correo | Contraseña | Rol |
|--------|------------|-----|
| prueba@reciclacdmx.com | Prueba12345 | Usuario |
| admin@reciclacdmx.com | Admin12345 | Administrador |

Estas cuentas se utilizan únicamente para realizar pruebas.

Las contraseñas están almacenadas mediante hashes en MySQL.

El rol administrador se asignó directamente desde la base de datos, no desde el formulario público.

### Pruebas realizadas

Se comprobó el funcionamiento de las siguientes características:

- Creación de la base de datos recicla_cdmx.
- Creación de la tabla usuarios.
- Conexión de PHP con MySQL.
- Registro de una cuenta de usuario.
- Almacenamiento de la contraseña protegida.
- Asignación del rol usuario.
- Inicio de sesión con una cuenta de administrador.
- Acceso al panel de administración.

También se mantiene el código de protección para impedir el acceso de usuarios normales a las funciones administrativas.

### Archivo SQL

La carpeta database contiene el archivo recicla_cdmx.sql.

Este archivo debe exportarse desde phpMyAdmin e incluir:

- La estructura de la base de datos.
- La tabla usuarios.
- Las cuentas ficticias necesarias para probar los accesos.

El archivo permite importar la base de datos en otro equipo y realizar las pruebas del proyecto.

## Base de datos propuesta

En la Tarea 5 se propuso utilizar MySQL para almacenar información de manera permanente.

Se plantearon tres tablas principales:

- Usuarios.
- CentrosReciclaje.
- RegistrosMateriales.

En la Tarea 6 se implementó la base de datos recicla_cdmx y la tabla usuarios.

### 1. Usuarios

Esta tabla ya se encuentra implementada.

Almacena los nombres, correos, contraseñas protegidas y roles de las cuentas registradas.

Respecto a la propuesta inicial, se utilizaron los campos id y contrasena en lugar de id_usuario y contrasena_hash.

El campo fecha_registro no se incorporó en esta versión.

### 2. CentrosReciclaje

Esta tabla todavía está propuesta para una versión futura.

Almacenaría información de los centros de reciclaje disponibles en el portal.

Campos principales:

- id_centro.
- nombre.
- direccion.
- alcaldia.
- horario.
- materiales_aceptados.

### 3. RegistrosMateriales

Esta tabla también se mantiene como propuesta.

Almacenaría los materiales registrados por los usuarios.

Campos principales:

- id_registro.
- id_usuario.
- material.
- cantidad.
- fecha_registro.

En versiones posteriores se podrían relacionar estas tablas para administrar la información de reciclaje desde MySQL.

## Archivos agregados en la Tarea 6

### config/conexion.php

Permite establecer la conexión entre PHP y MySQL utilizando mysqli.

### crear_cuenta.php

Contiene el formulario y las validaciones para registrar usuarios nuevos.

### database/recicla_cdmx.sql

Contiene la estructura y los datos exportados desde MySQL para realizar las pruebas.

## Archivos modificados en la Tarea 6

### login.php

Se modificó para consultar los usuarios en MySQL y verificar sus contraseñas mediante password_verify().

### includes/sesion.php

Se eliminaron los usuarios temporales definidos en arreglos de PHP.

Se conservaron las funciones para controlar sesiones y verificar permisos.

### README.md

Se actualizó la documentación del proyecto a la versión 0.6.0.

## Mejoras de la Tarea 6

- Se integró MySQL al proyecto.
- Se creó la tabla usuarios.
- Se agregó una conexión mediante mysqli.
- Se implementó el registro de cuentas.
- Se agregaron validaciones para evitar registros incorrectos.
- Se evitó el registro de correos duplicados.
- Se utilizaron consultas preparadas.
- Se protegieron las contraseñas mediante password_hash().
- Se modificó el inicio de sesión para consultar MySQL.
- Se utilizó password_verify().
- Se conservaron las cookies y sesiones.
- Se mantuvieron los roles de usuario y administrador.
- Se conservaron los permisos y la navegación.
- Se eliminó la dependencia de usuarios temporales definidos en PHP.
- Se actualizó la documentación del proyecto.

## Estado actual

ReciclaCDMX se encuentra en su sexta versión.

El proyecto cuenta con páginas PHP, estilos CSS, formularios, validación de datos, contenido dinámico, cookies, sesiones y control de acceso según el rol.

Ahora también utiliza MySQL para almacenar las cuentas de usuarios.

Las contraseñas se protegen mediante hashes y el inicio de sesión se valida consultando la base de datos.

Se mantienen los apartados públicos y las funciones exclusivas para administradores.

Los registros de materiales y la información de centros de reciclaje todavía no se almacenan en MySQL.

## Historial de versiones

| Versión | Cambios principales |
|---------|---------------------|
| 0.1.0 | Creación de páginas HTML, navegación y estilos CSS. |
| 0.2.0 | Integración de PHP, arreglos, variables, foreach y condicionales. |
| 0.3.0 | Formularios GET y POST, validaciones y mensajes de error. |
| 0.4.0 | Funciones reutilizables, organización del proyecto y cierre de la Fase 1. |
| 0.5.0 | Cookies, sesiones, usuarios temporales, control de acceso y navegación según roles. |
| 0.6.0 | Integración de MySQL, registro de usuarios, contraseñas protegidas e inicio de sesión con base de datos. |

## Próximas mejoras

En futuras versiones se podrían agregar:

- Almacenamiento de materiales en MySQL.
- Administración de centros de reciclaje.
- Edición de información por parte del administrador.
- Consultas de registros almacenados.
- Recuperación de contraseñas.
- Administración de cuentas de usuarios.

Estas funcionalidades todavía no están implementadas.
