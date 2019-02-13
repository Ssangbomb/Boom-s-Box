<?php
require_once('../mysqli_connect.php');

$query = "SELECT * FROM invoice LEFT JOIN purchase ON invoice.invoice_number = purchase.invoice_number_id";

$response = mysqli_query($conn, $query);


if($response){

  $column = '<table cellspacing="3" cellpadding="5">

    <tr><td align="left"><b>Invoice Number</b></td>
    <td align="left"><b>First Name</b></td>
    <td align="left"><b>Last Name</b></td>
    <td align="left"><b>Street</b></td>
    <td align="left"><b>City</b></td>
    <td align="left"><b>Province</b></td>
    <td align="left"><b>Postal code</b></td>
    <td align="left"><b>Invoice Date</b></td>
    <td align="left"><b>Note</b></td>
    <td align="left"><b>Due Date</b></td>
    <td align="left"><b>Product</b></td>
    <td align="left"><b>Quantity</b></td>
    <td align="left"><b>Price</b></td>
    <td align="left"><b>tax</b></td>
    <td align="left"><b>Payment Type</b></td>
    <td align="left"><b>Amount</b></td>
    </tr>';

 $info = '';
 $tot = 0;
while($row = mysqli_fetch_array($response)){
  if($row['invoice_number'] == $row['invoice_number_id']){
    $tot = $tot + $row['amount'];
    $info .= '<tr><td align="left">' .
    $row['invoice_number'] . '</td><td align="left">' .
    $row['first_name'] . '</td><td align="left">' .
    $row['last_name'] . '</td><td align="left">' .
    $row['street'] . '</td><td align="left">' .
    $row['city'] . '</td><td align="left">' .
    $row['province'] . '</td><td align="left">' .
    $row['postal_code'] . '</td><td align="left">' .
    $row['invoice_date'] . '</td><td align="left">' .
    $row['note'] . '</td><td align="left">' .
    $row['due_date'] . '</td><td align="left">' .
    $row['product'] . '</td><td align="left">' .
    $row['quantity'] . '</td><td align="left">' .
    $row['price'] . '</td><td align="left">' .
    $row['tax'] . '</td><td align="left">' .
    $row['payment_type'] . '</td><td align="left">' .
    $row['amount'] . '</td></tr>';
    }
  }
  $info .= '</table>';

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
    </style>
  </head>
  <body>
    <h1><a href="hearingcenter.php">HearingCenter Invoice</a></h1>
    <a href="view.php">Back</a>
    <div>
      <p><?=$column?></p>
      <p><?=$info?></p>
    </div>
    <div>
      <p><b>Total : $<?=$tot?></b></p>
    </div>
  </body>
</html>
