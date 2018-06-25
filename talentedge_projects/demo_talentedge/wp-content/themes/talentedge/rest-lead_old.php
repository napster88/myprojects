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
<link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/lp-style.css?date=<?=date()?>" rel="stylesheet">
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


download_lead_reportx();
function download_lead_reportx()
{
    ?>

        <div class="or-export">
            <h2>Lead Export</h2>
            <form method="POST" action="#">
                <p>
                <labe>Start Date</labe>
                <input type="date" class="start_date" name="start_date" value="<?php echo $_POST['start_date']; ?>" required>
                </p>
                <p>
                <labe>End Date</labe>
                <input type="date" class="end_date" name="end_date" value="<?php echo $_POST['end_date']; ?>" required>
                </p>  
                <input type="submit" id="export-lead" class="button" value="Export" name="export">
            </form>
        </div> 


    <?php
    $start_date = $_POST['start_date'];
    $end_date   = $_POST['end_date'];

    if (isset($start_date))
    {
        $search_criteria = array();

        // $start_date = date( '2016-12-06');
        // $end_date = date( '2017-03-01');

        $search_criteria['start_date'] = $start_date;
        $search_criteria['end_date']   = $end_date;
        
        
        
        /* Category Detail */
        $form_id    = 6;
        $entryform6 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform6 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'Category Detail',
                'name'            => $entryform['1'],
                'email'           => $entryform['8'],
                'phone'           => $entryform['3'],
                'utm-source'      => $entryform['9'],
                'utm-medium'      => $entryform['10'],
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => '',
                'inst-name'       => '',
                'city'            => $entryform['5'],
                'company'         => $entryform['6'],
                'functional-area' => $entryform['7'],
                'education'       => '',
                'work-ex'         => '',
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }

        /* Category Detail Mobile */
        $form_id     = 11;
        $entryform11 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform11 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'Category Detail Mobile',
                'name'            => $entryform['1'],
                'email'           => $entryform['8'],
                'phone'           => $entryform['3'],
                'utm-source'      => $entryform['9'],
                'utm-medium'      => $entryform['10'],
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => '',
                'inst-name'       => '',
                'city'            => $entryform['5'],
                'company'         => $entryform['6'],
                'functional-area' => $entryform['7'],
                'education'       => '',
                'work-ex'         => '',
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }
        

