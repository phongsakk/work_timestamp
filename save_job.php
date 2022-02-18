<?php
include("condb.php");

if (isset($_POST["job_detail"])) {
	$m_id 		= mysqli_real_escape_string($condb, $_POST["m_id"]);
	$job_detail = mysqli_real_escape_string($condb, $_POST["job_detail"]);
	$job_remark = mysqli_real_escape_string($condb, $_POST["job_remark"]);
	$job_by 	= mysqli_real_escape_string($condb, $_POST["job_by"]);
	$date_start = mysqli_real_escape_string($condb, $_POST["date_start"]);
	$date_end 	= mysqli_real_escape_string($condb, $_POST["date_end"]);

	$sql = "INSERT INTO `tbl_job` ( `ref_m_id`, `job_detail`, `job_remark`, `job_by`, `date_start`, `date_end`)
		VALUES ( '{$m_id}', '{$job_detail}', '{$job_remark}', '{$job_by}', '{$date_start}', '{$date_end}')";
	echo $sql;
	$result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));
	mysqli_close($condb);

	if ($result) {
		echo "<script type='text/javascript'>";
		//echo "alert('บันทึกข้อมูลสำเร็จ');";
		echo "window.location = 'job.php'; ";
		echo "</script>";
	} else {
		echo "<script type='text/javascript'>";
		echo "alert('Error');";
		echo "window.location = 'job.php'; ";
		echo "</script>";
	}
} else {
	echo "<script type='text/javascript'>";
	echo "alert('error!!!');";
	echo "window.location = 'job.php'; ";
	echo "</script>";
}
