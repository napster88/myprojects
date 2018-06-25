<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!--
<div class="babdlist-search">
  <form action="<?php echo $actual_link; ?>" method="get">
    <input type="hidden" name="page" value="<?php echo $_GET['page']?>" />
    <?php if(isset($_GET['p'])){ ?>
      <input type="hidden" name="p" value="<?php echo $_GET['p']?>" />
    <?php } ?>
    <p><input type="text" onblur="searchvalidation(this)" required name="s" value="<?php echo $_GET['s']; ?>" /></p>

    <p><input type="submit" value="search" /> <a href="<?php echo site_url('/wp-admin/admin.php?page=babdlist'); ?>">Reset</a></p>
  </form>
</div>
<script>
  function searchvalidation(el) {
    if (el.value.length < 3) {
      alert("Enter atleast 3 characters");
    }
  }
</script>
-->
<?php
/* $number   = 10;
$paged = ($_GET['p']) ? $_GET['p'] : 1;
$offset = ($paged - 1) * $number;
*/
/*
if(isset($_GET['s']) && $_GET['s'] != ''){
  $args1 =array(
          'meta_query' => array(
              'relation' => 'AND',
              array(
                   'relation' => 'OR',
                   array(
                       'key'     => 'user_email',
                       'value'   => $_GET['s'],
                       'compare' => 'LIKE'
                   ),
                   array(
                       'key' => 'nickname',
                       'value' => $_GET['s'],
                       'compare' => 'LIKE'
                   )
               ),

              array(
                  'key'     => 'babd_assesment_score',
                  'value'   => 0,
                  'type'    => 'NUMERIC',
                  'compare' => '>=',
              )
          )
      );
  $args2 =array(
          'meta_query' => array(
              'relation' => 'AND',
              array(
                   'relation' => 'OR',
                   array(
                       'key'     => 'user_email',
                       'value'   => $_GET['s'],
                       'compare' => 'LIKE'
                   ),
                   array(
                       'key' => 'nickname',
                       'value' => $_GET['s'],
                       'compare' => 'LIKE'
                   )
               ),

              array(
                  'key'     => 'babd_assesment_score',
                  'value'   => 0,
                  'type'    => 'NUMERIC',
                  'compare' => '>=',
              )
          ),
         'number' => $number,
         'offset' => $offset
      );
}else{
  $args1 = array(
      'meta_key' => 'babd_assesment_score',
  );
  $args2 = array(
      'meta_key' => 'babd_assesment_score',
      'number' => $number,
      'offset' => $offset
  );
}
*/

/*
$users = get_users($args1);
$meber_arr = get_users($args2);
$total_users = count($users);
$total_query = count($meber_arr);
$total_pages = ceil($total_users / $number);
*/
$args = array(
    'meta_key' => 'babd_assesment_score',
);
$users = get_users($args);
echo '<table id="babd_table" class="display" style="width:100%;border:1px solid #333;">
        <thead>
          <tr>
            <th style="width:20%;">Name</th>
            <th style="width:25%;">Email Id</th>
            <th style="width:20%;">Phone No</th>
            <th style="width:20%;">Examination Date</th>
            <th style="width:5%;">Score</th>
            <th style="width:10%;">Status</th>
          </tr>
        </thead>
        <tbody>';
foreach ($users as $userdata) {
  echo '<tr>';
   echo '<td style="width:20%;">' . $userdata->display_name . '</td>';
   echo '<td style="width:25%;">' . $userdata->user_email . '</td>';
   echo '<td style="width:20%;">' . get_user_meta( $userdata->ID, 'phone_number', true ) . '</td>';
   echo '<td style="width:20%;">' . get_user_meta( $userdata->ID, 'babd_assesment_date', true ) . '</td>';
   echo '<td style="width:5%;">' . get_user_meta( $userdata->ID, 'babd_assesment_score', true ) . '</td>';
   if(get_user_meta( $userdata->ID, 'babd_assesment_score', true ) >= 6){
     echo '<td style="width:5%;"><span class="sucess_status">PASS</span></td>';
   }else{
     echo '<td style="width:5%;"><span class="fail_status">FAIL</span></td>';
   }
 echo '</tr>';
}
 echo '</tbody>
    </table>';


//$big = 999999999; // need an unlikely integer
//$mypagei = paginate_links(array(
  // 'base' => preg_replace('/\?.*/', '', get_pagenum_link($big)) . '%_%',
/*  'add_args' => array(
         's' => get_query_var('s'),
         'page' => get_query_var('page'),
     ),
  'format' => '?p=%#%',
  'prev_text' => __('&laquo; Previous'),
  'next_text' => __('Next &raquo;'),
  'total' => $total_pages,
  'current' => $paged,
  'end_size' => 1,
  'mid_size' => 3,

));
if ($mypagei != '') {
echo $mypagei;
}
*/
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#babd_table').DataTable();
  } );
</script>
<style media="screen">
  #babd_table_wrapper{
    margin-top: 50px;
  }
  .sucess_status{
    background-color: #008000;
    color: #fff;
    padding: 5px 10px;
    border-radius: 3px;
    font-size: 10px;
  }
  .fail_status{
    background-color: #b90000;
    color: #fff;
    padding: 5px 10px;
    border-radius: 3px;
    font-size: 10px;
  }
</style>
