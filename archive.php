<?php 
/*

@package sebatheme

*/
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
                    <header class="archive-header text-center">
                        <?php the_archive_title('<h1 class="page-title">', '</h1>') ?>
                    
                    </header>

              
    <?php if ( is_paged() ): ?>
           <div class="container text-center container-load-previous">
            <a class="btn-seba-load seba-load-more" data-prev="1" data-page="<?php echo seba_check_paged(1)?>" data-url="<?php echo admin_url('admin-ajax.php')?>" data-archive="<?php echo seba_grab_current_url();?>">
            <span class="load-more-icon-container"> 
            <i class="fa fa-spinner"></i>
            <span class="sr-only">Loading...</span> 
                </span>
                <span class="text">
                Load previous
                </span>
      
        </a> 
        </div>

        <?php endif; ?> 
        <div class="container seba-posts-container">
        <?php 
            if( have_posts() ):

              
                echo '<div class="page-limit" data-page="'. $_SERVER["REQUEST_URI"] .'">';
                while( have_posts() ) :the_post();
               
                get_template_part('template-parts/seba-content', get_post_format());
               //  get_template_part('template-parts/seba_content_image', get_post_format('image'));
            endwhile;
                echo '</div>';

            endif;



        ?>        
        </div>

  
        <div class="container text-center">
            <a class="btn-seba-load seba-load-more" data-page="<?php echo seba_check_paged(1)?>" data-url="<?php echo admin_url('admin-ajax.php')?>" data-archive="<?php echo seba_grab_current_url();?>">
            <span class="load-more-icon-container">
            <i class="fa fa-spinner"></i>
            <span class="sr-only">Loading...</span> 
                </span>
                <span class="text">
            Load more
                </span>
      
        
        </a> 
        
        </div>
    </main>
</div>


<?php 
get_footer();
?>