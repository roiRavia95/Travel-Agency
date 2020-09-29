<?php
function travelAgency_contacts()
{
    add_menu_page('Contacts', 'Contacts', 'administrator', 'Contacts', 'travelAgency_adjustments', '', 20);
}

;
add_action('admin_menu', 'travelAgency_contacts');

function travelAgency_adjustments()
{
    ?>
    <div class='wrap'>
        <h2>Contacts</h2>
        <table class='wp-list-table widefat striped'>
            <thead>
            <tr>
                <th class='manage-column'>ID</th>
                <th class='manage-column'>Name</th>
                <th class='manage-column'>Email</th>
                <th class='manage-column'>Message</th>
                <th class='manage-column remove'>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $wpdb;
            $table = $wpdb->prefix . 'contacts';
            $data = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);
            foreach ($data as $contact) {
                ?>
                <tr>
                    <td class='data'><?php echo $contact['id'] ?></td>
                    <td class='data'><?php echo $contact['name'] ?></td>
                    <td class='data'><?php echo $contact['email'] ?></td>
                    <td class='data'><?php echo $contact['message'] ?></td>
                    <td class='remove'><a href="#" class="remove_contact"
                                          data-reservation="<?php echo $contact['id'] ?>">Remove</a></td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
    <?php
}

?>