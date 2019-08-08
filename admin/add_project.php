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
/*$qtr=0;
$month = date('m');
$year = date('y');
$sql1="SELECT * FROM proj_info";  //Counting the number of rows
$GetId=mysqli_num_rows($conn->query($sql1));   //Getting the row count
//$invID=str_pad($GetId, 4,'0',STR_PAD_LEFT);  //Generating the last digits for the proposal numbee/
$unique = substr(uniqid(rand(), true), 4,4);*/
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
$opp_no=$_POST['opp_no'];
$opp_no_old=$_POST['opp_no_old'];
$ref=$_POST['ref'];
$opp_name=$_POST['opp_name'];
$opp_desc=$_POST['opp_desc'];
$plant=$_POST['plant'];
$business=$_POST['business'];
$entity = $_POST['entity'];
$sql="INSERT INTO tblproject VALUES('$opp_no','$opp_no_old','$ref','$opp_name','$opp_desc','$plant','$business','$entity')";
$results=$conn->query($sql);
//$lastInsertId = $dbh->lastInsertId();
if($results=="TRUE")
{
$_SESSION['msg']="Project Listed successfully";
header('location:add_opportunity.php');
}
else 
{
//$_SESSION['error']="Something went wrong. Please try again";
echo "Error: " . $sql . "<br>" . $conn->error;
header('location:add_opportunity.php');
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
<label>Opportunity No<span style="color:red;">*</span></label>
<input class="form-control" type="text" value="<?php $qtr=0;
$month = date('m');
$year = date('y');
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
$opportunity='P'.$qtr.$year.$unique;
echo $opportunity; ?>"name="opp_no" autocomplete="on"  required />
</div>
<div class="form-group">
<label>Old/Other Opportunity No<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="opp_no_old" autocomplete="on"  required />
</div>


<div class="form-group">
<label>Customer Reference<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="ref" autocomplete="on"  required />
</div>

<div class="form-group">
<label>Opportunity Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="opp_name" autocomplete="on"  required />
</div>

<div class="form-group">
<label>Opportunity Description / Comments<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="opp_desc" autocomplete="on"  required />
</div>

<div class="form-group">
<label>Plant Name & Unit No<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="plant" autocomplete="on"  required />
</div>

<div class="form-group">
<label>Business Unit<span style="color:red;">*</span></label>
<select class="form-control" name="business" required="required">
<option value"B1">Electrostatic precipitator</option>
<option value"B2">Flue gas Desulphurization</option>
<option value"B3">DeSOX </option>
<option value"B4">Fabric Filters</option>
</select>
</div>

<div class="form-group">
<label>KC Entity<span style="color:red;">*</span></label>
<select class="form-control" name="entity" required="required">
<option value"K1">KCKR</option>
<option value"K2">KCIN</option>
<option value"K3">KCVT </option>
<option value"K4">KCUS</option>
</select>
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
