<?php
function travelAgency_save_contacts()
{
    global $wpdb;

    if (isset($_POST['send']) && ($_POST['hidden'] == '1')) {
        //First we sanitze the recieved data
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_text_field($_POST['message']);

        //Then we initiate the table
        $table = $wpdb->prefix . 'contacts';

        $data = array(
            'name' => $name,
            'email' => $email,
            'message' => $message
        );
        $format = array(
            '%s',
            '%s',
            '%s',
        );
        $wpdb->insert($table, $data, $format);

        $page = get_page_by_title('Thanks for contact');
        wp_redirect(get_permalink($page));
        exit();
    }
}

add_action('init', 'travelAgency_save_contacts');

function travelAgency_remove_contact()
{
    global $wpdb;
    $table = $wpdb->prefix . "contacts";
    $post_id = $_POST['id'];
    // $_POST is the data from the ajax call with the post method
    if ($_POST['type'] == 'delete') {
        $result = $wpdb->delete($table, array("id" => $post_id), array("%d"));
    }
    if ($result == 1) {
        $response = array(
            "response" => "Success",
            "id" => $post_id
        );
    } else {
        $response = array(
            "response" => "Error",
        );
    };
    //Always add die() with ajax functions
    die(json_encode($response));
}

add_action("wp_ajax_travelAgency_remove_contact", "travelAgency_remove_contact")
?>