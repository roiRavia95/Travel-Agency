<?php
wp_footer();
?>

<footer>
    <main class="container">
        <div class='about-us-footer'>
            <h3>About Us</h3>
            <?php $aboutUs = get_page_by_title('About Us'); ?>
            <p>
                <?php echo substr($aboutUs->post_content, 0, 150); ?>
            </p>


        </div>
        <div class='upcoming-travels-footer'>
            <h3>Upcoming Travels</h3>
            <?php $args = array(
                'post_type' => 'travelAgency_Tours',
                'posts_per_page' => 2
            );
            $tours = new WP_Query($args);
            while ($tours->have_posts()):
                $tours->the_post();
                ?>
                <a href="<?php the_permalink() ?>">
                    <div class="footer-post">
                        <?php
                        the_post_thumbnail('side-square');
                        $string = " ";
                        $string .= acf_get_post_title();
                        $city = explode(",", $string)[0];
                        ?>

                        <h4><?php echo $city ?></h4>

                    </div>
                </a>
            <?php
            endwhile;
            ?>

        </div>
        <div class='travel-tip-footer'>
            <h3>Travel Tips</h3>
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 2
            );
            $posts = new WP_Query($args);
            while ($posts->have_posts()):$posts->the_post();
                ?>
                <a href="<?php the_permalink() ?>">
                    <div class="footer-post">
                        <?php
                        the_post_thumbnail('side-square');
                        ?>
                        <h4><?php the_title() ?></h4>
                    </div>
                </a>
            <?php
            endwhile;
            ?>
        </div>

        <div class='coupons-footer'>
            <?php
            while ($tours->have_posts()):
                $tours->the_post();
                $string = " ";
                $string .= acf_get_post_title();
                $city = explode(",", $string)[0];

                $coupons = get_field("coupon");
                ?>
                <a href="<?php the_permalink() ?>">
                    <?php if ($coupons <= 10) { ?>
                        <div class="footer-coupon red">
                            <?php
                            the_post_thumbnail('side-square');
                            ?>
                            <div class="coupon-content">
                                <h3><?php echo $city ?></h3>
                                <h3 class="discount"><?php echo $coupons ?>% OFF</h3>
                            </div>
                        </div>
                    <?php } else {
                        ?>
                        <div class="footer-coupon blue">
                            <?php
                            the_post_thumbnail('side-square');
                            ?>
                            <div class="coupon-content">
                                <h3><?php echo $city ?></h3>
                                <h3 class="discount"><?php echo $coupons ?>% OFF</h3>
                            </div>
                        </div>
                        <?php
                    } ?>
                </a>
            <?php
            endwhile;
            ?>
        </div>
    </main>
</footer>

</body>
</html>