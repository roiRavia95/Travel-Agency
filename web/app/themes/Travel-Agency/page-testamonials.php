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
    <main class="main-content container">
        <div class='content'>
            <?php
            $args = [
                'post_type' => 'Testimonials',
                'order' => 'ASC'
            ];
            $testimonials = new WP_Query($args);
            while ($testimonials->have_posts()):$testimonials->the_post();
                ?>
                <div class='testimonial'>
                    <h3><?php the_title() ?></h3>
                    <blockquote><?php the_content(); ?> </blockquote>
                    <div class='author'>
                        <p><?php echo get_field('author') ?></p>
                        <p><?php echo get_field('location') ?></p>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </main>

<?php
endwhile;
wp_reset_postdata();
?>
<?php
get_footer();