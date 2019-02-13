<?php
  require_once('../mysqli_connect.php');


settype($_POST['id'], 'integer');
$filtered = array(
  'id' => mysqli_real_escape_string($conn, $_POST['id'])
);
$query = "
  DELETE FROM invoice WHERE invoice_number = '{$filtered['id']}'
";
$result = mysqli_query($conn, $query);
if($result === false){
  echo 'Something wrong in deleteing process';
  error_log(mysqli_error($conn));
} else {
  echo 'Deleted. <a href="deletecustomer.php">Back</a>';
}
?>
