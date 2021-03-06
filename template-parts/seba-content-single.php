<?php /*

@package sebatheme
single.php
*/

?>

<article id="post-<?php the_ID();?>" <?php post_class('seba-single');?>>
    <header class="entry-header text-center">

        <?php the_title('<h1 class="entry-title">', '</h1>');?>

        <div class="entry-meta">

            <?php echo seba_posted_meta();?>
         
        </div>
    </header>
 
    <div class="entry-content clearfix">

    <?php the_content();?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php echo seba_posted_footer();?>
    </footer>
</article>
