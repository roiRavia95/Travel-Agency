<?php
get_header();
?>
<?php
$blog_page_id = get_option('page_for_posts');
$image = get_post_thumbnail_id($blog_page_id);
$image = wp_get_attachment_image_src($image, 'full');
?>
    <div class='hero' style='background-image:url(<?php echo $image[0]; ?>)' alt='hero'></div>
    <div class='title-line'>
        <h2 class="title text-center"> Our <?php echo get_the_title($blog_page_id) ?></h2>
        <hr>
    </div>
<?php $post_number = 0; ?>
    <main class="main-content blog container">
        <?php
        while (have_posts()):
            the_post();
            $post_number++;
            ?>

            <div class='blog-post'>
                <?php
                if ($post_number === 1) {
                    ?>
                    <a href='<?php the_permalink() ?>'>
                        <?php the_post_thumbnail('full', ['class' => 'first-image']); ?>
                    </a>
                    <div class='blog-information'>
                        <p><span>Published:</span> <?php echo the_time('F j, yy') ?></p>
                        <p><span>By:</span> <?php the_author() ?> </p>
                        <span class='category'><span>Category:</span><?php the_category(); ?></span>
                    </div>
                    <?php
                } else {
                    ?><a href='<?php the_permalink() ?>'>
                    <?php the_post_thumbnail('square'); ?>
                    </a>
                    <?php
                }
                ?>
                <div class='blog-content'>
                    <a href='<?php the_permalink() ?>'><h3><?php the_title() ?></h3></a>
                    <?php the_excerpt() ?>
                </div>
            </div>

        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </main>
<?php
get_footer();