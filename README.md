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

## Creacion de Título y assets mediante functions.php

En functions.php, agregamos funciones: 
- init_template, ejecuta cuando carga página
- assets, cargar componentes de terceros

```php
<?php 
function init_template(){
    add_theme_support( 'title-tag');
}

function assets(){
    wp_register_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', '', '4.4.1','all');
    wp_register_style('montserrat', 'https://fonts.googleapis.com/css?family=Montserrat&display=swap','','1.0', 'all');
    wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap','montserrat'),'1.0', 'all');
    wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js','','1.16.0', true);
    wp_enqueue_script('boostraps', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery','popper'),'4.4.1', true);
    wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js', '', '1.0', true);
}

add_action('after_setup_theme','init_template');
add_action('wp_enqueue_scripts','assets');
```

## Creacion de Menús
En functions.php, agregamos funciones: 

```php
function init_template(){
    register_nav_menus(
        array(
            'top_menu' => 'Menú Principal'
        )
    );
}
```
En header.php
```php
 <nav>
  <?php wp_nav_menu(
      array(
          'theme_location' => 'top_menu',
          'menu_class'    => 'menu-principal',
          'container_class' => 'container-menu',
      )
  ); 
  ?>
 </nav>
```

## Widgets
Muestra contenido mediante sidebars. Se agregará widgets en footer:

En functions.php, agregamos funciones: 

```php
function sidebar(){
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id'   => 'footer',
            'description' => 'Zona de Widgets para pie de página',
            'before_title' => '<p>',
            'after_title'  => '</p>',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget'  => '</div>',
        )
        );
}

add_action('widgets_init', 'sidebar');
```

En Apariencia mostrará area de Widgets, Agregamos texto en Widget

En Footer.php, agregamos referenciado en el Id => footer
```php
<footer>
    <div class="container">
        <?php dynamic_sidebar('footer'); ?>
    </div>
</footer>
```

## Post Type

Post type por defecto
 - Archivos Multimedia
 - Menú
Custom Post Type: personalizados.

Loops: muestra contenido que tenemos guardado en el administrador.
 - Basico: ejecuta en los archivos designados a sus respectivos post type, por ejm: page.php
 - Personalizado: Utiliza el Objeto WP_Query de Wordpress para personalizar consulta.

 ## Page.php
 En panel wordpress creamos una página, para que se muestre creamos: 

 page.php, 

 ```html
<main class='container'>
    <?php if(have_posts()){ 
            while(have_posts()){ // funcion have_post: si hay contenido, devuelva true
                the_post(); ?> 
            <h1 class='my-3'><?php the_title(); ?></h1>
            <?php the_content(); ?>
         <?php }
    }?>
</main>
```
Procesos Wordpress
https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png

 ## Single.php 
Hace referencia a las entradas del blog, y tambien cuando trabajamos con custom post type.
 
En dashboard, agregamos una imagen al post port defecto:
http://localhost/platzigifts/wp-content/uploads/2020/04/default.png

single.php

 ```html
<main class='container my-3'>
    <?php if(have_posts()){
            while(have_posts()){
                the_post();
            ?>
                <h1 class='my-5'><?php the_title() ?></h1>
                <div class="row">
                    <div class="col-6">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="col-6">
                        <?php the_content(); ?>
                    </div> 
                </div>
            <?php
            }
    } ?>
</main>
```

the_post_thumbnail: permite cargar la imagen subida

## Armando la página principal
En dashboard
Ajuster / Lectura, elegir página para que muestre en el home

Por defautl, se mostrara contenido de la página escogida.

Si deseamos tener algo más personalziado usaremos:

front-page.php
Donde se mostrará contenido del home principal

<?php get_header(); ?>

 ```html
<main class='container hola'>
    <?php if(have_posts()){
            while(have_posts()){
                the_post(); ?>
            <h1 class='my-3'><?php the_title(); ?>!!</h1>
            <?php the_content(); ?>

        <?php    }
    }?>

    <p>Front Page</p>
</main>

<?php get_footer(); ?>
```

## Custom Post Type

En function.php

 ```php
function productos_type(){
    $labels = array(
        'name' => 'Productos',
        'singular_name' => 'Producto',
        'manu_name' => 'Productos',
    );

    $args = array(
        'label'  => 'Productos', 
        'description' => 'Productos de Platzi',
        'labels'       => $labels,
        'supports'   => array('title','editor','thumbnail', 'revisions'),
        'public'    => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-cart',
        'can_export' => true,
        'publicly_queryable' => true,
        'rewrite'       => true,
        'show_in_rest' => true

    );    
    register_post_type('producto', $args);
}

add_action('init', 'productos_type');
 ```

 En front-page.php

 ```html
     <div class="lista-productos my-5">
        <h2 class='text-center'>PRODUCTOS</h2>
        <div class="row">
        <?php
        $args = array(
            'post_type' => 'producto',
            'post_per_page' => -1, 
            'order'         => 'ASC',
            'orderby'       => 'title'
        );

        $productos = new WP_Query($args);

        if($productos->have_posts()){
            while($productos->have_posts()){
                $productos->the_post();
                ?>

                <div class="col-4">
                    <figure>
                        <?php the_post_thumbnail('large'); ?>
                    </figure>
                    <h4 class='my-3 text-center'>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title();?>
                        </a>
                    </h4>
                </div>
           <?php }
        }
        ?>
      </div>
    </div>
```