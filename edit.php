<?php

include("allstudents.php");

include("connection.php");



$id_std = intval($_GET['id_std']);
$idsubj = mysqli_real_escape_string($conn, $_POST['id_subj']);
$student_grade = mysqli_real_escape_string($conn, $_POST['student_grade']);
$yeardates = mysqli_real_escape_string($conn, $_POST['year_dates']);

$sql = "UPDATE student_grades SET id_subj='".$idsubj."',student_grade='".$student_grade."',year_dates='".$yeardates."' WHERE id_std ='".$empid_std."'";

if (!mysqli_query($conn,$sql)) {
die('Error: ' . mysqli_error($conn));
}
header("Location: allstudents.php");
exit;

mysqli_close($conn);
?>

<form class="form-horizontal" role="form" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" method="post">

<div class="form-group">
<label class="col-lg-3 control-label">Id Subject:</label>
<div class="col-lg-8">
<input class="form-control" value="" type="text" name="id_subj">
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">:Student Grade</label>
<div class="col-lg-8">
<input class="form-control" value="" type="text" name="student_grade">
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Year Date:</label>
<div class="col-lg-8">
<input class="form-control" value="" type="text" name="year_dates">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"></label>
<div class="col-md-8">
<input class="btn btn-primary" value="Save Changes" type="submit" name="submit">

</div>   
</div>
</form>