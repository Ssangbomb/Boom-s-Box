
<?php
  require_once("../mysqli_connect.php");

  $query = "SELECT * FROM product_list";

  $result = mysqli_query($conn, $query);

  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"deleteproduct.php?id={$row['id']}\">{$row['product']}</a></li>";
  }
  $info = array(
    'product' => '',
    'quantity' => '',
    'price' => '',
  );
  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM product_list WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $info['product'] = htmlspecialchars($row['product']);
    $info['quantity'] = htmlspecialchars($row['quantity']);
    $info['price'] = htmlspecialchars($row['price']);
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
    <h3>Delete Product List</h3>
    <ol>
      <?=$list?>
    </ol>
    <form action="productdeleted.php" method="post">
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
      <p>
        <input type="submit" name = "submit" value="Delete">
      </p>
    </form>
  </body>
</html>
