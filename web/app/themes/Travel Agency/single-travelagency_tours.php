<?php
get_header();
?>
    <p style="display: none">single.php</p>
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
    <main class="main-content container with-side tour">
        <div class='content'>
            <?php the_post_thumbnail('large');
            ?>
            <div class='tour-information'>
                <p class='Date'><span>Leaving and Returning Date: </span> <?php echo get_field('date_start') ?>
                    - <?php echo get_field('date_end') ?></p>
                <p class='location'><span> Location for departure: </span> <?php echo get_field('departure_location') ?>
                </p>
                <p class='seats'><span>Available Seats: </span> <?php echo get_field('seats') ?></p>
                <p class='price'><span>Price: </span>€<?php echo get_field('price') ?> Euros</p>
            </div>

            <?php
            the_content();
            ?>
        </div>
        <aside>
            <h2 class="title">Gallery</h2>
            <div class="gallery">
                <?php echo get_field('gallery') ?>
            </div>
        </aside>
    </main>

<?php
endwhile;
wp_reset_postdata();
?>
<?php
get_footer();