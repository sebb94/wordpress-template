<?php /*

@package sebatheme

*/

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <header class="entry-header">

        <?php the_title('<h1 class="entry-title">', '</h1>');?>

        <div class="entry-meta">

            <?php echo seba_posted_meta();?>
         
        </div>
    </header>
    <?php 
    var_dump(has_post_thumbnail());
    ?>
    <div clsas="entry-content">
        <?php echo "oi5"; if(has_post_thumbnail()): ?>

            <div class="standard-featured">  
                <?php echo "oi6"; var_dump(the_post_thumbnail('medium'));?>

            </div>
        <?php endif; ?>
    
        <div class="entry-excerpt">
            <?php the_excerpt();?>
        </div>


    </div><!-- .entry-content -->
</article>
<?php
foreach((get_the_category()) as $category)
    {
    $postcat= $category->cat_ID;
    $catname =$category->cat_name;
    }
?>
<h2><?php echo $catname; ?></h2>
<?php $categories = get_categories("child_of=$postcat");
    foreach ($categories as $cat)
    { ?>
    <?php query_posts("cat=$cat->cat_ID&posts_per_page=-1"); ?>
    <h3><?php single_cat_title(); ?></h3>
    <?php while (have_posts()) : the_post(); ?>
    <ul>
        <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <?php the_title(); ?></a>
        </li>
    </ul>
    <?php endwhile; ?>
    <?php } ?>