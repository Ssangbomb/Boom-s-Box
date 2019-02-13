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
          settype($_POST['id'], 'integer');
          require_once('../mysqli_connect.php');

          $query = "UPDATE product_list SET product = '$product', quantity = '$quantity', price = '$price' WHERE id = {$_POST['id']}";


          $result = mysqli_query($conn, $query);

          if($result == true){

            header('Location: viewproduct.php');

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
