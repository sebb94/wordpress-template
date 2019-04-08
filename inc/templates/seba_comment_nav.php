    <nav class="comment-navigation" role="navigation">
        <h3><?php esc_html_e('Comments Navigation','seba-theme')?></h3>

        <div class="nav-links">
            <div class="nav-previous">
               <?php previous_comments_link( esc_html__('<< ' . 'Older comments', 'seba-theme'))?>
            </div>
            <div class="nav-next">
            <?php next_comments_link(  esc_html__('Newer comments', 'seba-theme') . ' >>' )?>
        </div>

    </nav>