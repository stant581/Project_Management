<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['create']))
{
$y = uniqid();
$cid = "CID".$y;
$category=$_POST['company'];
$location=$_POST['location'];
$job=$_POST['job'];
$cont_name=$_POST['cont_name'];
$cont_email=$_POST['cont_email'];
$cont_mob=$_POST['cont_mob'];
$create_date=date("Y-m-d H:i:s");
$status=$_POST['status'];
$sql="INSERT INTO  tblcompany VALUES('$cid','$category','$location','$job','$cont_name','$cont_email','$cont_mob','$create_date','$status')";
if($conn->query($sql) === TRUE)
{
$_SESSION['msg']="Brand Listed successfully";
header('location:add_project.php');
}
else 
{
//$_SESSION['error']="Something went wrong. Please try again";
echo "Error: " . $sql . "<br>" . $conn->error;
header('location:add_projects.php');
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
    <title> Add Clients</title>
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
                <h4 class="header-line">Add client</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Client Info
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Client Name</label>
<input class="form-control" type="text" name="company" autocomplete="off" required />
</div>
<div class="form-group">
<label>Location</label>
<input class="form-control" type="text" name="location" autocomplete="off" required />
</div>
<div class="form-group">
<label>Job</label>
<input class="form-control" type="text" name="job" autocomplete="off" required />
</div>
<div class="form-group">
<label>Contact Person Name</label>
<input class="form-control" type="text" name="cont_name" autocomplete="on" required />
</div>
<div class="form-group">
<label>Contact Person Email</label>
<input class="form-control" type="email" name="cont_email" autocomplete="on" required />
</div>
<div class="form-group">
<label>Contact Person Mobile</label>
<input class="form-control" type="text" name="cont_mob" autocomplete="on" required maxlength="10" />
</div>
<div class="form-group">
<label>Status</label>
 <div class="radio">
<label>
<input type="radio" name="status" id="status" value="1" checked="checked">Active
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="status" id="status" value="0">Inactive
</label>
</div>

</div>
<button type="submit" name="create" class="btn btn-info">Create </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>