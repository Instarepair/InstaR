<?php 
include('../db.php');
include('functionstats.php');
$orderid=$_GET['orderid'];

$product=fetch_all_order_for_this_orderid($orderid);

$productarr=explode(',',$product);

?>
  <div class="panel panel-primary">
                        <div class="panel-heading">
           Your full order details
                        </div>
                        <div class="panel-body">
  <h4 style="color:black">Transaction ID: <?php echo $orderid;?></span></h4>
                             <br>

<center>



          
            
<!-- ====== REPAIRED report case for emds here ====================== -->


                     
<!-- ====== picked up , diagonosis report case for emds here ====================== -->


     <div class="panel-footer">
                         <a href='javascript:void(0)' onclick="document.getElementById('order_items_show').style.display='none'"> close it</a>
                        </div>
                    </div>
					<div class="in-check" >
			

<!-- =-===== one row fo the cart starts here ========================= -->

<?php 
// get the code for the addded produc here 

					for($t=0;$t<=sizeof($productarr);$t++)
{


	$itemstring=explode('_',$productarr[$t]);
if(!empty($itemstring[0])){

$itemname=explode('-',$itemstring[0]);
$productname=$itemname[1];


?>

				<ul class="cart-header" type='none'>
					<div class="close1"> </div>
				
						<li class="ring-in"><a href="#" ><img src="../itemimages/<?php echo get_pic_by_itemname($productname);?>" class="img-responsive product-image"  width='73' alt=""></a>
						</li>
						<li><h5 class="name"><?php echo $itemstring[0];?></h5></li>
		


					<div class="clearfix"> </div>
				</ul>
<?php } } ?>				

<!-- ==== one row for the cart ebds here  ========================================== -->


<!-- ===== space for the total list =============== -->
<ul class="cart-header" type='none' style='margin-top:12px;'>
<li><h5 class="name" style='    padding-top: 20px;
    font-weight: bold;
    font-size: 21px;
    color: maroon;'>TOTAL : </h5></li>
				<li><h4 class="price">Rs. <?php echo get_user_bill_by_orderid($orderid);?></h4></li>
</ul>



<!-- === space fro the totol list ends here ======== -->





			</div>


     </center>


 </div>

</div>

 
