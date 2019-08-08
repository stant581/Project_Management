<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

// code for block employee    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "UPDATE tblemployee SET status='$status' WHERE eid='$id'";
$conn->query($sql);
header('location:reg-employee.php');
}

//code for active employees
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "UPDATE tblemployee SET status='$status'  WHERE eid='$id'";
$conn->query($sql);
header('location:reg-employee.php');
}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Reg employees</title>
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
                <h4 class="header-line">Manage Reg employees</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Reg employees
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Email id </th>
                                            <th>Mobile Number</th>
                                            <th>Reg Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * from tblemployee";
$results=$conn-> query($sql);
$results->fetch_all(MYSQLI_ASSOC);
$cnt=1;
if($results->num_rows)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result['eid']);?></td>
                                            <td class="center"><?php echo htmlentities($result['FullName']);?></td>
                                            <td class="center"><?php echo htmlentities($result['email']);?></td>
                                            <td class="center"><?php echo htmlentities($result['Number']);?></td>
                                             <td class="center"><?php echo htmlentities($result['RegDate']);?></td>
                                            <td class="center"><?php if($result['status']==1)
                                            {
                                                echo htmlentities("Active");
                                            } else {

                                            echo htmlentities("Blocked");
											}
                                            ?></td>
                                            <td class="center">
<?php if($result['status']==1)
 {?>
  <a href="reg-employee.php?inid=<?php echo htmlentities($result['eid']);?>" onclick="return confirm('Are you sure you want to block this employee?');"><button class="btn btn-danger">Inactive</button>
<?php }
else 
{?>
  <a href="reg-employee.php?id=<?php echo htmlentities($result['eid']);?>" onclick="return confirm('Are you sure you want to active this employee?');"><button class="btn btn-primary">Active</button> 
                                            <?php } ?>
                                          
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
