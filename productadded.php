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

        if(empty($date_missing)){

          require_once('../mysqli_connect.php');

          $query = "INSERT INTO product_list (product, quantity, id, price) VALUES (?, ?, NULL, ?)";

          $stmt = mysqli_prepare($conn, $query);

          mysqli_stmt_bind_param($stmt, "ssd", $product, $quantity, $price);

          mysqli_stmt_execute($stmt);

          $affected_rows = mysqli_stmt_affected_rows($stmt);

          if($affected_rows == 1){

            header('Location: viewproduct.php');

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
