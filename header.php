<!-- header -->
<div class="agileits_header" style="border:0px solid red; background-color: #000000;">

<div class="w3l_offers" style=" width:250px; background-color:#000000; border:none; vertical-align:middle; font-size:18px; height:61px; border:0px solid red; color:#FFF;" > 
<!--<h3 style="margin: 15px;">GMART GROCERY</h3>-->
<div style="margin-top: 20px; margin-left: 5px;">
    <i class="fa fa-map-marker" aria-hidden="true">&nbsp;</i>
    <span>Deliver to</span>&nbsp;<span></span>
    <span>City Pincode </span>
   </div>
<!--<p style="border:0px solid red; height:5px; "></p>
    <p style="border:0px solid red; text-align:center; float:right; ">&nbsp;<?php echo date("l , jS \of F Y"); ?>&nbsp;&nbsp;</p>
<p style="border:0px solid red; height:30px; "></p>
<p id='ct' style="border:0px solid red; text-align:right;  float:right; ">
      <?php include("life/php/time.php"); ?>
    </p>-->
  </div>
  <div class="w3l_search" style="border:0px solid red; margin-top:8px;  height:50px; ">
    <form action="" method="post">
      <input type="text" name="search_product" style=" border:0px solid red; height:45px; color:#FF0000; width:80%; font-size:22px; border-radius: 25px;"  placeholder="Product Search...." >&nbsp;
      <input type="submit" name="search_button" value=""  style="border:0px solid red; height:45px; text-align:center; width:15%; border-radius: 25px;" >
      <?php 
	  if(isset($_POST['search_button']))
	  {
	  $search_box=$_POST['search_product']; 
	  header("location:your_prouduct.php?yp=".$search_box."");
	  }
	  ?>
    </form>
  </div>
  
  
 
  
  <div class="w3l_header_right " style="margin-top:5px;" >
    <ul >
      <li class="dropdown profile_details_drop" > 
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user" aria-hidden="true"  style="font-size:18px;" >
      &nbsp;&nbsp;Sign Up & Sign In&nbsp;&nbsp;</i><span class="caret"></span></a>
        <div class="mega-dropdown-menu" >
          <div class="w3ls_vegetables" >
            <ul class="dropdown-menu drp-mnu" style="width:200px;">
            <li><a href="sign_up.php" style=" color:#36F; font-size:18px;" onmouseover="this.style.color='#F93';" onmouseout="this.style.color='#36F';">
            <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Sign Up&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
              <li><a href="login.php" style=" color:#F00; font-size:18px;" onmouseover="this.style.color='#84C639';" onmouseout="this.style.color='#F00';"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Sign In&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
              
            </ul>
          </div>
        </div>
      </li>
    </ul>
    <div align="center" style="border:0px solid red; margin-top:2px; width:190px; " id="google_translate_element" ></div>
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
   
  </div>
  <div class="w3l_header_right1" style="height:61px; border:0px solid green;" >
    <h2 style="height:61px; border:0px solid green; " > <a href="mail.php" style=" font-size:25px;  height:61px; line-height:30px; border:0px solid green; background-color: #000000; padding: 15px;" > CONTACT US </a> </h2>
  </div>
  <div class="clearfix"> </div>
</div>
<!-- End header --> 