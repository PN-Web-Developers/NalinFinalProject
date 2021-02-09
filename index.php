<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practicePHP</title>
    <!-- w3-css -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Pogit pper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
 <div class="container">
    <div class="row">
        <div class= "col-sm-3">
          <form action="index.php" method="post">

              <h1>Registration</h1>
              <p>FIll up all the forms with correct values</p>
              <hr class="mb-3">

              <label><b>First Name</b></label>
              <input type="firstname" class="form-control" name="firstname" required>

              <label><b>Last Name</b></label>
              <input type="lastname" class="form-control" name = "lastname" required>

              <label><b>Email Address</b></label>
              <input type="email" class="form-control" name = "email" required>

              <label><b>Phonenumber</b></label>
              <input type="phonenumber" class="form-control" name = "phonenumber" required>

              <label><b>Password</b></label>
              <input type="password" class="form-control" name = "password" required>
              
              <hr class="mb-3">

              <button type="submit" class="btn btn-primary" value="submit">Submit</button>
          </form>
       </div>
    </div>
 </div>

    <?php
    
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $pnumber = $_POST['phonenumber'];
    $pass = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "useraccounts";

    //conditions where phonenumber validation
    if(isset($_POST['phonenumber'])){
      if (is_numeric($pnumber)) {
        echo 'The number you entered is ' . $pnumber. '. This is a valid number.';
        }
        else {
        echo 'Error: You did not enter numbers only. Please enter only numbers.';
        }
    }

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    //insert data to database
    $sql = "INSERT INTO users(firstname, lastname, email, phonenumber, user_pass)
    VALUES ('$fname', '$lname' , '$email', '$pnumber','$pass')";

    // sql to delete a record
    $sql = "DELETE FROM users WHERE id=1";

    if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }

    //check if data insert to database successfully
    if ($conn->query($sql) === TRUE) {
      echo "<br> New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    ?>

<!-- <form  action="registration.php" method = "post">
    <div class="container">
                <div class="row">
                        <div class="col-sm-3">
                                <h1>Registration</h1>
                                <p>FIll up all the forms with correct values</p>
                                <hr class="mb-3">
                                <label><b>First Name</b></label>
                                <input type="text" class="form-control" name="firstname" id="register" required>

                                <label><b>Last Name</b></label>
                                <input type="text" class="form-control" name="lastname"  id="register" required>

                                <label><b>Email</b></label>
                                <input type="email" class="form-control" name="email"  id="register" required>

                                <label><b>Phone Number</b></label>
                                <input type="text" class="form-control" name="phonenumber"  id="register" required>

                                <label><b>Password</b></label>
                                <input type="password" class="form-control" name="password"  id="register"required>
                                <hr class="mb-3">                           
                                <input type="submit" class="btn btn-primary" class="form-control" id="register"  value="Sign Up">
                        </div>
                </div>
     </div>
 </form> -->

</body>
</html>
