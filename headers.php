<!-- header -->
<div class="agileits_header" style="border:0px solid red; background-color: #000000;">
<?php include("life/php/times.php"); ?>
<div class="w3l_offers" style=" width:250px; background-color:#000000; border:none; vertical-align:middle; font-size:18px; height:61px; border:0px solid red; color:#FFF;" > 
   <?php
// Start the session

// Check if the user is logged in
if (isset($_SESSION['uname']) && isset($_SESSION['clint_id'])) {
    // Get the bill_id from the session
    if (isset($_SESSION['bill_id'])) {
        $bill_id = $_SESSION['bill_id'];
    }

    // Establish a database connection
    include("connections.php");

    // Fetch pincode and city from the database based on the user's login information
//if (isset($bill_id)) { where bill_id = $bill_id
    $sql = "SELECT bill_pincode, bill_city FROM billing_address";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $pincode = $row["bill_pincode"];
        $city = $row["bill_city"];
    } else {
        echo "Deliver to city pincode";
    }

    // Display the delivery address details with the pincode and city variables
    echo '<div style="margin-top: 20px; margin-left: 5px;">';
    echo '<i class="fa fa-map-marker" aria-hidden="true">&nbsp;</i>';
    echo '<span>Deliver to</span>&nbsp;<span></span>';
    echo '<span>' . $city . ' ' . $pincode . '</span>';
    echo '</div>';

} else {
    // Redirect the user to the login page if they are not logged in
    header("Location: login.php");
    exit();
}
?>

 
    <!--<h3 style="margin: 15px;">GMART GROCERY</h3>-->
<!--<p style="border:0px solid red;height:36px; line-height:36px;  float:right; font-weight:500; "> <?php echo date("l , jS \of F Y"); ?>&nbsp;&nbsp;</p>  

<p id='ct' style="border:0px solid red; float:right; height:25px; line-height:25px;"><?php include("life/php/times.php"); ?></p>-->
</div>
	
  <div class="w3l_search" style="border:0px solid red; height:45px; margin-top:10px; width:20%;">
    <form action="" method="post">
      <input type="text" name="search_product" style="width:80%; color:#FF0000; border-radius: 25px;"  placeholder="Product Search...." >
      <input type="submit" name="search_button" value=""  style="width:20%; border-radius: 25px;">
      <?php 
	  if(isset($_POST['search_button']))
	  {
	  $search_box=$_POST['search_product']; 
	  header("location:your_prouducts.php?yp=".$search_box."");
	  }
	  ?>
    </form>
  </div>
  <div class="product_list_header"  >
    <?php 
					$var1="select count(crt_id) from cart where clint_id='$clint' and crt_status='Pending'  ";
					$res1=mysqli_query($conn,$var1);
					$row1=mysqli_fetch_array($res1);
				?>
    <input type="submit" name="" value="View your cart &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row1[0]; ?>"  class="button" data-toggle="modal" data-target="#myModal" style="height:42px;  margin-top:10px; " >
  </div>
  
   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content -->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="font-size:40px; color:#F00; font-weight:900;">&times;</button>
          <h4 class="modal-title" style="font-size:36px; font-weight:900; letter-spacing:3px;  color:#84C639;" >Your Cart</h4>
        </div>
        <div class="modal-body">
        
        <form method="get" name="our_price" id="our_price" action="update_carts.php">
        
