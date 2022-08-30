<?php

add_filter('manage_booking_posts_columns', 'set_default_packbook_columns');
function set_default_packbook_columns($columns)
{
    $get_the_packbook_tbl = array(
        'cb'                     => '<input type="checkbox" />',
        'title'                 => __(apply_filters('pb_admin_tbl_list_tracking_number', 'Tracking Number'), 'packbook'),

        'registered_shipper'     => __(apply_filters('pb_admin_tbl_registered_shipper', 'Package Create'), 'packbook'),

        packbook_shipper_meta_filter()     => packbook_shipper_label_filter(),
        packbook_receiver_meta_filter() => packbook_receiver_label_filter(),
        'packbook_date'             => __(apply_filters('pb_admin_tbl_list_date', 'Date'), 'packbook'),
        'packbook_status'         => __(apply_filters('pb_admin_tbl_list_status', 'Status'), 'packbook'),
        'packbook_actions'         => __(apply_filters('pb_admin_tbl_list_action', 'Actions'), 'packbook'),
    );
    $get_the_packbook_tbl         = apply_filters('default_packbook_columns', $get_the_packbook_tbl);
    return $get_the_packbook_tbl;
}
add_action('manage_booking_posts_custom_column', 'manage_default_packbook_columns', 10, 2);
function manage_default_packbook_columns($column, $post_id)
{
    global $post, $packbook;


    switch ($column) {



        case 'registered_shipper':

            echo ucfirst(get_the_author_meta('display_name', $post->post_author));
            break;
        case packbook_shipper_meta_filter():
            $shipper_name     = packbook_shipper_meta_filter();
            $packbook_shipper_name = get_post_meta($post_id, $shipper_name, true);
            echo ($packbook_shipper_name) ? $packbook_shipper_name : '';
            break;
        case packbook_receiver_meta_filter():
            $receiver_name     = packbook_receiver_meta_filter();
            $packbook_receiver_name = get_post_meta($post_id, $receiver_name, true);
            echo ($packbook_receiver_name) ? $packbook_receiver_name : '';
            break;
        case 'packbook_date':
            $packbook_date_publish = get_the_date($packbook->date_format, $post_id);
            echo $packbook_date_publish;
            break;
        case 'packbook_status':
            $packbook_status = pb_package_meta($post_id, 'parcel_status');
            echo $packbook_status;
            break;

        case 'packbook_actions':
            $total_cost = pb_package_meta($post_id, 'total_cost');
            echo pb_price($total_cost, true);
            break;
        default:
            break;
    }
}
add_filter('manage_edit-booking_sortable_columns', 'set_custom_packbook_sortable_columns');
function set_custom_packbook_sortable_columns($columns)
{
    $columns['packbook_date']             = 'packbook_date';

    $columns['registered_shipper']         = 'registered_shipper';
    $columns[packbook_shipper_meta_filter()]     = packbook_shipper_meta_filter();
    $columns[packbook_receiver_meta_filter()]     = packbook_receiver_meta_filter();
    return $columns;
}
add_action('pre_get_posts', 'packbook_custom_orderby');
function packbook_custom_orderby($query)
{
    if (!is_admin())
        return;
    if (isset($_GET['post_type']) && $_GET['post_type'] == 'booking') {
        $orderby = $query->get('orderby');
        if (!isset($_GET['orderby'])) {
            $query->set('orderby', 'packbook_date');
            $query->set('order', 'DESC');
        }
        if ('agent_fields' == $orderby) {
            $query->set('meta_key', 'agent_fields');
            $query->set('orderby', 'meta_value');
        }
        if (packbook_shipper_meta_filter() == $orderby) {
            $query->set('meta_key', packbook_shipper_meta_filter());
            $query->set('orderby', 'meta_value');
        }
        if (packbook_receiver_meta_filter() == $orderby) {
            $query->set('meta_key', packbook_receiver_meta_filter());
            $query->set('orderby', 'meta_value');
        }
    }
}
/*
** Bulk and Quick Edit function
*/
//add_action('quick_edit_custom_box', 'packbook_bulk_update_status', 10, 2);
//add_action('bulk_edit_custom_box', 'packbook_bulk_update_status', 10, 2);
function packbook_bulk_update_status($column_name,  $screen_post_type)
{
    
    if ($screen_post_type == 'booking') {
        wp_nonce_field('packbook_bulk_update_action', 'packbook_bulk_update_nonce');
        if ($column_name == 'packbook_status') {
?>
            <fieldset id="shipment-bulk-update" class="inline-edit-col-left" style="border: 1px solid #ddd; margin-top: 6px; padding:8px;">
                <div class="inline-edit-col pb-status-section">
                    <div class="inline-edit-group wp-clearfix">
                        <legend class="inline-edit-legend"><?php esc_html_e('Update Shipment Status', 'packbook') ?></legend>
                        <p><input style="width:100%;" class="bulkdate" type="date" name="status_date" placeholder="<?php echo $packbook->date_format; ?>" autocomplete="off" /></p>
                        <p><input style="width:100%;" class="bulktime" type="time" name="status_time" autocomplete="off" /></p>
                        <p><input style="width:100%;" class="status_location" type="text" name="status_location" placeholder="<?php esc_html_e('Current City', 'packbook'); ?>" autocomplete="off" /></p>
                        <?php if (!empty(packbook_default_status())) : ?>
                            <select style="width:100%;" class="packbook_status" name="packbook_status">
                                <option value=""><?php esc_html_e('--Select Status--', 'packbook') ?></option>
                                <?php
                                foreach (packbook_default_status() as $value) {
                                ?><option value="<?php echo $value; ?>"><?php echo $value; ?></option><?php
                                                                                                    }
                                                                                                        ?>
                            </select>
                        <?php else : ?>
                           
                        <?php endif; ?>
                        
                    </div>
                </div>
            </fieldset>
            
<?php
        }
    }
}

function packbook_shipper_meta_filter()
{
    return apply_filters('packbook_shipper_meta_filter', 'sender_name');
}
function packbook_shipper_label_filter()
{
    return apply_filters('packbook_shipper_label_filter', esc_html__('Sender Name', 'packbook'));
}
function packbook_receiver_meta_filter()
{
    return apply_filters('packbook_receiver_meta_filter', 'receiver_name');
}
function packbook_receiver_label_filter()
{
    return apply_filters('packbook_receiver_label_filter', esc_html__('Receiver Name', 'packbook'));
}