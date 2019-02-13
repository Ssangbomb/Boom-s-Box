
<?php
  require_once("../mysqli_connect.php");

  $query = "SELECT * FROM purchase";

  $result = mysqli_query($conn, $query);

  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"editpurchase.php?id={$row['id']}\">{$row['product']}</a></li>";
  }
  $info = array(
    'product' => '',
    'quantity' => '',
    'price' => '',
    'tax' => '',
    'payment_type' => '',
    'amount' => ''
  );
  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM purchase WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $info['product'] = htmlspecialchars($row['product']);
    $info['quantity'] = htmlspecialchars($row['quantity']);
    $info['price'] = htmlspecialchars($row['price']);
    $info['tax'] = htmlspecialchars($row['tax']);
    $info['payment_type'] = htmlspecialchars($row['payment_type']);
    $info['amount'] = htmlspecialchars($row['amount']);
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
    <p><a href="edit.php">Back</a></p>
    <h3>Edit Purchas & Product</h3>
    <ol>
      <?=$list?>
    </ol>
    <form action="purchaseedited.php" method="post">
      <input type="hidden" name = "id" value="<?=$filtered_id?>">
      <p>product:
        <input class="info" type="text" name="product" value="<?=$info['product']?>">
      </p>
      <p>Quantity:
        <input class="info" type="text" name="quantity" value="<?=$info['quantity']?>">
      </p>
      <p>Price:
        <input class="info" type="text" name="price" value="<?=$info['price']?>">
      </p>
      <p>Tax:
        <input class="info" type="text" name="tax" value="<?=$info['tax']?>">
      </p>
      <p>Payment Type:
        <input class="info" type="text" name="payment_type" value="<?=$info['payment_type']?>">
      </p>
      <p>Amount:
        <input class="info" type="text" name="amount" value="<?=$info['amount']?>">
      </p>
      <p>
        <input type="submit" name = "submit" value="Send">
      </p>
    </form>
  </body>
</html>
