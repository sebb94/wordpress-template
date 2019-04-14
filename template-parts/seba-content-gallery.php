<?php /*
@package sebatheme
Gallery format
*/

global $detect;
?>

<article id="post-<?php the_ID();?>" <?php post_class('seba-format-gallery');?>>
    <header class="entry-header text-center">

        <?php if(seba_get_attachments() && !$detect->isMobile() && !$detect->isTablet()  ):?>

        <div id="post-gallery-<?php the_ID();?>" class="carousel slide seba-carousel-thumb" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">

                <?php 
                $attachments = seba_get_bs_slides( seba_get_attachments(7) );
           
                foreach ($attachments as $attachment):
                    ?>
            
                <div class="carousel-item<?php echo $attachment['class'];?>background-image standard-featured" style="background-image:url(<?php echo $attachment['url'];?>);"> 
  <div class="hide next-image-preview" data-image="<?php echo $attachment['next_img'];?>"></div>
                 <div class="hide prev-image-preview" data-image="<?php echo $attachment['prev_img']?>"></div>
    <div class="entry-excerpt image-caption">
            <?php echo $attachment['exceprt'];?>
        </div>
              

                </div>
                 
                <?php endforeach;?>
            </div> <!-- caoursel inner -->

            <a class="carousel-control-prev carousel-control left" href="#post-gallery-<?php the_ID();?>" role="button"
                data-slide="prev">
                <div class="preview-container">
                <span class="thumbnail-container"></span>
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </div>
            </a>
       

            <a class="carousel-control-next carousel-control right" href="#post-gallery-<?php the_ID();?>" role="button" data-slide="next">
              <div class="preview-container">
                  <span class="thumbnail-container"></span>
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
        </div>
            </a>

        </div> <!-- carousel -->

        <?php endif; ?>

        <?php the_title('<h1 class="entry-title"><a href="'. esc_url( get_permalink()) . '" rel="bookmark">', '</a></h1>');?>

        <div class="entry-meta">

            <?php echo seba_posted_meta();?>

        </div>
    </header>

    <div clsas="entry-content">

        <?php if(seba_get_attachments() && ( $detect->isMobile() || $detect->isTablet() ) ):?>
            <a class="standard-featured-link" href="<?php the_permalink();?>"> 
            <div class="standard-featured background-image" style="background-image:url(<?php echo seba_get_attachments();?>)"> </div>
        </a>
        <?php endif; ?>


        <div class="entry-excerpt">
            <?php the_excerpt();?>
        </div>

        <div class="button-container text-center">
            <a href="<?php the_permalink();?>" class="btn btn-deafult btn-seba"><?php _e('Read More');?></a>
        </div>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php echo seba_posted_footer();?>
    </footer>
</article>