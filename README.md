# ReciclaCDMX

ReciclaCDMX es una página web que tiene como objetivo mostrar información sobre reciclaje, materiales reciclables, consejos y algunos centros de reciclaje.

## Versión

0.3.0

## Tecnologías

- HTML5
- CSS3
- PHP
- Visual Studio Code
- XAMPP

## Requisitos

Para ejecutar el proyecto se necesita:

- XAMPP con Apache iniciado.
- Un navegador web como Google Chrome, Safari o Microsoft Edge.
- Tener la carpeta completa del proyecto.

## Ejecución

1. Colocar la carpeta ReciclaCDMX dentro de la carpeta `htdocs` de XAMPP.
2. Iniciar Apache desde XAMPP.
3. Abrir el navegador.
4. Entrar al proyecto mediante `localhost`.
5. Utilizar el menú para navegar por las diferentes páginas.

## Estructura

ReciclaCDMX/

- index.php
- centros.php
- detalle.php
- materiales.php
- consejos.php
- registro.php
- css/
  - estilos.css
- img/
  - reciclaje.png
- README.md

## Funcionalidades actuales

Actualmente el proyecto permite:

- Visualizar la página principal.
- Consultar diferentes centros de reciclaje.
- Ver información detallada de los centros.
- Consultar diferentes materiales reciclables.
- Ver consejos relacionados con el reciclaje.
- Navegar entre las diferentes páginas.
- Mostrar contenido dinámico utilizando PHP.
- Generar listados y tarjetas mediante arreglos y foreach.
- Mostrar diferentes mensajes mediante estructuras condicionales.
- Buscar materiales reciclables mediante un formulario GET.
- Procesar la búsqueda utilizando PHP.
- Mostrar dinámicamente el resultado de una búsqueda.
- Registrar información de materiales mediante un formulario POST.
- Validar los datos recibidos antes de procesarlos.
- Mostrar mensajes de error cuando los datos son incorrectos.
- Mostrar una confirmación cuando la información es correcta.

## Uso de PHP

En esta versión se continuó utilizando PHP dentro de las diferentes páginas del portal.

Se utilizaron variables, arreglos, ciclos foreach y estructuras if e if/else para procesar y mostrar información.

También se incorporaron formularios utilizando los métodos GET y POST.

El método GET se utiliza para realizar una consulta de materiales reciclables almacenados en un arreglo.

El método POST se utiliza para recibir la información del formulario de registro de materiales.

Para validar los datos se utilizaron funciones y estructuras como isset(), empty(), trim(), strlen(), filter_var() e is_numeric().

También se utiliza htmlspecialchars() al mostrar información procesada mediante los formularios.

## Formularios

### Consulta mediante GET

En la página de materiales se agregó un formulario que permite buscar un material reciclable.

La búsqueda consulta la información almacenada en un arreglo y muestra el resultado de forma dinámica.

Si el material no se encuentra, se muestra un mensaje indicando que no existen coincidencias.

### Registro mediante POST

Se agregó la página registro.php para representar una función futura para los usuarios de ReciclaCDMX.

El formulario solicita:

- Nombre.
- Correo.
- Material.
- Cantidad aproximada.

Antes de procesar la información se realizan diferentes validaciones.

Si existen errores, se muestran mensajes indicando los datos que deben corregirse.

Si los datos son correctos, se muestra una confirmación con la información recibida.

## Estado

El proyecto se encuentra en su tercera versión.

Actualmente cuenta con páginas PHP, estilos CSS, recursos visuales, navegación, contenido dinámico, formularios GET y POST y validación de datos.

## Historial de versiones

| Versión | Cambios principales |
|---------|----------------------|
| 0.1.0 | Creación de la estructura inicial, páginas HTML, navegación y estilos CSS. |
| 0.2.0 | Integración de PHP, variables, arreglos, foreach, condicionales, contenido adicional y recursos visuales. |
| 0.3.0 | Integración de formularios GET y POST, búsqueda de materiales, validación de datos, manejo de errores y uso de htmlspecialchars(). |