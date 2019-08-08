<?php
session_start();
error_reporting(0);
include('includes/config.php');
//$conn=new PDO('localhost','id10330685_localhost','SRM2020','id10330685_intern');
$qtr=0;

$month = date('m');
$year = date('y');
$sql1 = "SELECT count(*) from opp_info";
$query=$dbh->prepare($sql1);
$query->execute();//Getting the row count
$invID=str_pad($sql1, 4,'0',STR_PAD_LEFT);  //Generating the last digits for the proposal number.
if($month<=3){					//Checking for the year quarter.
	$qtr='03';
}
elseif($month<=6){
	$qtr='06';
}
elseif ($month<=9) {
	$qtr='09';
}
else{
	$qtr='12';
}
$cont_no = 'C'.$qtr.$year.$invID;  
$cont_type = $_POST['cont_type'];
$cont_scope = $_POST['cont_scope'];
$leb = $_POST['leb'];
$forecast_val = $_POST['forecast_val'];
$net_cont = $_POST['net_cont'];
$booking = $_POST['booking'];
$manager = $_POST['manager'];
$sales = $_POST['sales'];
$created = $_POST['created'];
$stat = $_POST['stat'];
$bid_actual = $_POST['bid_actual'];
$prop_expect = $_POST['prop_expect'];
$prop_rev = $_POST['prop_rev'];
$ord_date_expect = date('Y-m-d',strtotime($_POST['ord_date_expect']));
$ord_date_actual = date('Y-m-d',strtotime($_POST['ord_date_actual']));
$sql = "INSERT INTO opp_info(Contact_No,Contract_type,Contract_Scope,LEB,Forecast_val,Net_Cont,Booking_val,Proposal_man,Sales_man,Created,Status,Bid_Actual,Proposal_expect,Proposal_rev,Ord_date_exp,Ord_date_act) VALUES(:cont_no,:cont_type,:cont_scope,:leb,:forecast_val,:net_cont,:booking,:manager,:sales,:created,:stat,:bid_actual,:prop_expect,:prop_rev,:ord_date_expect,:ord_date_actual)";
$query=$dbh->prepare($sql);
$query-> bindParam(':cont_no', $cont_no, PDO::PARAM_STR);
print("Here1");
$query-> bindParam(':cont_type', $cont_type, PDO::PARAM_STR);
$query-> bindParam(':cont_scope', $cont_scope, PDO::PARAM_STR);
$query-> bindParam(':leb', $leb, PDO::PARAM_STR);
$query-> bindParam(':forecas_val', $forecast_val, PDO::PARAM_INT);
$query-> bindParam(':net_cont', $net_cont, PDO::PARAM_INT);
$query-> bindParam(':booking', $booking, PDO::PARAM_INT);
$query-> bindParam(':manager', $manager, PDO::PARAM_STR);
$query-> bindParam(':sales', $sales, PDO::PARAM_STR);
$query-> bindParam(':created', $created, PDO::PARAM_STR);
$query-> bindParam(':stat', $stat, PDO::PARAM_STR);
$query-> bindParam(':bid_actual', $bid_actual, PDO::PARAM_INT);
$query-> bindParam(':prop_expect', $prop_expect, PDO::PARAM_INT);
$query-> bindParam(':prop_rev', $prop_rev, PDO::PARAM_INT);
$query-> bindParam(':ord_date_expect', $ord_date_expect, PDO::PARAM_STR);
$query-> bindParam(':ord_date_actual', $ord_date_actual, PDO::PARAM_STR);
$query-> execute();
print_r("Created");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Contract Master</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">Opportunity Information</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 INFORMATION FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Contract Type</label>
        <select id="cont_type" name="cont_type">
          <option value="N/A">N/A</option>
          <option value="New Build">New Build</option>
          <option value="Renovation">Renovation</option>
          <option value="Customer Service">Customer Service</option>
          <option value="Spare Parts">Spare Parts</option>
          <option value="Service Only">Service Only</option>
        </select>
</div>
<div class="form-group">
<label>Contract Scope</label>
<select id="cont_scope" name="cont_scope">
          <option value="N/A">N/A</option>
          <option value="Engg Only">Engg Only</option>
          <option value="Engg+Material Only">Engg+Material Only</option>
          <option value="Engg+Supp+Erection(excl.civil)">Engg+Supp+Erection(excl.civil)</option>
          <option value="Engg+Supp+Erection (Incl.Civil)">Engg+Supp+Erection (Incl.Civil)</option>
        </select>
</div>
 <div class="form-group">
<label>LEB Method</label>
<select id="leb" name="leb">
          <option value="N/A">N/A</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
</div>
<div class="form-group">
<label>Forecast Value</label>
<input class="form-control" type="text" name="forecast_val" autocomplete="off" required />
</div>
<div class="form-group">
<label>Net Contribution</label>
<input class="form-control" type="text" name="net_cont" autocomplete="off" required />
</div>
<div class="form-group">
<label>Booking Reporting Value</label>
<input class="form-control" type="text" name="booking" autocomplete="off" required />
</div>
<div class="form-group">
<label>Proposal Manager</label>
<input class="form-control" type="text" name="manager" autocomplete="off" required />
</div>
<div class="form-group">
<label>Sales Manager</label>
<input class="form-control" type="text" name="sales" autocomplete="off" required />
</div>
<div class="form-group">
<label>Created By</label>
<input class="form-control" type="text" name="created" autocomplete="off" required />
</div>
<div class="form-group">
<label>Status</label>
       <select id="stat" name="stat">
        <option value="N/A">N/A</option>
         <option value="Budget">Budget</option>
         <option value="Buyer Defined">Buyer Defined</option>
         <option value="Lost">Lost</option>
         <option value="Won">Won</option>
         <option value="Hold">Hold</option>
         <option value="Cancelled">Cancelled</option>
         <option value="Not Bid">Not Bid</option>
       </select>
</div>
<div class="form-group">
<label>Bid Request Recieved(Actual)</label>
<input class="form-control" type="text" name="bid_actual" autocomplete="off" required />
</div>
<div class="form-group">
<label>Proposal Expected</label>
<input class="form-control" type="text" name="prop_expect" autocomplete="off" required />
</div>
<div class="form-group">
<label>Proposal(Last Revision)</label>
<input class="form-control" type="text" name="prop_rev" autocomplete="off" required />
</div>
<div class="form-group">
<label>Order Date(Expected)</label>
<input class="form-control" type="date" name="ord_date_expect" autocomplete="off" required />
</div>
<div class="form-group">
<label>Order Date(Actual) or Closed Date(Actual)</label>
<input class="form-control" type="date" name="ord_date_actual" autocomplete="off" required />
</div>
 <button type="submit" name="SUBMIT" class="btn btn-info">LOGIN </button>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</script>
</body>
</html>
