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
    <h2>Add a NEW Invoice</h2>
    <h3>Customer Information</h3>
    <form action="customeradded.php" method="post">
      <p>First Name:
        <input class="info" type="text" name="first_name" value="">
      </p>
      <p>Last Name:
        <input class="info" type="text" name="last_name" value="">
      </p>
      <p>Street:
        <input class="info" type="text" name="street" value="">
      </p>
      <p>City:
        <input class="info" type="text" name="city" value="">
      </p>
      <p>Province(2 Characters):
        <input class="info" type="text" name="province" maxlength="2" value="">
      </p>
      <p>Postal Code:
        <input class="info" type="text" name="postal_code" maxlength="7" value="">
      </p>
      <p>Invoice Date(YYYY-MM-DD):
        <input class="info" type="text" name="invoice_date" value="">
      </p>
      <p>Invoice Number:
        <input class="info" type="text" name="invoice_number" value="">
      </p>
      <p>note:
        <input class="info" type="text" name="note" value="">
      </p>
      <p>Due Date(YYYY-MM-DD):
        <input class="info" type="text" name="due_date" value="">
      </p>
      <p>
        <input type="submit" name = "submit" value="Send">
      </p>
    </form>
  </body>
</html>
