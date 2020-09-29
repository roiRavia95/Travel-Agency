<?php
$args = array(
    'post_type' => 'travelAgency_Tours',
    'order' => 'ASC'
);
$tours = new WP_Query($args);

while ($tours->have_posts()):
    $tours->the_post();
    ?>
    <div class='tour text-center'>
        <a href="<?php esc_html(the_permalink()) ?>">
            <?php the_post_thumbnail('card') ?>
            <img class="more-info" src="<?php echo get_template_directory_uri() ?>/Images/moreinfo.png"
                 alt="more-info">
        </a>
        <div class='tour-content'>
            <a href="<?php esc_html(the_permalink()) ?>">
                <h2><?php the_title() ?></h2>
            </a>
            <p class="tour-date">
                <?php echo get_field('date_start') ?> - <?php echo get_field('date_end') ?>
            </p>
            <p class="price">€<?php echo the_field('price') ?> Euros</p>

            <?php the_category(); ?>
        </div>
    </div>
<?php
endwhile;
wp_reset_postdata();
?>