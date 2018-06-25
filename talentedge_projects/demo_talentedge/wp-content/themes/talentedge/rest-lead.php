<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Rest Lead
 *
 */
acf_form_head();

get_header();
?>
<link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/lp-style.css?date=<?= date() ?>" rel="stylesheet">
<link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/myprofile.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />
<script src="https://connect.facebook.net/en_US/all.js#xfbml=1&appId=1810893482489616"></script>
<script src="https://apis.google.com/js/client.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        //$('#editProfile form input[type=email]').prop('disabled', true);
    });
</script>


<?php
//$order          = new WC_Order(38491); //echo '<pre>'; print_r($order);
//echo 'xx==='.$order->post_status; //xx===wc-completed
//die;
//$invoice = new BEWPI_Invoice(38699);
//$path    = $invoice->save("F");
//$path = "nas/content/live/talentedge/wp-content/uploads/bewpi-invoices/2018/17-18-01-139.pdf";
//$whatIWant = get_bloginfo('url')."/wp-content".substr($path, strpos($path, "wp-content") + 10);
//echo 'ccccccc===='.$whatIWant; die;
//echo $path; die;

download_order_reportx();

function download_order_reportx()
{
    ?>
    <style type="text/css">
        .or-export{
            padding-top: 20px;
        }
    </style>


    <div class="or-export">
        <h2>WooCommerce Order Export</h2>
        <form method="POST" action="#">
            <p>
            <labe>Start Date</labe>
            <input type="date" class="start_date" name="start_date" value="<?php echo $_POST['start_date']; ?>" required>
            </p>
            <p>
            <labe>End Date</labe>
            <input type="date" class="end_date" name="end_date" value="<?php echo $_POST['end_date']; ?>" required>
            </p>
            <input type="submit" id="export-order" class="button" value="Export Orders" name="export">
        </form>
    </div>

    <?php
    $startDate = $_POST['start_date'];
    $endDate   = $_POST['end_date'];
    if (isset($startDate))
    {
        global $wpdb;
        $newarray  = array();
        $newarray1 = array();
        $results   = $wpdb->get_results("select
            p.ID as order_id,
            p.post_date,
            max( CASE WHEN pm.meta_key = '_customer_user' and p.ID = pm.post_id THEN pm.meta_value END ) as user_id,
            max( CASE WHEN pm.meta_key = '_billing_email' and p.ID = pm.post_id THEN pm.meta_value END ) as billing_email,
            max( CASE WHEN pm.meta_key = '_customer_user' and p.ID = pm.post_id THEN pm.meta_value END ) as customer_user,
            max( CASE WHEN pm.meta_key = '_billing_first_name' and p.ID = pm.post_id THEN pm.meta_value END ) as _billing_first_name,
            max( CASE WHEN pm.meta_key = '_billing_last_name' and p.ID = pm.post_id THEN pm.meta_value END ) as _billing_last_name,
             max( CASE WHEN pm.meta_key = '_billing_country' and p.ID = pm.post_id THEN pm.meta_value END ) as _billing_country,
            max( CASE WHEN pm.meta_key = '_billing_state' and p.ID = pm.post_id THEN pm.meta_value END ) as _billing_state,
          max( CASE WHEN pm.meta_key = '_order_tax' and p.ID = pm.post_id THEN pm.meta_value END ) as order_tax,
          max( CASE WHEN pm.meta_key = '_order_total' and p.ID = pm.post_id THEN pm.meta_value END ) as order_total,
        max( CASE WHEN pm.meta_key = '_billing_phone' and p.ID = pm.post_id THEN pm.meta_value END ) Phone,
         max( CASE WHEN pm.meta_key = '_order_currency' and p.ID = pm.post_id THEN pm.meta_value END ) order_currency,
        max( CASE WHEN pm.meta_key = '_payment_method' and p.ID = pm.post_id THEN pm.meta_value END ) as payment_method,
        max( CASE WHEN pm.meta_key = 'crm_orderid' and p.ID = pm.post_id THEN pm.meta_value END ) as crm_orderid



        from
            te_posts p
            join te_postmeta pm on p.ID = pm.post_id
            #join te_woocommerce_order_items oi on p.ID = oi.order_id
        where
            post_type = 'shop_order'
            and post_date BETWEEN '" . $startDate . "' AND '" . $endDate . " 23:59:59'
                and p.post_status='wc-completed'
        group by
            p.ID
        order BY
        post_date ASC");
        //echo $wpdb->last_query;
        //print_r($results);
        $i         = 0;
        $staearr   = unserialize(WP_STATES);
        foreach ($results as $value)
        {
            $address                         = get_user_meta($value->customer_user, 'billing_address_1', true);
            $crm_lead_id                     = get_user_meta($value->customer_user, 'crm_lead_id', true);
            $city                            = get_user_meta($value->customer_user, 'billing_city', true);
            $address                         .= ($city) ? (($address) ? ' ,' . $city : $city) : '';
            $address                         .= ($value->_billing_state) ? (($address) ? ' ,' . $staearr[$value->_billing_state]['name'] : $staearr[$value->_billing_state]['name'] ) : '';
            $address                         .= ($value->_billing_country) ? (($address) ? ' ,' . $value->_billing_country : $value->_billing_country ) : '';
            $newarray['order_id']            = $value->order_id;
            $newarray['user_id']             = $value->user_id;
            $newarray['crm_lead_id']         = $crm_lead_id;
            $newarray['crm_orderid']         = $value->crm_orderid;
            $newarray['invno']               = get_post_meta($value->order_id, '_bewpi_formatted_invoice_number', true);
            $newarray['post_date']           = $value->post_date;
            $newarray['billing_email']       = $value->billing_email;
            $newarray['_billing_first_name'] = $value->_billing_first_name;
            $newarray['_billing_last_name']  = $value->_billing_last_name;
            $newarray['Phone']               = $value->Phone;
            $newarray['address']             = $address;
            $newarray['payment_method']      = $value->payment_method;

            $newarray['formatted_invoice_number'] = $value->formatted_invoice_number;
            $newarray['invoice_number']           = $value->invoice_number;
            $newarray['invoice_year']             = $value->invoice_year;


            $newarray['order_amt']  = $value->order_total - $value->order_tax;
            $taxtype                = get_post_meta($value->order_id, '_taxtype', true);
            $newarray['servicetax'] = '';
            $newarray['cgst']       = '';
            $newarray['sgst']       = '';
            $newarray['igst']       = '';
            if ($taxtype == 'cgst')
            {
                $newarray['cgst'] = $value->order_tax / 2;
                $newarray['sgst'] = $value->order_tax / 2;
            }
            else if ($taxtype == 'igst')
            {
                $newarray['igst'] = $value->order_tax;
            }
            else
            {
                $newarray['servicetax'] = $value->order_tax;
            }
            $newarray['order_total']    = $value->order_total;
            $newarray['order_currency'] = $value->order_currency;

            $orderPaymentType = get_post_meta($value->order_id, 'payment_type', true);

            if ($orderPaymentType)
            {
                $orderType = "Fresh Enrollment";
            }
            else
            {
                $orderType = "Followup Payment";
            }

            $order       = new WC_Order($value->order_id);
            $orderStatus = $order->post_status;
            $items       = $order->get_items();

            $newarray['orderstatus'] = $orderStatus;

            foreach ($items as $item)
            {
                $pid          = $item['product_id'];
                $pname        = $item['name'];
                $instid       = get_field('c_institute', $pid);
                $instname     = get_field('short_name', $instid);
                $batchid      = get_field('batch_name', $pid);
                $batchCrmId   = get_field('crm_id_programme', $pid);
                $programme_id = get_field('crm_programme_id', $pid);
                $courseType   = get_field('course_type', $pid);

                $newarray['pid'] = $pid;
                $courseTotal     = get_product_price($pid, $value->order_currency);

                $newarray['courseTotal'] = $courseTotal;
                $newarray['pname']       = $pname;
                $newarray['instname']    = $instname;
                $newarray['batchid']     = $batchid;

                $newarray['crm_id_programme'] = $batchCrmId;
                $newarray['crm_programme_id'] = $programme_id;
                $newarray['course_type']      = $courseType;
            }
            $newarray['orderType'] = $orderType;
            $utmData               = get_gforminfo_byemail($value->billing_email);

            $newarray['utm_source']  = $utmData['utm_source'];
            $newarray['utm_medium']  = $utmData['utm_medium'];
            $newarray['utm_campign'] = $utmData['utm_campign'];
            $newarray['utm_term']    = $utmData['utm_term'];
            $newarray['lead_date']   = $utmData['date'];


            $newarray['Invoice_URL'] = 'https://' . $_SERVER['SERVER_NAME'] . "/wp-admin/post.php?post=$value->order_id&action=edit&bewpi_action=view&nonce=" . wp_create_nonce('view') . "";
            $newarray['Receipt_Url'] = 'https://' . $_SERVER['SERVER_NAME'] . "/wp-admin/admin-ajax.php?action=downloadrec&post=$value->order_id";
            $newarray['action']      = "update";





            $newarray1[$i] = $newarray;
            $i++;
        }
        //echo CRM_URL_BASE . '/index.php?entryPoint=web_lead_invoice'; die;

        $cResponse = callRestApiPost(CRM_URL_BASE . '/index.php?entryPoint=web_lead_invoice', $newarray1);
        //echo "<pre>";
        //print_r($newarray1);
        //die;

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=order-report.csv');
        ob_end_clean();
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Orderid', 'user_id', 'CRM Lead ID', 'CRM Order ID', 'Invoice No', 'Orderdate', 'Email', 'FirstName',
            'lastName', 'Phone', 'Address', 'PaymentMethod', 'formatted_invoice_number', 'invoice_number', 'invoice_year', 'Order Amount', 'STax', 'CGST', 'SGST', 'IGST', 'OrderTotal', 'Order Currency', 'Order status', 'Courseid', 'Course Total',
            'Coursename', 'InstituteName', 'BatchId', 'crm_id_programme', 'crm_programme_id', 'course_type', 'Payment Type', 'Utm Source', 'Utm Medium', 'Utm Campign', 'Utm Term', 'Lead Date', 'Invoice_URL', 'Receipt_Url'));

        foreach ($newarray1 as $ordervalue)
        {
            fputcsv($output, $ordervalue);
        }

        fclose($output);
        exit(0);
    }
}
?>
