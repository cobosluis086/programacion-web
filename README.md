
# ReciclaCDMX

ReciclaCDMX es una página web que tiene como objetivo mostrar información sobre reciclaje, materiales reciclables, consejos y algunos centros de reciclaje.

## Versión

0.5.0

## Tecnologías

- HTML5
- CSS3
- PHP
- Visual Studio Code
- XAMPP

## Requisitos

Para ejecutar el proyecto se necesita:

- XAMPP con Apache iniciado o un servidor local de PHP.
- Un navegador como Google Chrome, Safari o Microsoft Edge.
- Tener la carpeta completa del proyecto.

## Ejecución

1. Colocar la carpeta ReciclaCDMX dentro de htdocs de XAMPP.
2. Iniciar Apache desde XAMPP.
3. Abrir el navegador.
4. Entrar a http://localhost/ReciclaCDMX/index.php.
5. Utilizar el menú para navegar entre las páginas.

También se puede ejecutar desde la terminal de Visual Studio Code, ubicándose en la carpeta del proyecto y utilizando:

```bash
php -S localhost:8000
```

Después se abre:

http://localhost:8000/index.php

## Estructura del proyecto

```text
ReciclaCDMX/
│
├── index.php
├── centros.php
├── detalle.php
├── materiales.php
├── consejos.php
├── registro.php
├── login.php
├── logout.php
├── admin.php
│
├── CSS/
│   └── estilos.css
│
├── img/
│   └── reciclaje.png
│
├── includes/
│   ├── nav.php
│   ├── footer.php
│   ├── funciones.php
│   └── sesion.php
│
└── README.md
```

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
- Iniciar sesión con usuarios temporales.
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

### Registro mediante POST

La página registro.php permite ingresar:

- Nombre.
- Correo electrónico.
- Material.
- Cantidad aproximada.

El formulario valida los datos antes de procesarlos.

Si existen errores, muestra mensajes indicando qué información debe corregirse.

Si los datos son correctos, muestra una confirmación.

Actualmente la información no se almacena en una base de datos.

## Tarea 5: Cookies y sesiones

En esta versión se incorporaron cookies y sesiones para representar el acceso temporal de usuarios al portal.

Se agregaron usuarios ficticios con diferentes roles y se protegieron algunos apartados del sitio.

### Inicio de sesión

Se creó el archivo login.php.

Este archivo contiene un formulario que solicita:

- Correo electrónico.
- Contraseña.
- Opción para recordar el correo.

Los datos ingresados se comparan con usuarios temporales definidos en PHP.

Si la información es correcta, se inicia la sesión y se redirige al usuario a la página principal.

Si los datos son incorrectos, aparece un mensaje de error.

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

- Nombre del usuario.
- Correo electrónico.
- Rol del usuario.

Se utiliza session_regenerate_id() al iniciar sesión correctamente.

El archivo includes/sesion.php contiene las funciones necesarias para validar usuarios, comprobar sesiones y verificar permisos.

### Usuarios y roles

Se definieron dos tipos de usuarios temporales.

**Usuario registrado**

Puede consultar las páginas públicas y acceder al formulario de registro de materiales.

**Administrador**

Puede consultar las páginas públicas, acceder al registro y entrar al panel de administración.

### Usuarios de prueba

| Correo | Contraseña | Rol |
|--------|------------|-----|
| usuario@reciclacdmx.com | Usuario123 | Usuario |
| admin@reciclacdmx.com | Admin123 | Administrador |

Estos datos son ficticios y se utilizan únicamente para realizar pruebas del proyecto.

### Protección de páginas

Se agregó la función protegerPagina() para verificar si existe una sesión activa.

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

Se creó logout.php.

Este archivo elimina la información de $_SESSION y destruye la sesión activa.

Después redirige al usuario al formulario de inicio de sesión.

La cookie del correo recordado se conserva si el usuario eligió recordarlo.

## Archivos agregados en la Tarea 5

