<?php
get_header();
?>
<?php
while (have_posts()):the_post();
    if (has_post_thumbnail()) {
        $thumbnailURL = get_the_post_thumbnail_url();
    };
    ?>

    <div class='hero' style='background-image:url(<?php echo $thumbnailURL; ?>)' alt='hero'></div>
    <div class='title-line'>
        <h2 class="title text-center"> <?php the_title(); ?></h2>
        <hr>
    </div>
    <main class="main-content single-blog-post container">
        <div class="information">
            <div class='blog-information'>
                <p><span>Published:</span> <?php echo the_time('F j, yy') ?></p>
                <p><span>By:</span> <?php the_author() ?> </p>
                <span class="category"><span>Category:</span> <?php the_category(); ?></span>
            </div>
            <div class="social">
                <script type="text/javascript"
                        src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f6c735fd9b515c8"></script>
                <div class="addthis_inline_share_toolbox"></div>

            </div>
        </div>
        <div class='content'>
            <?php
            the_content();
            ?>
        </div>
    </main>

<?php
endwhile;
wp_reset_postdata();
?>
<?php
get_footer();