<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('include/header.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
$qtr=0;
$month = date('m');
$year = date('y');
$sql1="SELECT * FROM opp_info";  //Counting the number of rows
$GetId=mysqli_num_rows($conn->query($sql1));   //Getting the row count
//$invID=str_pad($GetId, 4,'0',STR_PAD_LEFT);  //Generating the last digits for the proposal number.
$unique = substr(uniqid(rand(), true), 4,4);
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
$cont_type=$_POST['cont_type'];
$cont_scope=$_POST['cont_scope'];
$leb=$_POST['leb'];
$forecast_val=$_POST['forecast_val'];
$net=$_POST['net'];
$booking=$_POST['booking'];
$proposal_man=$_POST['proposal_man'];
$sales_man = $_POST['sales_man'];
$creator = $_POST['creator'];
$status = $_POST['status'];
$bid_request_actual=date('Y-m-d',strtotime($_POST['bid_request_actual']));
$proposal_expected=date('Y-m-d',strtotime($_POST['proposal_expected']));
$proposal_last=date('Y-m-d',strtotime($_POST['proposal_last']));
$ord_date_expected=date('Y-m-d',strtotime($_POST['ord_date_expected']));
$ord_date_actual=date('Y-m-d',strtotime($_POST['ord_date_actual']));
$sql="INSERT INTO tblopportunity VALUES('$cont_type','$cont_scope','$leb','$forecast_val','$net','$booking','$proposal_man','$sales_man','$creator','$status','$bid_request_actual','$proposal_expected','$proposal_last','$ord_date_expected','$ord_date_actual')";
$results=$conn->query($sql);
//$lastInsertId = $dbh->lastInsertId();
if($results=="TRUE")
{
$_SESSION['msg']="Project Listed successfully";
header('location:manage-opportunity.php');
}
else 
{
//$_SESSION['error']="Something went wrong. Please try again";
echo "Error: " . $sql . "<br>" . $conn->error;
header('location:manage-opportunity.php');
}

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Project</title>
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
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Project</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Project Information
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Contract Typle<span style="color:red;">*</span></label>
<select class="form-control" name="cont_type" required="required">
<option value"C1">New Build</option>
<option value"C2">Renovation</option>
<option value"C3">Customer Service</option>
<option value"C4">Spare Parts</option>
<option value"C5">Service Only</option>
</select>
</div>

<div class="form-group">
<label>Contract Scope<span style="color:red;">*</span></label>
<select class="form-control" name="cont_scope" required="required">
<option value"S1">Engg. Only</option>
<option value"S2">Engg + Materail Only</option>
<option value"S3">Service Only </option>
<option value"S4">Engg+Supp+Erection(excl.civil)</option>
<option value"S4">Engg+Supp+Erection (Incl.Civil)</option>
</select>
</div>
<div class="form-group">
<label>LEB Method<span style="color:red;">*</span></label>
<select class="form-control" name="leb" required="required">
<option value"L1">A</option>
<option value"L2">B</option>
<option value"L3">C </option>
</select>
</div>


<div class="form-group">
<label>Forecast Value<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="forecast_val" autocomplete="on"  required />
</div>


<div class="form-group">
<label>Net Contribution %<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="net" autocomplete="on"  required />
</div>

<div class="form-group">
<label>Booking Report Value<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="booking" autocomplete="on"  required />
</div>

<div class="form-group">
<label> Sales Manager<span style="color:red;">*</span></label>
<select class="form-control" name="proposal_man" required="required">
<option value=""> Select Employee</option>

<?php $sql = "SELECT * FROM tblemployee";
$results=$conn->query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($results->num_rows> 0)
{
foreach($results as $result)
{               ?>    
<option value="<?php echo htmlentities($result['eid']);?>"><?php echo htmlentities($result['FullName']);?></option>
 <?php }} ?> 
</select>
</div>


<div class="form-group">
<label> Proposal Manager<span style="color:red;">*</span></label>
<select class="form-control" name="sales_man" required="required">
<option value=""> Select Employee</option>

<?php $sql = "SELECT * FROM tblemployee where status=1";
$results=$conn->query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($results->num_rows> 0)
{
foreach($results as $result)
{               ?>    
<option value="<?php echo htmlentities($result['eid']);?>"><?php echo htmlentities($result['FullName']);?></option>
 <?php }} ?> 
</select>
</div>



<div class="form-group">
<label> Creator<span style="color:red;">*</span></label>
<select class="form-control" name="creator" required="required">
<option value=""> Select Employee</option>

<?php $sql = "SELECT * FROM tblemployee";
$results=$conn->query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($results->num_rows> 0)
{
foreach($results as $result)
{               ?>    
<option value="<?php echo htmlentities($result['eid']);?>"><?php echo htmlentities($result['FullName']);?></option>
 <?php }} ?> 
</select>
</div>



<div class="form-group">
<label>Status<span style="color:red;">*</span></label>
<select class="form-control" name="status" required="required">
<option value"1">Budget</option>
<option value"2">Buyer Defined</option>
<option value"3">Lost</option>
<option value"4">Won</option>
<option value"4">Hold</option>
<option value"4">Cancelled</option>
<option value"4">No Bid</option>
</select>
</div>
<div class="form-group">
<label>Bid Request Recieved(Actual)<span style="color:red;">*</span></label>
<input class="form-control" type="date" name="bid_request_actual" autocomplete="on"  required />
</div>
<div class="form-group">
<label>Proposal Expected(Expected)<span style="color:red;">*</span></label>
<input class="form-control" type="date" name="proposal_expected" autocomplete="on"  required />
</div>
<div class="form-group">
<label>Proposal(Last Revision)<span style="color:red;">*</span></label>
<input class="form-control" type="date" name="proposal_last" autocomplete="on"  required />
</div>
<div class="form-group">
<label>Order Date (Expected)<span style="color:red;">*</span></label>
<input class="form-control" type="date" name="ord_date_expected" autocomplete="on"  required />
</div>
<div class="form-group">
<label>Order date (Actual) or Closed date(Actual)<span style="color:red;">*</span></label>
<input class="form-control" type="date" name="ord_date_actual" autocomplete="on"  required />
</div>

<button type="submit" name="add" class="btn btn-info">Add </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>

