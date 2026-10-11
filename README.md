
# ReciclaCDMX

ReciclaCDMX es una página web que tiene como objetivo mostrar información sobre reciclaje, materiales reciclables, consejos y algunos centros de reciclaje.

## Versión

0.4.0

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
4. Entrar a `http://localhost/ReciclaCDMX/index.php`.
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
  - centro-reciclaje.jpg
- includes/
  - nav.php
  - footer.php
  - funciones.php
- README.md

## Funcionalidades actuales

Actualmente el proyecto permite:

- Visualizar la página principal.
- Consultar diferentes centros de reciclaje.
- Ver información detallada de cada centro.
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
- Reutilizar el menú de navegación y el pie de página.
- Utilizar funciones PHP para organizar mejor el código.

## Uso de PHP

En esta versión se continuó utilizando PHP dentro de las diferentes páginas del portal.

Se utilizaron variables, arreglos, ciclos foreach y estructuras if e if/else para procesar y mostrar información.

También se incorporaron formularios utilizando los métodos GET y POST.

El método GET se utiliza para realizar una consulta de materiales reciclables almacenados en un arreglo.

El método POST se utiliza para recibir la información del formulario de registro de materiales.

Para validar los datos se utilizaron funciones y estructuras como isset(), empty(), trim(), strlen(), filter_var() e is_numeric().

También se utiliza htmlspecialchars() mediante una función propia para mostrar la información de manera segura.

## Funciones PHP

En la Tarea 4 se creó el archivo `includes/funciones.php`.

Este archivo contiene tres funciones que permiten reutilizar código en diferentes páginas.

### escaparHTML()

Se utiliza para mostrar textos de manera segura en HTML.

Internamente utiliza htmlspecialchars() para evitar que las etiquetas ingresadas por los usuarios se interpreten como código HTML.

### obtenerMateriales()

Esta función devuelve un arreglo con información de los materiales reciclables.

Cada material contiene un nombre, una descripción y un símbolo.

Se utiliza principalmente en la página materiales.php.

### buscarMaterial()

Esta función recibe el arreglo de materiales y el nombre del material que se desea buscar.

Utiliza un ciclo foreach para encontrar una coincidencia.

Si encuentra el material, devuelve su información.

Si no encuentra coincidencias, devuelve null.

## Archivos reutilizables

Para organizar mejor el proyecto se creó la carpeta `includes`.

### nav.php

Contiene el menú de navegación del sitio.

Se utiliza mediante include para evitar escribir el mismo menú en cada página.

### footer.php

Contiene el pie de página de ReciclaCDMX.

Se incluye en las páginas PHP para mantener el mismo contenido.

### funciones.php

Contiene las funciones PHP utilizadas en el proyecto.

Se carga mediante require_once para evitar incluir las mismas funciones más de una vez.

## Formularios

### Consulta mediante GET

En la página materiales.php se agregó un formulario que permite buscar un material reciclable.

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

Si existen errores, se muestran mensajes en rojo arriba del formulario indicando los datos que deben corregirse.

Si los datos son correctos, se muestra una confirmación con la información recibida.

Actualmente el formulario no almacena información en una base de datos.

## Mejoras de la Tarea 4

En esta actividad se realizaron las siguientes mejoras:

- Se crearon tres funciones PHP reutilizables.
- Se agregó la carpeta includes.
- Se separó el menú de navegación en nav.php.
- Se separó el pie de página en footer.php.
- Se utilizó include y require_once.
- Se revisaron las seis páginas PHP.
- Se separaron las etiquetas HTML de las instrucciones echo.
- Se utilizó escaparHTML() para mostrar información.
- Se mejoró la presentación de los errores del formulario.
- Se corrigieron los enlaces para consultar los detalles de cada centro.
- Se conservaron los estilos CSS y la estructura del sitio.

## Estado

El proyecto se encuentra en su cuarta versión y corresponde al cierre de la Fase 1.

Actualmente cuenta con seis páginas PHP, estilos CSS, recursos visuales, navegación, contenido dinámico, formularios GET y POST, validación de datos y archivos reutilizables.

En futuras versiones se podrían agregar una base de datos y funciones para guardar los materiales registrados.

## Historial de versiones

| Versión | Cambios principales |
|---------|----------------------|
| 0.1.0 | Creación de la estructura inicial, páginas HTML, navegación y estilos CSS. |
| 0.2.0 | Integración de PHP, variables, arreglos, foreach, condicionales, contenido adicional y recursos visuales. |
| 0.3.0 | Integración de formularios GET y POST, búsqueda de materiales, validación de datos, manejo de errores y uso de htmlspecialchars(). |
| 0.4.0 | Creación de funciones PHP, archivos reutilizables, revisión de las seis páginas, mejoras en validaciones y cierre de la Fase 1. |
