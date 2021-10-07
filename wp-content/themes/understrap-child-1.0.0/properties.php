<?php
/*
Template Name: Properties
Template Post Type: page
*/

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <h1>This is a property list</h1>

        <div class="row">

        <main class="site-main" id="main">

        <?php
            $args = array(  
                'post_type' => 'property',
                'post_status' => 'publish',
                'posts_per_page' => 8, 
                'orderby' => 'title', 
                'order' => 'ASC', 
            );
        
            $loop = new WP_Query( $args ); 
                
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
           <a href="<?php the_permalink() ?>" class="property-item" style="margin-top: 50px; display: block;">
                <h3><?php print the_title(); ?></h3>  
                <img style="max-width: 300px;" src="<?php the_field('property_image');  ?>" alt="">
                <h2><?php the_field('home_name');  ?></h2>
            </a>
           <?php 
            endwhile;
            wp_reset_postdata();
            ?>

            </main><!-- #main -->

            <!-- The pagination component -->
            <?php understrap_pagination(); ?>
            <!-- Do the left sidebar check -->
            <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

  

            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_sidebar();


get_footer();