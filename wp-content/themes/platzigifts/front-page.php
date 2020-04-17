<?php get_header(); ?>

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