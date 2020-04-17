# Curso de WordPress 

## Instalación
- Instalamos XAMP, comos servidor web apache y mysql
- En  C:\xampp\htdocs\carpeta-proyecto
- Descargamos contenido wordpress en carpeta
- Creamos db en phpmyadmin: http://localhost/phpmyadmin/
- Ingresamos servidor local: http://localhost/carpeta-proyecto
- Seguimos los pasos de instalación

En wp-config.php, cambiamos el salt, para tener el wp más seguro
Ingreamos: http://api.wordpress.org/secret-key/1.1/salty  y reemplazamos por el default.

## Archivos del tema
- index.php : Archivo principal del theme y página de inicio
- style.css: Archivo principal de estilos y parametros
- font-page.php: Es la vista por defecto de la pagina de inicio
- footer.php: seccion footer
- function.php, permite generar propio codigo para amplicar funcionalidad del wp
- header.php: seccion header
- 404.php: página no encontrada
- page:php, pertenece a las paginas
- schrenshop.php: imagen de referencia del tema
- simgle.php: Corresponde a los post, entradas o a los posttype personalizados si no le especificamos una ruta.

Hooks: funciones de wordpress, que permite agregar codigo propio al codigo fuente de wp.
Tipos:
  - Actions: permite agregar codigo, alguna funcionalidad: usa add_action
  - Filter, lo mismo que actions, pero se agrega un argumento agregado: usa add_filter

Manejo de liberrias en wp (funciones)
- wp_register_style(): no ejecuta en html, recibe 5 argumentos
- wp_enquevue_style(): si incrusta en html

## Panel - Dashboard
 - Entrada
- Medios
- Páginas
- Comentario
- Apariencia
- Theme
- Plugins
- Usuarios
- Herramietnas
- Ajustes

## Creacion de Tema
En wp-content/theme, creamos nueva carpeta del tema.
Dentro de la carpeta creamos:
- index.php
- style.css, donde se ingresa este contenido:
```html
/*
    Theme name: PlatziGifts
    Version: 1.0
    Description: sitio para catálogo de platzi
    Author: Jorge Callalle
    Authon URI: http://github.com/jlcallalle
    License: GNU General Public Licence v2 or later
    License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
````
- header.php
```html
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    // Borramos la etiqueta Title y reemplazamos por esta funcion:
    <?php wp_head() ?>
</head>
```

- footer.php
```html
<footer>
</footer>
<?php wp_footer() ?>
```

- index.php: Enlazamos el hader.php y footer.php
```php
<?php get_header(); ?>
<?php get_footer(); ?>
```