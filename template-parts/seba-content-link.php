<?php /*

@package sebatheme

*/

?>

<article id="post-<?php the_ID();?>" <?php post_class('seba-format-link');?>>
    <header class="entry-header text-center">

       <?php  $link = seba_grab_url(); ?>
        <?php the_title('<h1 class="entry-title"><a href="'. $link .'" target="_blank">', '<div class="link-icon"><i class="fa fa-link" aria-hidden="true"></i></div></a></h1>');?>

  
    </header>
 
 
</article>