<table style="margin:0 auto; width:100%; text-align:center; vertical-align:middle; border-radius:30px; " >

   
  
  
 <?php
 $select_cart="select * from cart INNER JOIN product ON cart.pid=product.pid where clint_id='$clint' and crt_status='Pending' ";
 $query_cart=mysqli_query($conn,$select_cart)or die(mysqli_error());
 if(mysqli_num_rows($query_cart)!=NULL)
 {
	 ?>
	 <tr style="font-size:12.5px; font-weight:700; font-style:italic; color:#930; height:20px;  border-bottom:3px solid white; border-top:3px solid white; ">
    <td  style="width:100%;" colspan="5">
        </td>
    </tr>  
    
    <tr style="font-size:15px; font-weight:700; font-style:italic;  background-color:#F00; color:#FFF; height:30px;  border-bottom:3px solid white; border-top:3px solid white; ">
    <td  >
    Image
        </td>
    <td  style="border-left:3px solid #FFFFFF; border-right:3px solid #FFFFFF;">
    Product Name
        </td>
    <td  >
    Price
        </td>
    <td   style="border-left:3px solid #FFFFFF; border-right:3px solid #FFFFFF;">
    Quantity & Action
        </td>
    <td  >
    Total Price
        </td>
    
    </tr>  
    <?php
 while($fetch_cart=mysqli_fetch_array($query_cart))
{ 	 
 ?>
	
              

<!--<script language="javascript">
	function urprice() 
	{
       		var txtFirstNumberValue = document.getElementById('product_price').value;
       		var txtSecondNumberValue = document.getElementById('product_quantity').value;
       		var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue) ;
       		if (!isNaN(result)) 
	   		{
           		document.getElementById('product_our_price').value = result.toString();
	   		}
   	}
	window.onload=urprice;
		
   </script>
 
 
<script>

$('#product_quantity').on('keyup',function(){
    var tot = $('#product_price').val() * this.value;
    $('#product_our_price').val(tot);
});

</script> 
 --><!--
<script type="text/javascript">
function urprice() 
			{
        var product_price = document.getElementById('product_price').value;
        var product_quantity = document.getElementById('product_quantity').value;
		
		var reitems = '^([1-9])([0-9]{0,2})$';
 
   if(!product_quantity.match(reitems)) {
      alert('Please provide a quantity of 1 to 999!');
   }
		
        var result = parseInt(product_price) * parseInt(product_quantity);
        if(!isNaN(result))
		{
            document.getElementById('product_our_price').value = result;
        }
}
	window.onload=urprice;
    
</script> -->
 
 <style>
        
       .img-zoom {
			-webkit-transition: all .2s ease-in-out;
			-moz-transition: all .2s ease-in-out;
			-o-transition: all .2s ease-in-out;
			-ms-transition: all .2s ease-in-out;
		}
 
		.transition {
			-webkit-transform: scale(10); 
			-moz-transform: scale(10);
			-o-transform: scale(10);
			transform: scale(10);
		}
		</style>
          <script src="js/jquery.min.js"></script> 
          <script>
		  $(document).ready(function(){
			$('.img-zoom').hover(function() {
				$(this).addClass('transition');
 
			}, function() {
				$(this).removeClass('transition');
			});
		  });
		</script>
  
 
    
    <tr style="font-size:12.5px; font-weight:700; font-style:italic; color:#930; height:25px;  border-bottom:3px solid white; border-top:3px solid white; ">
    <td  style="width:6%;">
    <img class="img-zoom" src="life/product_images_upload/<?php echo $fetch_cart['pimage']; ?>" style="height:20px; border:0px solid red;">
        </td>
        
    <td  style=" width:60%; border-left:3px solid white; border-right:3px solid white; text-align:left; height:25px;">
    <p style="width:96%; font-weight:700; line-height:25px; height:25px; margin:0 auto; border:0px solid red;">
    <?php echo $fetch_cart['pname']; ?>
    </p>
    </td>
    
     <?php
						$total=$fetch_cart['qty'] * $fetch_cart['oprice'];	
     ?>
                  
                  
    <td style="width:7%; " align="right">₹&nbsp;<input  type="text" name="product_price" id="product_price"   value="<?php echo $fetch_cart['oprice']; ?>"  style=" width:38px; background-color:transparent; border:0px solid red;"  disabled ></td>
    
<td style="width:16%; border-left:3px solid white; border-right:3px solid white; ">

<form action="update_carts.php" style=" border:0px solid red; margin:0px auto;" >
    <input type="text" name="product_quantity" id="product_quantity" onkeyup="urprice();" value="<?php echo $fetch_cart['qty']; ?>" 
    style="border:none; width:50px; text-align:center; border-radius:50%; " maxlength="3" >
    
    <input type="hidden" name="crt_id" id="crt_id"  value="<?php echo $fetch_cart['crt_id']; ?>" 
    style="border:none; width:50px; text-align:center; border-radius:50%;" maxlength="3" >
   &nbsp;&nbsp;&nbsp;
   <a><input type="submit" value="U" style="border-radius:50%; border:none; color:#03F;" ></a>
   &nbsp;
   <a href="delete_carts.php?crt_id=<?php echo $fetch_cart['crt_id']; ?>"><input type="button" value="X" style="border-radius:50%; border:none; color:#F00;"></a>    
   
    </form>
 
    </td>
    
 
        <td style="width:10%;" align="right" >₹&nbsp;<input name="product_our_price" type="text" id="product_our_price"  
				   value="<?php echo $total; ?>"
    style=" width:55px; background-color:transparent; border:0px solid red;"  readonly ></td>
  
  
        
  
    
  
  
  </tr>
  
  
  
<tr hidden="" style="font-size:18px; font-weight:700; font-style:italic; color:#930; height:25px;  border-bottom:3px solid white; border-top:3px solid white; " >
    <td  colspan="2"  >
hi
        </td>
        <td colspan="4">
  <?php  echo $grand_total= $grand_total + $total ; ?>
        </td>
    </tr>
  <?php
}
?>


    
<tr style="font-size:22px; font-weight:700; font-style:italic; color:#FFF; height:30px;  border-bottom:3px solid white; border-top:3px solid white; 
 background-color:#F00;">
    
        <td colspan="6" align="right" >
  &nbsp;&nbsp;Grand Total : &nbsp;&nbsp; ₹&nbsp;<?php echo $grand_total ; ?>&nbsp;&nbsp;
        </td>
    </tr>
    

    
    <tr style="font-size:12.5px; font-weight:700; font-style:italic; color:#930; height:20px;  border-bottom:3px solid white; border-top:3px solid white; ">
    <td  style="width:100%;" colspan="6">
        </td>
    </tr>
