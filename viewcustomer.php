<?php
require_once('../mysqli_connect.php');

$query = "SELECT invoice_number, first_name, last_name, street, city, province, postal_code, invoice_date, note, due_date, id FROM invoice";

$response = mysqli_query($conn, $query);


if($response){

  $column = '<table align="left" cellspacing="3" cellpadding="5">

    <tr><td align="left"><b>Customer ID</b></td>
    <td align="left"><b>First Name</b></td>
    <td align="left"><b>Last Name</b></td>
    <td align="left"><b>Street</b></td>
    <td align="left"><b>City</b></td>
    <td align="left"><b>Province</b></td>
    <td align="left"><b>Postal code</b></td>
    <td align="left"><b>Invoice Date</b></td>
    <td align="left"><b>Invoice Number</b></td>
    <td align="left"><b>Note</b></td>
    <td align="left"><b>Due Date</b></td>
    <td align="left"></td>
    </tr>';

 $info = '';
while($row = mysqli_fetch_array($response)){
  $info = $info.'<tr><td align="left">' .
  $row['id'] . '</td><td align="left">' .
  $row['first_name'] . '</td><td align="left">' .
  $row['last_name'] . '</td><td align="left">' .
  $row['street'] . '</td><td align="left">' .
  $row['city'] . '</td><td align="left">' .
  $row['province'] . '</td><td align="left">' .
  $row['postal_code'] . '</td><td align="left">' .
  $row['invoice_date'] . '</td><td align="left">' .
  $row['invoice_number'] . '</td><td align="left">' .
  $row['note'] . '</td><td align="left">' .
  $row['due_date'] . '</td>
  </tr>';
  }
  echo '</table>';

} else {
  echo "Couldn't issue database query</br>";

  echo mysqli_error($conn);
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="hearingcenter.php">HearingCenter Invoice</a></h1>
    <a href="view.php">Back</a>
    <p><?=$column?></p>
    <p><?=$info?></p>
  </body>
</html>
