<?php /*

@package sebatheme

*/

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <header class="entry-header text-center">

        <?php the_title('<h1 class="entry-title"><a href="'. esc_url( get_permalink()) . '" rel="bookmark">', '</a></h1>');?>

        <div class="entry-meta">

            <?php echo seba_posted_meta();?>
         
        </div>
    </header>
 
    <div clsas="entry-content">
        <?php if(seba_get_attachments()):?>
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
