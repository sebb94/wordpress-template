<?php /*

@package sebatheme
Gallery format
*/

?>

<article id="post-<?php the_ID();?>" <?php post_class('seba-format-gallery');?>>
    <header class="entry-header text-center">

        <?php if(seba_get_attachments()):
         
        $attachments = seba_get_attachments(7); 
      
        ?>

        <div id="post-gallery-<?php the_ID();?>" class="carousel slide seba-carousel-thumb" data-ride="carousel" data-interval="3000">

            <div class="carousel-inner">

                <?php 
                $count = count($attachments)-1;
                for ($i = 0; $i <= $count; $i++):

                    $active = ($i == 0 ? ' active ' : ' ');
                    $n = ( $i == $count ? 0 : $i+1);
                    $nextImg = wp_get_attachment_thumb_url($attachments[$n]->ID);
                    $p = ( $i == 0 ? $count : $i-1);
                    $prevImg = wp_get_attachment_thumb_url($attachments[$p]->ID);
            ?>

                <div class="carousel-item<?php echo $active;?>background-image standard-featured" style="background-image:url(<?php echo wp_get_attachment_url( $attachments[$i]->ID );?>);"> 
  <div class="hide next-image-preview" data-image="<?php echo $nextImg?>"></div>
                 <div class="hide prev-image-preview" data-image="<?php echo $prevImg?>"></div>
                </div>
              
                <?php endfor;?>
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