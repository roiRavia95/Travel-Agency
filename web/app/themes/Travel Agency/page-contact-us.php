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
    <main class="main-content contact-us container">
        <form class='contact-form' method="POST">
            <div class="field">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="field">
                <label for="name">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="field">
                <label for="name">Message:</label>
                <textarea type="textarea" name="message" placeholder="Type here..." rows="10"></textarea>
            </div>
            <div class="field">
                <input class="button primary" type="submit" name="send" value="Send" required>
            </div>
            <input type="hidden" name="hidden" value="1">
        </form>
    </main>

<?php
endwhile;
wp_reset_postdata();
?>
<?php
get_footer();