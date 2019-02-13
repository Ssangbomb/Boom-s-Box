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
          settype($_POST['id'], 'integer');
          require_once('../mysqli_connect.php');

          $query = "UPDATE purchase SET product = '$product', quantity = '$quantity', price = '$price', tax = '$tax', payment_type = '$payment_type', amount = '$amount' WHERE id = {$_POST['id']}";


          $result = mysqli_query($conn, $query);

          if($result == true){

            header('Location: viewpurchase.php');

            mysqli_close($conn);

          } else {

            echo 'Error Occured<br>';
            echo mysqli_error();

            mysqli_close($conn);

          }

        } else {

            echo "You need to enter following data</br>";

            foreach($data_missing as $missing){

              echo "$missing</br><a href='editcustomer.php'>Back</a>";

            }
        }
    }
    ?>
