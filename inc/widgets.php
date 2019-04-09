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