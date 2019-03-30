<?php /*

@package sebatheme
--- Aside
*/

?>

<article id="post-<?php the_ID();?>" <?php post_class('seba-format-aside');?>>

<div class="aside-container">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-2 text center">
            <?php if(seba_get_attachments()):?>

            <div class="aside-featured background-image"
                style="background-image:url(<?php echo seba_get_attachments();?>)">
            </div>

            <?php endif ?>

        </div> <!-- col -->
        <div class="col-xs-12 col-sm-9 col-md-10">
            <header class="entry-headerr">
                <div class="entry-meta">

                    <?php echo seba_posted_meta();?>

                </div>
            </header>

            <div clsas="entry-content">

                <div class="entry-excerpt">
                    <?php the_content();?>
                </div>

                <div class="button-container text-center">
                    <a href="<?php the_permalink();?>" class="btn btn-deafult btn-seba"><?php _e('Read More');?></a>
                </div>

            </div><!-- .entry-content -->


        </div> <!-- col -->


    </div> <!--  .row -->
    <footer class="entry-footer">
        <?php echo seba_posted_footer();?>
    </footer>
</div><!--  .aside-container -->
</article>