    <?php
      if(isset($_POST['submit'])){
        $date_missing = array();

        if(empty($_POST['product'])){

          $date_missing[] = 'Product';

        } else {

          $product = $_POST['product'];

        }

        if(empty($_POST['quantity'])){

          $date_missing[] = 'Quantity';

        } else {

          $quantity = $_POST['quantity'];

        }

        if(empty($_POST['price'])){

          $date_missing[] = 'Price';

        } else {

          $price = $_POST['price'];

        }

        if(empty($_POST['tax'])){

          $date_missing[] = 'Tax';

        } else {

          $tax = $_POST['tax'];

        }

        if(empty($_POST['payment_type'])){

          $date_missing[] = 'Payment Type';

        } else {

          $payment_type = $_POST['payment_type'];

        }

        if(empty($_POST['amount'])){

          $date_missing[] = 'Amount';

        } else {

          $amount = $_POST['amount'];

        }

        if(empty($date_missing)){

          require_once('../mysqli_connect.php');


          $query = "INSERT INTO purchase (id, product, quantity, price, tax, payment_type, amount, invoice_number_id) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";

          $stmt = mysqli_prepare($conn, $query);

          settype($_POST['invoice_number_id'], 'integer');

          mysqli_stmt_bind_param($stmt, "sssssss", $product, $quantity, $price, $tax, $payment_type, $amount, $_POST['invoice_number_id']);

          mysqli_stmt_execute($stmt);

          $affected_rows = mysqli_stmt_affected_rows($stmt);

          settype($_POST['id'], 'integer');
          $filtered = array(
            'id' => mysqli_real_escape_string($conn, $_POST['id'])
          );

          $query = "SELECT * FROM product_list WHERE id='{$filtered['id']}'";

          $result = mysqli_query($conn, $query);

          $row = mysqli_fetch_array($result);

          $left = $row['quantity'] - $quantity;

          if($left < 0){

            echo "There is no more Stock";

          } else {

            $query = "UPDATE product_list SET quantity = '$left' WHERE id='{filtered['id']}'";

            $result = mysqli_query($conn, $query);
            if($result === false){
              echo "somethig wrong";

              echo mysqli_error();
            }
          }

          if($affected_rows == 1){

            header('Location: viewinvoice.php');

            mysqli_stmt_close($stmt);
            mysqli_close($conn);

          } else {

            echo 'Error Occured<br>';
            echo mysqli_error();

            mysqli_stmt_close($stmt);
            mysqli_close($conn);

          }

        } else {

            echo "You need to enter following data</br>";


            foreach($data_missing as $missing){

              echo "$missing</br><a href='addinvoice2.php'>Back</a>";

            }
        }
    }
    ?>
