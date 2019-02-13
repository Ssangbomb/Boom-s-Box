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
    <p><a href="create.php">Back</a></p>
    <h2>Add Product</h2>
    <form action="productadded.php" method="post">
      <p>product:
        <input class="info" type="text" name="product" value="">
      </p>
      <p>Quantity:
        <input class="info" type="text" name="quantity" value="">
      </p>
      <p>Price:
        <input class="info" type="text" name="price" value="">
      </p>
      <p>
        <input type="submit" name = "submit" value="Send">
      </p>
    </form>
  </body>
</html>
