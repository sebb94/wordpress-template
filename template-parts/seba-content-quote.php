<?php /*

@package sebatheme
Quote
*/

?>

<article id="post-<?php the_ID();?>" <?php post_class('seba-format-quote');?>>
    <header class="entry-header text-center">

    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2">
             <h1 class="quote-content">
                  <a href="<?php the_permalink();?>" rel="bookmark">  
                    <?php echo get_the_content();?></a></h1>
                    <?php the_title('<h2 class="quote-author">-','-</h2>');?>

        </div>
    </div>
       

    
    </header>
    <footer class="entry-footer">
            <?php echo seba_posted_footer();?>
    </footer>
</article>
