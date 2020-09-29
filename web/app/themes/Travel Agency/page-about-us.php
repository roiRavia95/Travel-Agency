<?php
/*
*Template Name: Page with sidebar
*/
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
    <main class="main-content container with-side">
        <div class='content'>
            <?php
            the_content();
            ?>
        </div>
        <?php
        $image_1_id = get_field('image_1');
        $image_1 = wp_get_attachment_image_src($image_1_id, 'side-square');
        $image_2_id = get_field('image_2');
        $image_2 = wp_get_attachment_image_src($image_2_id, 'side-square');
        ?>
        <div class='side-images text-center'>
            <img src="<?php echo $image_2[0] ?>" alt="image">
            <img src="<?php echo $image_1[0] ?>" alt="image">
        </div>
    </main>

<?php
endwhile;
wp_reset_postdata();
?>
<?php
get_footer();