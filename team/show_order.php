<?php 
include('../db.php');
include('functionstats.php');
$orderid=$_GET['orderid'];

$product=fetch_all_order_for_this_orderid($orderid);


?>
  <div class="panel panel-primary">
                        <div class="panel-heading">8
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
|<table style='margin-left: 11%;'>

<tr style='color:red'><td>status: </td><td><?php echo $product[0]['status'];?></td></tr>
<tr><td>CUSTOMER : </td><td><?php echo $product[0]['customer'];?></td></tr>
<tr><td>DEVICE : </td><td><?php echo $product[0]['devicetype'].'('.$product[0]['brand'].' '.$product[0]['model'].')';?></td></tr>

<tr><td style='color:green'>PROBLEM : </td><td><?php echo $product[0]['problem'];?></td></tr>
<tr><td>PICK UP DATE : </td><td><?php echo $product[0]['pickupdate'];?></td></tr>

<tr><td>PICK UP TIME : </td><td><?php echo $product[0]['pickuptime'];?></td></tr>
<tr><td>TECHNICIAN ALLOTED (pickup) : </td><td><?php echo get_pickupboy_name($product[0]['pickupperson']);?></td></tr>


<tr><td>TECHNICIAN ALLOTED (delivery) : </td><td><?php 


if($product[0]['deliveryperson']!='')
echo $product[0]['deliveryperson'];
else
	echo 'Not reached at this stage';

;?></td></tr>
<tr><td>CUSTOMER PHONE : </td><td><?php echo $product[0]['phonenumber'];?></td></tr>

<tr><td>ADDRESS  : </td><td><?php echo $product[0]['address'];?></td></tr>

<tr><td>TRACK REPORT  : </td><td><?php if($product[0]['trackcomments']!='')
echo $product[0]['trackcomments'];
else
	echo 'Not updated';
?></td></tr>

<tr><td>ADDRESS  : </td><td><?php echo $product[0]['pickupaddress'];?></td></tr>
<tr><td>REMARKS : </td><td><?php echo $product[0]['remark'];?></td></tr>

<?php if($product[0]['invoice_pickup']!='')
{
?>
<tr><td>INVOICE GENERATED  : </td><td><a target='_blank' href="<?php echo '../'.$product[0]['invoice_pickup'];?>">
	VIEW
</a>
</td></tr>

<?php }else{ ?>
<tr style='COLOR:RED'><td>DELIVERY NOT UPDATED
</td></tr>

<?php } ?>
</table>
<!-- ==== one row for the cart ebds here  ========================================== -->


<!-- ===== space for the total list =============== -->




<!-- === space fro the totol list ends here ======== -->





			</div>


     </center>


 </div>

</div>

 
