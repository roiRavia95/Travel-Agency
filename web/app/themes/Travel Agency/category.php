<?php
get_header();
?>

<?php
$category = get_queried_object();
if (has_post_thumbnail()) {
    $thumbnailURL = get_the_post_thumbnail_url();
};
$parent_id = $category->parent;
$parent_category = get_category($parent_id);
$category_name = $parent_category->name;

$args = array(
    'post_type' => 'travelAgency_Tours',
    'category_name' => $category->name
);
$tours = new WP_query($args);
?>
    <div class='hero' style='background-image:url(<?php echo $thumbnailURL; ?>)' alt='hero'></div>
    <div class='title-line'>
        <h2 class="title text-center">Category: <?php echo $category->name; ?></h2>
        <hr>
    </div>
    <main class="main-content categories container">
        <?php
        if ($category_name == 'Tours') {


            while ($tours->have_posts()):$tours->the_post(); ?>
                <div class='tour'>
                    <a href="<?php esc_html(the_permalink()) ?>">
                        <?php the_post_thumbnail('full') ?>
                    </a>
                    <a href="<?php esc_html(the_permalink()) ?>">
                        <h2><?php the_title() ?></h2>
                        <?php the_excerpt() ?>
                    </a>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
        } else {
            while (have_posts()):the_post(); ?>
                <div class='tour'>
                    <a href="<?php esc_html(the_permalink()) ?>">
                        <?php the_post_thumbnail('full') ?>
                    </a>
                    <a href="<?php esc_html(the_permalink()) ?>">
                        <h2><?php the_title() ?></h2>
                        <?php the_excerpt() ?>
                    </a>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
        }
        ?>
    </main>


<?php
get_footer();