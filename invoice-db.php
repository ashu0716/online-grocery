 <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('fpdf17/fpdf.php');
include("connections.php");
$prod_id = $_GET["pid"];
// die($prod_id);
session_start();
$uname=$_SESSION['uname'];
$clint=$_SESSION['clint_id'];
// die($clint);

if($uname==NULL & $clint==NULL)
{	
	header("location:login.php");
}

$query = mysqli_query($conn, "SELECT cart.crt_id, cart.qty, cart.crt_date, client.clint_id, client.clint_email, client.clint_mob, client.clint_uname, 
billing_address.bill_add, billing_address.bill_city, billing_address.bill_pincode,product.pid, product.price, product.dis, product.pname
FROM cart
INNER JOIN client ON cart.clint_id = client.clint_id
INNER JOIN billing_address ON client.clint_id = billing_address.clint_id
INNER JOIN product ON cart.pid = product.pid WHERE client.clint_id = ".$clint."  AND
   product.pid = ".$prod_id);	
$cart=mysqli_fetch_array($query);

//shop admin detail
$query=mysqli_query($conn,"select * from shop_details");
$shop_details=mysqli_fetch_array($query);
///end

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,$shop_details['s_d_name'],0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(15	,5,'Street:-',0,0);
$pdf->Cell(130	,5,$shop_details['s_d_street'],0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(15	,5,'City:-',0,0);
$pdf->Cell(125	,5,$shop_details['s_d_city'],0,0);
$pdf->Cell(10	,5,'Date',0,0);
$pdf->Cell(34	,5,$cart['crt_date'],0,1);//end of line

$pdf->Cell(15	,5,'Ph No:-',0,0);
$pdf->Cell(125	,5,$shop_details['s_d_ph'],0,0);
$pdf->Cell(25	,5,'Invoice #',0,0);
$pdf->Cell(34	,5,$cart['crt_id'],0,1);//end of line

$pdf->Cell(15	,5,'Email:-',0,0);
$pdf->Cell(125	,5,$shop_details['s_d_email'],0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5,$cart['clint_id'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$cart['clint_uname'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(100	,5,$cart['bill_add'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(1	,5,$cart['bill_city'],0,0);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$cart['bill_pincode'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$cart['clint_mob'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$cart['clint_email'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(10	,7,'No',1,0);
$pdf->Cell(150	,7,'Product Description',1,0);
$pdf->Cell(10	,7,'Qty',1,0);
$pdf->Cell(20	,7,'Price',1,1,'C');//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter


//items
$query=mysqli_query($conn,"select * from cart where crt_id = '".$cart['crt_id']."'");
$qty=0;
$price=0;
$i=1;
while($item=mysqli_fetch_array($query)){

	$pdf->Cell(10	,7,$i++,1,0);
	$pdf->Cell(150	,7,$cart['pname'],1,0);
	$pdf->Cell(10	,7,number_format($cart['qty']),1,0,'C');
	$pdf->Cell(20	,7,number_format($cart['price']),1,1,'C');//end of line
	$qty*=$cart['qty'];
	$price+=$cart['price'];

}
//summary
$pdf->Cell(127	,7,'',0,0);
$pdf->Cell(33	,7,'Subtotal',0,0);
$pdf->Cell(10	,7,'Rs.',1,0);
$pdf->Cell(20	,7,number_format($price),1,1,'R');//end of line

$pdf->Cell(127	,7,'',0,0);
$pdf->Cell(33	,7,'Discount',0,0);
$pdf->Cell(10	,7,'Rs.',1,0);
$pdf->Cell(20	,7,number_format($cart['dis']),1,1,'R');//end of line

$pdf->Cell(127	,7,'',0,0);
$pdf->Cell(33	,7,'Total Amount',0,0);
$pdf->Cell(10	,7,'Rs.',1,0);
$pdf->Cell(20	,7,number_format($price - $cart['dis']),1,1,'R');//end of line


$pdf->Output();
?>
