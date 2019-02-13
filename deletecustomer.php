<?php
  require_once("../mysqli_connect.php");

  $query = "SELECT * FROM invoice";

  $result = mysqli_query($conn, $query);

  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"deletecustomer.php?id={$row['invoice_number']}\">{$row['first_name']} {$row['last_name']}</a></li>";
  }
  $info = array(
    'first_name' => '',
    'last_name' => '',
    'street' => '',
    'city' => '',
    'province' => '',
    'postal_code' => '',
    'invoice_date' => '',
    'note' => '',
    'invoice_number' => '',
    'due_date' => ''
  );
  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM invoice WHERE invoice_number={$filtered_id}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $info['first_name'] = htmlspecialchars($row['first_name']);
    $info['last_name'] = htmlspecialchars($row['last_name']);
    $info['street'] = htmlspecialchars($row['street']);
    $info['city'] = htmlspecialchars($row['city']);
    $info['province'] = htmlspecialchars($row['province']);
    $info['postal_code'] = htmlspecialchars($row['postal_code']);
    $info['invoice_date'] = htmlspecialchars($row['invoice_date']);
    $info['note'] = htmlspecialchars($row['note']);
    $info['invoice_number'] = htmlspecialchars($row['invoice_number']);
    $info['due_date'] = htmlspecialchars($row['due_date']);
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Invoice</title>
    <style media="screen">
      .info{
        size: 30;
      }
    </style>
  </head>
  <body>
    <h1><a href="hearingcenter.php">Hearing Center</a></h1>
    <p><a href="delete.php">Back</a></p>
    <h3>Delete Customer Information</h3>
    <ol>
      <?=$list?>
    </ol>
    <form action="customerdeleted.php" method="post">
      <input type="hidden" name = "id" value="<?=$filtered_id?>">
      <p>First Name:
        <input class="info" type="text" name="first_name" value="<?=$info['first_name']?>">
      </p>
      <p>Last Name:
        <input class="info" type="text" name="last_name" value="<?=$info['last_name']?>">
      </p>
      <p>Street:
        <input class="info" type="text" name="street" value="<?=$info['street']?>">
      </p>
      <p>City:
        <input class="info" type="text" name="city" value="<?=$info['city']?>">
      </p>
      <p>Province(2 Characters):
        <input class="info" type="text" name="province" maxlength="2" value="<?=$info['province']?>">
      </p>
      <p>Postal Code:
        <input class="info" type="text" name="postal_code" maxlength="7" value="<?=$info['postal_code']?>">
      </p>
      <p>Invoice Date(YYYY-MM-DD):
        <input class="info" type="text" name="invoice_date" value="<?=$info['invoice_date']?>">
      </p>
      <p>Invoice Number:
        <input class="info" type="text" name="invoice_number" value="<?=$info['invoice_number']?>">
      </p>
      <p>note
        <input class="info" type="text" name="note" value="<?=$info['note']?>">
      </p>
      <p>Due Date
        <input class="info" type="text" name="due_date" value="<?=$info['due_date']?>">
      </p>
      <p>
        <input type="submit" name = "submit" value="Delete">
      </p>
    </form>
  </body>
</html>