<?php

 }
 else
 {
	 ?>
     <style>
	 .cart
	 {
		 background-color:#FFF;
		 height:80px; 
		 font-size:25px; 
		 font-weight:900; 
		 font-style:italic; 
		 color:#84C639;
	 }
	 .cart:hover
	 {
		 background-color:#F00;
		 height:80px; 
		 font-size:25px; 
		 font-weight:900; 
		 font-style:italic; 
		 color:#FFF;
	 }
	 
	 </style>
	 <tr class="cart" >
  <td colspan="6">Your Cart Is Empty !!!</td>
  </tr>
  <?php
  
 }
?>
  
  
  
</table>

</form>  
</div>
        <div class="modal-footer">
          <div class="row" style=" border:0px solid red;">
    	<div class="col-xs-6"  >
			<div class="btn-group pull-left" role="group" aria-label="..." >
<a href="indexs.php"><button type="button" style="float:right; background-color:#F00; border:none;" class="btn btn-default btn-info" onClick="indexs.php"><span class="fa fa-arrow-left"></span>&nbsp;Back to Products</button>
			</div>
        </div>
        <div class="col-xs-6" >
			<div class="btn-group pull-right" role="group" aria-label="..." >
				<a href="checkouts.php"><button type="button" style=" background-color:#84C639; border:none;" class="btn btn-default btn-success"  ><span class="fa fa-shopping-cart"></span>&nbsp;Checkout</button></a>
			</div>
		</div>
  </div>
        </div>
      </div>
      
    </div>
    
    
    
    
          
  </div>
  
  
  
  <div class="w3l_header_right" >
    <ul >
      <li class="dropdown profile_details_drop"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"  ><i class="fa fa-user" aria-hidden="true">&nbsp;&nbsp; Profile&nbsp;&nbsp;</i><span class="caret"></span></a>
        <div class="mega-dropdown-menu" >
          <div class="w3ls_vegetables" >
            <ul class="dropdown-menu drp-mnu" style="border:1px solid red; width:200px; ">
              <li ><?php 
			 		  $select_client="select * from client where clint_id='$clint' ";
					  $query_client=mysqli_query($conn,$select_client)or die(mysqli_error());
					  $fetch_client=mysqli_fetch_array($query_client);
					  $uname_client=isset($fetch_client['uname']) ? $fetch_client['uname'] : '';
				if($uname!=NULL)
					{		
						echo " <i><b style='color:red;' > Warm Welcome</b> <br><b style='color:green; text-transform:uppercase;'>".$uname."</b></i>"; 
					}
					else if($clint!=NULL) 
					{
						echo " <i><b style='color:red;' > Warm Welcome</b> <br><b style='color:green; text-transform:uppercase;'>".$uname_client."</b></i>"; 
					}
			  ?></li>
              <li><a href="account-profiles.php" style="text-align:left; color:#90F;" onmouseover="this.style.color='';" onmouseout="this.style.color='#90F';"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;My Profile</a></li>
              <li><a href="order_historys.php" style="text-align:left; color:#06F;" onmouseover="this.style.color='';" onmouseout="this.style.color='#06F';"><i class="glyphicon glyphicon-align-justify"></i>&nbsp;&nbsp;My Order</a></li>
              <li><a href="logout.php" style="text-align:left; color:#84C639;" onmouseover="this.style.color='';" onmouseout="this.style.color='#84C639';" ><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Logout</a></li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
    <div id="google_translate_element" style="border:0px solid red; margin-top:2px;"></div>
            
  </div>
  <div class="w3l_header_right1" style="height:61Px; border:0px solid green;" >
    <h2 style="height:61px; border:0px solid green; " >
    <a href="mails.php" style="height:61px; line-height:40px; border:0px solid green; background-color: #000000; padding: 15px; " >
    CONTACT US</a>
    </h2>
  </div>
  <div class="clearfix"> </div>
</div>
<!-- End header --> 