<?php 
/*

@package sebatheme

Widget

*/

class Seba_Profile_Widget extends WP_Widget{


    // widget name, desc ...

    public function __construct(){

        $widget_ops = array(

            'classname'     => 'seba-profile-widget',
            'description'   => 'Custom Seba Profile Widget', 

        );
        parent::__construct('seba_profile', 'Seba Profile', $widget_ops);
    }

    // back-end 

    public function form( $instance ){
        echo '<p><strong>No options for this widget!</strong><br/> You can control the fields of this widget from <a href="/wp-admin/admin.php?page=seba_options">This</a> page</p>';
    }

    // front-end 

    public function widget( $args, $instance){

        $firstName=esc_attr(get_option('first_name'));
        $lastName=esc_attr(get_option('last_name'));
        $fullName = $firstName . " " . $lastName;
        $bioDesc =esc_attr(get_option('bio_description'));
        $picture = esc_attr(get_option('profile_picture'));
        $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
        $facebook_icon = esc_attr( get_option( 'facebook_handler' ) );

        echo $args['before_widget'];

        ?>
            <div class="image-container">
                <div id="profile-picture-preview" class="profile-picture"
                    style="background-image:url(<?php print $picture;?>)">

                </div>
            </div>
            <h1 class="seba-username"><?php echo $fullName;?></h1>
            <h2 class="seba-description"><?php echo $bioDesc;?></h2>
            <div class="icons-wrapper">
                           <?php if( !empty( $facebook_icon ) ): ?>
                <a href="https://facebok.com/<?php echo $facebook_icon;?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <?php endif; 
                
                    if( !empty( $twitter_icon ) ): ?>
 <a href="https://twitter.com/<?php echo $facebook_icon;?>" target="_blank"><i class="fab fa-twitter"></i></a>
   <?php endif; ?>
            </div>
        <?php 
        echo $args['after_widget'];

    }

}

add_action('widgets_init', function(){
    register_widget('Seba_Profile_Widget');
} );

/* tags remove font-size */

add_filter('wp_generate_tag_cloud', 'myprefix_tag_cloud',10,1);

function myprefix_tag_cloud($tag_string){
  return preg_replace('/style=("|\')(.*?)("|\')/','',$tag_string);
}

/* Save post view */

function seba_save_post_views($postID){

    $metaKey = 'seba_post_views';
    $views = get_post_meta($postID, $metaKey, true);
    
    $count = ( empty( $views ) ? '0' : $views );
    $count++;

    update_post_meta( $postID, $metaKey, $count);

    echo $views;
}
remove_action('wp_head','adjacent_posts_rel_link_wp_head',10,0);

/* Popular post widget */

Class Seba_Popular_Posts_Widget extends WP_Widget {


        public function __construct(){

        $widget_ops = array(

            'classname'     => 'seba-popular-posts-widget',
            'description'   => 'Custom Seba Popular Posts Widget', 

        );
        parent::__construct('seba_popular_posts', 'Seba Popular Posts', $widget_ops);
    }

    // back-end 

    public function form( $instance ){
       
        $title = ( !empty( $instance['title'] ) ? $instance['title'] : 'Popular Posts' );
        $total = ( !empty( $instance['tot'] ) ? absint( $instance['tot'] ) : 4 );

        $output  = "<p>";
        $output .= '<label for="' . esc_attr( $this->get_field_id('title') ) . '">Title:</label>';
        $output .= '<input type="text" class="widefat" id="'. esc_attr( $this->get_field_id('title') ) . '" name="' . esc_attr( $this->get_field_name('title') ) . '" value="' . esc_attr( $title) . '"' ;
        $output .= "</p>";
        $output  .= "<p>";
        $output .= '<label for="' . esc_attr( $this->get_field_id('tot') ) . '">Number of posts:</label>';
        $output .= '<input type="number" class="widefat" id="'. esc_attr( $this->get_field_id('tot') ) . '" name="' . esc_attr( $this->get_field_name('tot') ) . '" value="' . esc_attr( $total) . '"' ;
        $output .= "</p>";

        echo $output;

    }

    //update widget 

    public function update( $new_instance, $old_instance ){

        $instance = array(); 
       $instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
        $instance['tot'] = ( !empty( $new_instance['tot'] ) ? absint( strip_tags( $new_instance['tot'] ) ) : 0);

        return $instance;
    }

    //front-end display widget 

    public function widget( $args, $instance ){

        $tot = absint( $instance['tot'] );
        $posts_args = array(
            'post_type'     => 'post',
            'post_per_page' => $tot,
            'meta_key'      => 'seba_post_views', 
            'order_by'      => 'meta_value_num', 
            'order'         => 'DESC'

        );

        $posts_query = new WP_Query($posts_args);

        echo $args['before_widget'];
    
        if( !empty($instance['title']) ):
 
            echo $args ['before_title'] . apply_filters('widget-title',$instance['title']) . $args['after_title'];

        endif;
        if ($posts_query->have_posts() ):

            echo '<ul>';
            
            while ( $posts_query->have_posts() ): 
                $posts_query->the_post();
             
              $postID = get_the_id();
                $numViews = get_post_meta($postID , 'seba_post_views',true);
                echo '<li class="popular-li"><a href="' . get_the_permalink($postID) . '">' .  get_the_title() . '</a><span class="popular-number">' . $numViews .  '</span></li>';

            endwhile;
            
            echo '</ul>';


        endif;

        echo $args['after_widget'];

    }

}

add_action('widgets_init', function(){
    register_widget('Seba_Popular_Posts_Widget');
} );