<?php /*

@package sebatheme
Content Video
*/

?>

<article id="post-<?php the_ID();?>" <?php post_class('seba-format-video');?>>
    <header class="entry-header text-center">
    <div class="embed-responsive embed-responsive-16by9">
       <?php echo seba_get_embeded_media(array('video','iframe'));?>
    </div>

        <?php the_title('<h1 class="entry-title"><a href="'. esc_url( get_permalink()) . '" rel="bookmark">', '</a></h1>');?>

        <div class="entry-meta">

            <?php echo seba_posted_meta();?>
         
        </div>
    </header>
 
    <div clsas="entry-content">
        <?php if(has_post_thumbnail()): 
           $image_url = get_the_post_thumbnail_url();
        ?>
            <a class="standard-featured-link" href="<?php the_permalink();?>"> 
            <div class="standard-featured background-image" style="background-image:url(<?php echo $image_url;?>)"> </div>
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
