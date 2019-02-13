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

          require_once('../mysqli_connect.php');
          //customerinfo
          $query = "INSERT INTO invoice (first_name, last_name, street, city, province, postal_code, invoice_date, note, due_date, id, invoice_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NULL, ?)";

          $stmt = mysqli_prepare($conn, $query);

          mysqli_stmt_bind_param($stmt, "ssssssssss", $f_name, $l_name, $street, $city, $province, $postal_code, $invoice_date, $note, $due_date, $invoice_number);

          mysqli_stmt_execute($stmt);

          $affected_rows = mysqli_stmt_affected_rows($stmt);

          if($affected_rows == 1){

            header('Location: viewcustomer.php');

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

              echo "$missing</br><a href='addinvoice1.php'>Back</a>";

            }
        }
    }
    ?>
