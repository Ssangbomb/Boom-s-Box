<?php
  require_once("../mysqli_connect.php");

  //product_list
  $query = "SELECT * FROM product_list";
  $result = mysqli_query($conn, $query);
  $list = '';
  while($row=mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"addpurchase.php?id={$row['id']}\">{$row['product']}</a></li>";
  }

  $price = '';
  $product_list = '';
  $info = array('price' => '');
  $select_form1 = '';
  if(isset($_GET['id'])){
    //customer_list
    $query = "SELECT * FROM invoice";

    $result = mysqli_query($conn, $query);

    $select_form1 = '<select name="invoice_number_id">';
    while($row = mysqli_fetch_array($result)){
      $select_form1 .= '<option value="'.$row['id'].'">'.$row['first_name'].'</option>';
    }
    $select_form1 .= '</select>';

    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM product_list WHERE id=$filtered_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $info['price'] = htmlspecialchars($row['price']);
    $price = '<input class="info" type="text" name="price" value="'.$info['price'].'">';
    $product_list = '<input class="info" type="hidden" name="product" value="'.$row['product'].'">';
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Purchase</title>
    <style media="screen">
      .info{
        size: 30;
      }
    </style>
  </head>
  <body>
    <h1><a href="hearingcenter.php">Hearing Center</a></h1>
    <p><a href="create.php">Back</a></p>
    <h2>Add a NEW Invoice</h2>
    <h3>Purchase</h3>
    <form action="purchaseadded.php" method="post">
      <input type="hidden" name = "id" value="<?=$filtered_id?>">
      <p>Choose Product List:
        <ol>
          <?=$list?>
        </ol>
      </p>
      <?=$product_list?>
      <p>Customer:
        <?=$select_form1?></p>
      <p>quantity:
        <input class="info" type="text" name="quantity" value="">
      </p>
      <p>Price:
        <?=$price?>
      </p>
      <p>tax:
        <input class="info" type="text" name="tax" value="">
      </p>
      <h3>Payment</h3>
      <p>Payment Type:
        <select name="payment_type">
          <option value="debit">Debit</option>
          <option value="credit">Credit</option>
          <option value="cash">Cash</option>
        </select>
      </p>
      <p>Amount:
        <input class="info" type="text" name="amount" value="">
      </p>
      <p>
        <input type="submit" name = "submit" value="Send">
      </p>
    </form>
    </body>
</html>
