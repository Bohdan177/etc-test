<?php
/*
Plugin Name: Custom Post Type
Description: This plugin creates new post type, called "Объект недвижимости". Don't deactivate it if you want to show this data
Version: 1.0
Author: bsadm
Author URI: https://b-s.digital
*/

function create_posttype_property() {
 
    register_post_type( 'property',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Объекты недвижимости' ),
                'singular_name' => __( 'Объект недвижимости' ),
            ),
            'public' => true,
            'menu_icon' => 'dashicons-building',
            'has_archive' => true,
            'rewrite' => array('slug' => 'property/%district%'),
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up creating the new post type
add_action( 'init', 'create_posttype_property' );



// Register new taxonomy
function district_taxonomy() {
 

  $labels = array(
    'name' => _x( 'Районы', 'taxonomy general name' ),
    'singular_name' => _x( 'district', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Districts' ),
    'all_items' => __( 'All Districts' ),
    'parent_item' => __( 'Parent District' ),
    'parent_item_colon' => __( 'Parent District:' ),
    'edit_item' => __( 'Edit District' ), 
    'update_item' => __( 'Update District' ),
    'add_new_item' => __( 'Добавить новый район' ),
    'new_item_name' => __( 'New District Name' ),
    'menu_name' => __( 'Районы' ),
  );    
 
    // Register the taxonomy
  register_taxonomy('district',array('property'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'district'),
  ));
 
}
// Hooking up the new taxonomy
add_action( 'init', 'district_taxonomy', 0 );
  


add_filter('post_type_link', 'property_permalink_structure', 10, 4);
function property_permalink_structure($post_link, $post) {

    if ( is_object( $post ) && $post->post_type == 'property' ){
        $terms = wp_get_object_terms( $post->ID, 'district' );
        if( $terms ){
            return str_replace( '%district%' , $terms[0]->slug , $post_link );
        } else{
            $post_link = str_replace('%district%', 'uncategorized',  $post_link);
        }
    }
    return $post_link;
    

}

// register shortcode
add_shortcode('show_properties', 'render_posttype_property');

function render_posttype_property() {
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
}

/*-----------   Creating and registering WIDGET   ---------*/
class render_properties extends WP_Widget {
  
  function __construct() {
  parent::__construct(
    
  // Base ID of your widget
  'propertis_id', 
    
  // Widget name will appear in UI
  __('Properties list', 'propertis_id_domain'), 
    
  // Widget description
  array( 'description' => __( 'Widget for output of properties', 'propertis_id_domain' ), ) 
  );
  }
    
  // Creating widget front-end
  public function widget( $args, $instance ) {
  $title = apply_filters( 'widget_title', $instance['title'] );
    
  // before and after widget arguments are defined by themes
  echo $args['before_widget'];
  if ( ! empty( $title ) )
  echo $args['before_title'] . $title . $args['after_title'];
    
  // This is where you run the code and display the output

  $args = array(  
    'post_type' => 'property',
    'post_status' => 'publish',
    'posts_per_page' => 8, 
    'orderby' => 'title', 
    'order' => 'ASC', 
);

$loop = new WP_Query( $args ); 
    
while ( $loop->have_posts() ) : $loop->the_post(); ?>
  <a href="<?php the_permalink() ?>" class="property-item" style="margin-top: 20px; display: block;">
      <h3><?php print the_title(); ?></h3>  
      <img style="max-width: 100px;" src="<?php the_field('property_image');  ?>" alt="">
      <p><?php the_field('home_name');  ?></p>
    </a>
<?php
endwhile;

wp_reset_postdata();

  echo $args['after_widget'];
  }
            
  // Widget Backend 
  public function form( $instance ) {
  if ( isset( $instance[ 'title' ] ) ) {
  $title = $instance[ 'title' ];
  }
  else {
  $title = __( 'New title', 'wpb_widget_domain' );
  }
  // Widget admin form
  ?>
  <p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
  </p>
  <?php 
  }
        
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
  $instance = array();
  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  return $instance;
  }
   
  } 

// register widget
function render_properties() {
  register_widget( 'render_properties' );
}
add_action( 'widgets_init', 'render_properties' );
