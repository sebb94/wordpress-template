<?php 

/* This is the template for the header

@package sebatheme
*/
?>

<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <title><?php bloginfo('name'); wp_title();?></title>
        <meta name="description" content="<?php bloginfo('description');?>"> 
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if( is_singular() && pings_open(get_queried_object() ) ):?>
            <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>
<body <?php body_class();?>>

    <div class="seba-sidebar sidebar-closed">

            <div class="seba-sidebar-container">
                <a class="js-toggleSidebar sidebar-close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                    <div class="seba-sidebar-scroll">
                
                        <?php get_sidebar();?>

                    </div>
            </div>
    </div>

    <div class="sidebar-overlay js-toggleSidebar">
 

    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-container text-center background-image" style="background-image: url(<?php header_image();?>)">

                      <a class="js-toggleSidebar sidebar-open">
                  <i class="fas fa-bars"></i>
                </a>

                    <div class="header-content">
                        <i class="fa fa-smile-wink"></i>
                        <h1 class="site-title"><?php bloginfo('name');?></h1>
                        <h2 class="site-description"><?php bloginfo('description');?></h2>
                    </div> 


                </div> <!-- header-container -->
                 <div class="nav-container">
                        <nav class="navbar navbar-expand-lg navbar-dark navbar-seba">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary_menu',
                                    'container' => false,
                                    'menu_class' => 'navbar-nav'
                                ));
                            ?>
                        </nav>
                </div> <!-- nav container -->
          </div>  <!-- col-xs-12 -->
        </div>  <!-- .row -->
        <div class="row">

            <div class="col-12">
                   
          
            </div> <!-- col-xs-12 -->

        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
