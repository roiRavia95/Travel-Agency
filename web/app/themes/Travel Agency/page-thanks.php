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
        <h2 class="title text-center"> Thanks for reaching out!</h2>
        <hr>
    </div>
    <main class="main-content container text-center thanks">
        <h2><?php the_content() ?></h2>
        <a class="button" href="/">Back Home</a>
    </main>

<?php
endwhile;
wp_reset_postdata();
?>
<?php
get_footer();