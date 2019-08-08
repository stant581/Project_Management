<?php 
require_once("includes/config.php");
if(!empty($_POST["eid"])) {
  $eid= strtoupper($_POST["eid"]);
 
$sql ="SELECT FullName,Status FROM tblemployee WHERE eid=:eid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $ressult)
 {
if($result->Status==0)
{
echo "<span style='color:red'> employee ID Blocked </span>"."<br />";
echo "<b>Employee Name-</b>" .$result->FullName;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} 
else
{
echo htmlentities($result->FullName);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{
  
  echo "<span style='color:red'> Invaid employee Id. Please Enter Valid employee id .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
