    <?php
      if(isset($_POST['submit'])){
        $date_missing = array();

        if(empty($_POST['first_name'])){

          $date_missing[] = 'First Name';

        } else {

          $f_name = $_POST['first_name'];

        }

        if(empty($_POST['last_name'])){

          $date_missing[] = 'Last Name';

        } else {

          $l_name = $_POST['last_name'];

        }

        if(empty($_POST['street'])){

          $date_missing[] = 'Street';

        } else {

          $street = $_POST['street'];

        }

        if(empty($_POST['city'])){

          $date_missing[] = 'City';

        } else {

          $city = $_POST['city'];

        }

        if(empty($_POST['province'])){

          $date_missing[] = 'Province';

        } else {

          $province = $_POST['province'];

        }

        if(empty($_POST['postal_code'])){

          $date_missing[] = 'Postal Code';

        } else {

          $postal_code = $_POST['postal_code'];

        }

        if(empty($_POST['invoice_date'])){

          $date_missing[] = 'Invoice Date';

        } else {

          $invoice_date = $_POST['invoice_date'];

        }

        if(empty($_POST['invoice_number'])){

          $date_missing[] = 'Invoice Number';

        } else {

          $invoice_number = $_POST['invoice_number'];

        }

        if(isset($_POST['note'])){

          $note = $_POST['note'];

        }

        if(empty($_POST['due_date'])){

          $date_missing[] = 'Due Date';

        } else {

          $due_date = $_POST['due_date'];

        }

        if(empty($date_missing)){
          settype($_POST['id'], 'integer');
          require_once('../mysqli_connect.php');

          $query = "UPDATE invoice SET first_name = '$f_name', last_name = '$l_name', street = '$street', city = '$city', province = '$province', postal_code = '$postal_code', invoice_date = '$invoice_date', invoice_number = '$invoice_number', note = '$note', due_date = '$due_date' WHERE id = {$_POST['id']}";


          $result = mysqli_query($conn, $query);

          if($result == true){

            header('Location: viewcustomer.php');

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
