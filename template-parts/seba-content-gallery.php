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

        <div id="post-gallery-<?php the_ID();?>" class="carousel slide" data-ride="carousel" data-interval="3000">

            <div class="carousel-inner">

                <?php 
        $i = 0;
        foreach ($attachments as $attachment):
            $active = ($i == 0 ? ' active ' : ' ');
            ?>
                <div class="carousel-item<?php echo $active;?>background-image standard-featured"
                    style="background-image:url(<?php echo wp_get_attachment_url( $attachment->ID );?>);"> </div>

              
              <?php $i++; endforeach;?>
            </div>
      <a class="carousel-control-prev" href="#post-gallery-<?php the_ID();?>" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#post-gallery-<?php the_ID();?>" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
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