<?php
/*
Template Name: Single Property template
Template Post Type: property
*/

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<style>
    .property-item{
        margin-top: 20px;
    }
    .property-bg{
        min-height: 400px;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        display: flex;
        align-items: flex-end;
        /* padding: 20px; */
        color: #fff;
        position: relative;
    }
    .property-overlay{
        background: #000;
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: .3;
        z-index: 1;
    }
    .property-bg h1{
        padding: 20px;
        position: relative;
        z-index: 2;
    }
    ul{
        padding: 0;
    }
    li{
        list-style: none;
    }
    .property-description, .flat-description{
        margin-top: 30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .property-description__item, .flat-description__item{
        display: flex;
        gap: 30px;
    }
</style>
    <div class="wrapper" id="single-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <div class="row">

            <!-- Do the left sidebar check -->
            <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

            <main class="site-main" id="main">
            <?php the_terms( $post->ID, 'district', 'Районы: ', ', ', ' ' ); ?>

            <div class="property-item">
                <div class="property-bg" style="background-image:url('<?php the_field('property_image'); ?>')">
                <div class="property-overlay"></div>
                     <h1 class="title"><?php the_field('home_name'); ?></h1>
                </div>
                <ul class="property-description">
                    <li class="property-description__item">
                        <p><strong>Координаты дома:</strong></p>
                        <p class="coordinates"><?php the_field('coordinates'); ?></p>
                    </li>
                    <li class="property-description__item">
                        <p><strong>Колличество этажей:</strong></p>
                        <p class="floor-number"><?php the_field('level_number'); ?></p>
                    </li>
                    <li class="property-description__item">
                        <p><strong>Тип строения:</strong></p>
                        <p class="build-type"><?php the_field('material_type'); ?></p>
                    </li>
                    <li class="property-description__item">
                        <p><strong>Экологичность:</strong></p>
                        <p class="ecology"><?php the_field('ecology_rate'); ?></p>
                    </li>
                </ul>
                <?php if( have_rows('flat_item') ): ?>
                <h2>Помещение</h2>
                        <?php while ( have_rows('flat_item') ) : the_row(); ?>
                        <div class="property-bg flat-bg" style="background-image:url('<?php the_sub_field('flat_image'); ?>')"></div>
                        <ul class="flat-description">
                            <li class="flat-description__item">
                                <p><strong>Площадь:</strong></p>
                                <p><?php the_sub_field('area'); ?> м<sup>2</sup></p>
                            </li>
                            <li class="flat-description__item">
                                <p><strong>Кол-во комнат:</strong></p>
                                <p><?php the_sub_field('rooms_number'); ?></p>
                            </li>
                            <li class="flat-description__item">
                                <p><strong>Балкон:</strong></p>
                                <p><?php the_sub_field('balcon'); ?></p>
                            </li>
                            <li class="flat-description__item">
                                <p><strong>Санузел:</strong></p>
                                <p><?php the_sub_field('bathroom'); ?></p>
                            </li>
                            
                        </ul>
                        <?php endwhile; ?>
                    <?php else : ?>
                    <?php endif; ?>
                
            </div>

                

            </main><!-- #main -->

            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

        </div><!-- .row -->

    </div><!-- #content -->

    </div><!-- #single-wrapper -->

<?php
get_sidebar();


get_footer();