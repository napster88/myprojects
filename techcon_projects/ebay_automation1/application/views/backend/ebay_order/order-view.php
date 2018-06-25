<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $head_title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Plans</li>
        <li class="active"><?php echo $head_title; ?></li>
      </ol>
    </section>
	<input type="hidden" class="delete_url" value="<?php echo base_url('plans/hide'); ?>" />
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> View All Orders </h3>
            </div>
			<?php  $entries = $response->PaginationResult->TotalNumberOfEntries;
				 $page=$entries/100;
				$page_no=(integer)$page;
				 $page_no;
				if($page>$page_no)
				{
					$page_no++;
				}?>
				<div class="pagination">
				<?php
for($i=1;$i<=$page_no;$i++)
{
	?><span style="padding:5px; align :center;"class="<?php if($i==$pagereturn){ echo "active_page";  }?>"><a href="<?php  echo base_url('view_ebay_order/view_ebay_order_detail/'.$i);?>"><?php echo $i;?></a></span><?php 
}
?>
</div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Sr. No.</th> <th>Record No.</th><th>Order number</th> <th>Carrier Used</th><th>Tracking number</th><th>Order status</th><th>updated On</th> <th style="width:220px;">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$cm=($pagereturn-1)*100;
					$c=1+$cm;
					
				
				
		 if(!empty($response->OrderArray->Order))
		{
					foreach($response->OrderArray->Order as $data)
					{ 
					
					?>
					<tr id="row_<?php echo $data->OrderID; ?>">
					 
					  <td style="word-break: break-word;"><?php  echo $c++; 
					  ?></td>
					  
					  <td style="word-break: break-word;"><?php   echo $data->ShippingDetails->SellingManagerSalesRecordNumber; ?></td> 
					  <td style="word-break: break-word;"><?php  echo $data->OrderID; ?></td>
					  
					   <td style="word-break: break-word;"><?php  echo $data->TransactionArray->Transaction->ShippingDetails->ShipmentTrackingDetails->ShippingCarrierUsed; ?></td>
					  
					   <td style="word-break: break-word;"><?php  echo $data->TransactionArray->Transaction->ShippingDetails->ShipmentTrackingDetails->ShipmentTrackingNumber; ?></td>
					  
					  
					   <td style="word-break: break-word;"><?php  echo $data->OrderStatus; ?></td>
					   <td style="word-break: break-word;"><?php  echo $data->CreatedTime; ?></td>
					  
						<td style="word-break: break-word;"><a class="btn btn-app" href="<?php echo base_url('plans/plan/'.$data->id); ?>"><i class="fa fa-eye"></i> View</a>
						<a class="btn btn-app" href="<?php echo base_url('plans/edit_plan/'.$data->id); ?>"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-app delete-alert" data-id="<?php echo $data->id; ?>" href="#" ><i class="fa fa-trash"></i> Delete</a>
					  </td>
					</tr>
					<?php }
				} ?>
				
				 
                </tbody>
                <tfoot>
                <tr>
               
				 <th>Sr. No.</th>
				  <th>Record No.</th>
				 
				   <th>Order number</th>
				   
				   <th>Carrier Used</th>
				   
                  <th>Tracking number</th>
				   <th>Order status</th>
				    <th>updated On</th>
					
                   <th style="width:220px;">Action</th>
                </tr>
                </tfoot>
              </table>
			 
            </div>
            <div class="pagination">
				<?php
for($i=1;$i<=$page_no;$i++)
{
	?><span style="padding:5px; align :center;" class="span_page <?php if($i==$pagereturn){ echo 'active_page';  }?>"><a href="<?php  echo base_url('view_ebay_order/view_ebay_order_detail/'.$i);?>"><?php echo $i;?></a></span><?php 
}
?>
</div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
	  
	 

				
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <style>
  .pagination
{
	text-align: center;
    width: 100%;
   
    font-size: 20px;
    font-weight: 800;
}
.active_page{
	
	background:red;

	.pagination>span
	{
	padding:15px;	
	}
  </style>