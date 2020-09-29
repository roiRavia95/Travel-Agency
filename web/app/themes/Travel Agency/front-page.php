<?php
get_header();
?>
<?php
$image1 = get_field('image_1');
$image2 = get_field('image_2');
$image3 = get_field('image_3');

?>
    <ul class="slider">
        <li>
            <div class='hero'
                 style='background-image:url(<?php echo wp_get_attachment_image_src($image1, 'full')[0]; ?>)'
                 alt='hero'></div>
        </li>
        <li>
            <div class='hero'
                 style='background-image:url(<?php echo wp_get_attachment_image_src($image2, 'full')[0]; ?>)'
                 alt='hero'></div>
        </li>
        <li>
            <div class='hero'
                 style='background-image:url(<?php echo wp_get_attachment_image_src($image3, 'full')[0]; ?>)'
                 alt='hero'></div>
        </li>
    </ul>
    <main class="main-content front-page container">
        <?php get_template_part('templates/searchform', 'loop') ?>
        <div class='title-line'>
            <h2 class="title text-center"> Upcoming Travels</h2>
            <hr>
        </div>
        <section class='upcoming-travels'>
            <?php
            $args = array(
                'post_type' => 'travelAgency_Tours',
                'posts_per_page' => 3
            );
            $tours = new WP_Query($args);

            while ($tours->have_posts()):$tours->the_post();
                ?>
                <div class="tour text-center">
                    <a href="<?php esc_html(the_permalink()) ?>">
                        <?php the_post_thumbnail('card') ?>
                        <img class="more-info" src="<?php echo get_template_directory_uri() ?>/Images/moreinfo.png"
                             alt="more-info">
                        <div class="tour-info">
                            <h3><?php the_title() ?></h3>
                            <p class="tour-date">
                                <?php echo get_field('date_start') ?> - <?php echo get_field('date_end') ?>
                            </p>
                        </div>
                    </a>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </section>

        <section class='travel-tips-testimonials'>
            <div class='travel-tips'>
                <div class='title-line'>
                    <h2 class="title text-center"> Travel Tips from our Blog</h2>
                    <hr>
                </div>
                <div class='blog-posts'>
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 2
                    );
                    $posts = new WP_Query($args);
                    while ($posts->have_posts()):$posts->the_post();
                        ?>
                        <div class='post'>
                            <a href='<?php the_permalink() ?>'>
                                <?php the_post_thumbnail('side-square'); ?>
                            </a>
                            <div class='blog-content'>
                                <a href='<?php the_permalink() ?>'><h3><?php the_title() ?></h3></a>
                                <p><?php echo substr(get_the_content(), 0, 200) ?></p>
                                <a class='button' href='<?php the_permalink() ?>'>
                                    Continue Reading
                                </a>
                            </div>

                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <div class='testimonials'>
                <div class='title-line'>
                    <h2 class="title text-center"> Testimonials</h2>
                    <hr>
                </div>
                <div class='testimonial-posts'>
                    <?php
                    $args = array(
                        'post_type' => 'Testimonials',
                        'posts_per_page' => 2
                    );
                    $posts = new WP_Query($args);
                    while ($posts->have_posts()):$posts->the_post();
                        ?>
                        <div class='testimonial-post'>
                            <blockquote><?php echo substr(get_the_content(), 0, 200) ?>
                                <div class='author'>
                                    <p><?php echo get_field('author') ?>
                                        ,<span><?php echo get_field('location') ?></span>
                                    </p>
                                </div>
                            </blockquote>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();

                    $testimonials = get_page_by_title('testimonials');
                    ?>
                    <a class='button' href='<?php echo get_permalink($testimonials->ID) ?>'>
                        See More
                    </a>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();