<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblopportunity  WHERE Creator='$id'";
$conn->query($sql);
$_SESSION['delmsg']="Opportunity deleted scuccessfully ";
header('location:manage-opportunity.php');

}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Manage Opportunities</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <h4 class="header-line">Manage Opportunities</h4>
    </div>
     <div class="row">
    <?php if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['updatemsg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
</div>
</div>
<?php } ?>


   <?php if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Projects Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Contract Type</th>
					   					    <th>Contract Scope</th>
                                            <th>LEB</th>
                                            <th>Forecast Value</th>
											<th>Net Contribution</th>
											<th>Booking Reporting Value</th>
											<th>Proposal Manager</th>
											<th>Sales Manager</th>
											<th>Creator</th>
                                            <th>Status</th>
					   					    <th>Bid Request Actula</th>
                                            <th>Proposal Expected</th>
                                            <th>Proposal(Last Revision)</th>
											<th>Order Date Expected</th>
											<th>Order Date Actual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * FROM tblopportunity";
$results=$conn->query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($results->num_rows> 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result['Contract_type']);?></td>
                                            <td class="center"><?php echo htmlentities($result['Contract_scope']);?></td>
                                             <td class="center"><?php echo htmlentities($result['LEB']);?></td>
											 <td class="center"><?php echo htmlentities($result['Forecast_val']);?></td>
											 <td class="center"><?php echo htmlentities($result['Net_contribution']);?></td>
											 <td class="center"><?php echo htmlentities($result['Booking_reporting_val']);?></td>
											 <td class="center"><?php echo htmlentities($result['Proposal_man']);?></td>
											 <td class="center"><?php echo htmlentities($result['Sales_man']);?></td>
											 <td class="center"><?php echo htmlentities($result['Creator']);?></td>
											  <td class="center"><?php echo htmlentities($result['Status']);?></td>
											  <td class="center"><?php echo htmlentities($result['Bid_request_actual']);?></td>
											  <td class="center"><?php echo htmlentities($result['Proposal_expected']);?></td>
											  <td class="center"><?php echo htmlentities($result['Proposal(last_rev)']);?></td>
									  		 <td class="center"><?php echo htmlentities($result['Ord_date_expected']);?></td>
											 <td class="center"><?php echo htmlentities($result['Ord_date_actual']);?></td>
													 		 
                                            <td class="center">
                                            <a href="edit-project.php?PID=<?php echo htmlentities($result['PID']);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
											<a href="manage-opportunity.php?del=<?php echo htmlentities($result['Creator']);?>" onclick="return confirm('Are you sure you want to delete?');""><button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