### login.php

Formulario para iniciar sesión y recordar el correo mediante cookies.

### logout.php

Permite cerrar la sesión del usuario.

### admin.php

Panel exclusivo para usuarios con rol de administrador.

### includes/sesion.php

Contiene los usuarios ficticios y las funciones para validar credenciales, controlar sesiones y verificar permisos.

## Archivos modificados

### includes/nav.php

Se adaptó el menú según el estado de la sesión y el rol del usuario.

### registro.php

Se agregó una comprobación para impedir el acceso a visitantes que no hayan iniciado sesión.

### README.md

Se actualizó la documentación del proyecto a la versión 0.5.0.

## Base de datos propuesta

En una futura versión se planea utilizar MySQL para almacenar información de manera permanente.

Se proponen las siguientes tres tablas.

### 1. Usuarios

Almacenaría la información de las personas registradas en ReciclaCDMX.

Campos principales:

- id_usuario: identificador del usuario.
- nombre: nombre completo.
- correo: correo electrónico.
- contrasena_hash: contraseña protegida.
- rol: usuario o administrador.
- fecha_registro: fecha de registro.

### 2. CentrosReciclaje

Almacenaría información de los centros de reciclaje disponibles en el portal.

Campos principales:

- id_centro: identificador del centro.
- nombre: nombre del centro de reciclaje.
- direccion: ubicación del centro.
- alcaldia: alcaldía donde se encuentra.
- horario: horario de atención.
- materiales_aceptados: información sobre los materiales recibidos.

### 3. RegistrosMateriales

Almacenaría los materiales que registren los usuarios.

Campos principales:

- id_registro: identificador del registro.
- id_usuario: usuario que registró el material.
- material: tipo de material.
- cantidad: cantidad aproximada en kilogramos.
- fecha_registro: fecha en que se realizó el registro.

Estas tablas se utilizarían para conectar los usuarios, los centros de reciclaje y los materiales registrados.

En esta etapa solamente se propone la estructura. No se requiere crear la base de datos ni escribir sentencias SQL.

## Mejoras de la Tarea 5

- Se creó un formulario de inicio de sesión.
- Se definieron usuarios ficticios.
- Se agregó el uso de cookies.
- Se implementaron sesiones mediante PHP.
- Se agregó el cierre de sesión.
- Se protegió el formulario de registro.
- Se creó un apartado exclusivo para administradores.
- Se modificó el menú según el rol del usuario.
- Se conservaron las funciones de las tareas anteriores.
- Se propusieron tres tablas para una futura base de datos.
- Se actualizó la documentación del proyecto.

## Estado actual

ReciclaCDMX se encuentra en su quinta versión.

El proyecto cuenta con páginas PHP, estilos CSS, formularios, validación de datos, contenido dinámico, cookies, sesiones y control de acceso según el rol.

El sistema utiliza usuarios ficticios definidos en PHP.

Actualmente no existe conexión con MySQL ni almacenamiento permanente de información.

El panel administrativo muestra las funciones que podrían desarrollarse en versiones posteriores.

## Historial de versiones

| Versión | Cambios principales |
|---------|---------------------|
| 0.1.0 | Creación de páginas HTML, navegación y estilos CSS. |
| 0.2.0 | Integración de PHP, arreglos, variables, foreach y condicionales. |
| 0.3.0 | Formularios GET y POST, validaciones y mensajes de error. |
| 0.4.0 | Funciones reutilizables, organización del proyecto y cierre de la Fase 1. |
| 0.5.0 | Cookies, sesiones, usuarios temporales, control de acceso y navegación según roles. |

## Próximas mejoras

En futuras versiones se podrían agregar:

- Conexión con MySQL.
- Registro real de usuarios.
- Almacenamiento permanente de materiales.
- Administración de centros de reciclaje.
- Edición de información por parte del administrador.
- Consultas de registros almacenados.

Estas funcionalidades todavía no están implementadas.
