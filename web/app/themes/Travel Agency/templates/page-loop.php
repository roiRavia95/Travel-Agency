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
    <main class="main-content container">
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