////////////////////////////
        
         /* Brouchure Download */
        $form_id     = 9;
        $entryform9 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform9 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'Brouchure Download',
                'name'            => $entryform['2'],
                'email'           => $entryform['3'],
                'phone'           => $entryform['4'],
                'utm-source'      => $entryform['6'],
                'utm-medium'      => $entryform['17'],
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => '',
                'inst-name'       => '',
                'city'            => $entryform['5'],
                'company'         => $entryform['6'],
                'functional-area' => $entryform['7'],
                'education'       => '',
                'work-ex'         => '',
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }
        
        /* Contact Form Learners */
        $form_id     = 15;
        $entryform15 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform15 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'Contact Form Learners',
                'name'            => $entryform['1'],
                'email'           => $entryform['4'],
                'phone'           => $entryform['6'],
                'utm-source'      => $entryform['9'],
                'utm-medium'      => $entryform['10'],
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => '',
                'inst-name'       => '',
                'city'            => $entryform['2'],
                'company'         => $entryform['3'],
                'functional-area' => '',
                'education'       => '',
                'work-ex'         => '',
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }
        
        
        /* About Us Form */
        $form_id     = 19;
        $entryform19 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform19 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'About Us Form',
                'name'            => $entryform['1'],
                'email'           => $entryform['2'],
                'phone'           => $entryform['4'],
                'utm-source'      => $entryform['7'],
                'utm-medium'      => $entryform['8'],
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => '',
                'inst-name'       => '',
                'city'            => $entryform['6'],
                'company'         => $entryform['3'],
                'functional-area' => '',
                'education'       => '',
                'work-ex'         => '',
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }
        
        
        
         /* Skilling */
        $form_id     = 21;
        $entryform21 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform21 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'Skilling',
                'name'            => $entryform['1'],
                'email'           => $entryform['2'],
                'phone'           => $entryform['4'],
                'utm-source'      => $entryform['6'],
                'utm-medium'      => $entryform['7'],
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => '',
                'inst-name'       => '',
                'city'            => '',
                'company'         => $entryform['3'],
                'functional-area' => '',
                'education'       => '',
                'work-ex'         => '',
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }
        
        /* Skilling */
        $form_id     = 26;
        $entryform26 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform26 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'Skilling',
                'name'            => $entryform['1'],
                'email'           => $entryform['2'],
                'phone'           => $entryform['3'],
                'utm-source'      => '',
                'utm-medium'      => '',
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => '',
                'inst-name'       => '',
                'city'            => $entryform['4'],
                'company'         => $entryform['5'],
                'functional-area' => '',
                'education'       => '',
                'work-ex'         => '',
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }
        
         
        
          /* Contact Form Corporate */
        $form_id     = 16;
        $entryform16 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform16 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'Contact Form Corporate',
                'name'            => $entryform['1'],
                'email'           => $entryform['4'],
                'phone'           => $entryform['6'],
                'utm-source'      => $entryform['9'],
                'utm-medium'      => $entryform['10'],
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => $entryform['4'],
                'inst-name'       => '',
                'city'            => $entryform['2'],
                'company'         => $entryform['3'],
                'functional-area' => '',
                'education'       => '',
                'work-ex'         => $entryform['7'],
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }
        
         
        
        /* Degree Courses Form */
        $form_id     = 20;
        $entryform20 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform20 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'Contact Form Corporate',
                'name'            => $entryform['1'],
                'email'           => $entryform['2'],
                'phone'           => $entryform['4'],
                'utm-source'      => $entryform['6'],
                'utm-medium'      => $entryform['7'],
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => '',
                'inst-name'       => '',
                'city'            => '',
                'company'         => $entryform['3'],
                'functional-area' => '',
                'education'       => '',
                'work-ex'         => '',
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }
        
        /* Media */
        $form_id     = 25;
        $entryform25 = GFAPI::get_entries($form_id, $search_criteria, '', $paging);
        foreach ($entryform25 as $entryform)
        {
            $arraynew_f22[] = $arrayName      = array(
                'formid'          => $entryform['form_id'],
                'formname'        => 'Media',
                'name'            => $entryform['1'],
                'email'           => $entryform['2'],
                'phone'           => $entryform['4'],
                'utm-source'      => $entryform['7'],
                'utm-medium'      => $entryform['8'],
                'utm-campaign'    => '',
                'utm-term'        => '',
                'course-name'     => '',
                'inst-name'       => '',
                'city'            => '',
                'company'         => $entryform['3'],
                'functional-area' => '',
                'education'       => '',
                'work-ex'         => $entryform['6'],
                'date'            => $entryform['date_created'],
                'source_url'      => $entryform['source_url'],
                'leadid'          => $entryform['id']
            );
        }
        
        ///////////////////////////



        /* Creating CSV */
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=lead-report.csv');
        ob_end_clean();
        $output = fopen('php://output', 'w');
        fputcsv($output, array(
            'Formid',
            'Form Name',
            'Name',
            'Email',
            'Phone',
            'Utm Source',
            'Utm Medium',
            'Utm Campaign',
            'Utm Term',
            'Course Name',
            'Institute Name',
            'City',
            'Company',
            'Functional Area',
            'Education',
            'Work Ex',
            'Date',
            'Source Url',
            'Lead id'
        ));
        foreach ($arraynew_f22 as $arraynew)
        {
            fputcsv($output, $arraynew);
        }

        fclose($output);
        exit(0);
    }
}

?>

