<?php
require_once('../mysqli_connect.php');

$query = "SELECT * FROM product_list";

$response = mysqli_query($conn, $query);


if($response){

  $column = '<table align="left" cellspacing="3" cellpadding="5">

    <tr><td align="left"><b>ID</b></td>
    <td align="left"><b>Product</b></td>
    <td align="left"><b>Quantity</b></td>
    <td align="left"><b>Price</b></td>
    </tr>';

 $info = '';
while($row = mysqli_fetch_array($response)){
  $info = $info.'<tr><td align="left">' .
  $row['id'] . '</td><td align="left">' .
  $row['product'] . '</td><td align="left">' .
  $row['quantity'] . '</td><td align="left">' .
  $row['price'] . '</td><td align="left">';
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
