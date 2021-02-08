<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practicePHP</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Pogit pper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>

<?php

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$pnumber = $_POST['phonenumber'];
$pass = $_POST['password'];

echo $firstname . " " . $lastname . " " .$email . " " . $phonenumber . " " . $password ;

$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "users";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO userprofile (firstname, lastname, email, phonenumber, password)
VALUES ($fname,$lname, $email,$pnumber,$pass)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
<form  action="registration.php" method = "post">
    <div class="container">
                <div class="row">
                        <div class="col-sm-3">
                                <h1>Registration</h1>
                                <p>FIll up all the forms with correct values</p>
                                <hr class="mb-3">
                                <label for="firstname"><b>First Name</b></label>
                                <input type="text" class="form-control" name="firstname" id="register" required>

                                <label for="lastname"><b>Last Name</b></label>
                                <input type="text" class="form-control" name="lastname"  id="register" required>

                                <label for="email"><b>Email</b></label>
                                <input type="email" class="form-control" name="email"  id="register" required>

                                <label for="phonenumber"><b>Phone Number</b></label>
                                <input type="text" class="form-control" name="phonenumber"  id="register" required>

                                <label for="password"><b>Password</b></label>
                                <input type="password" class="form-control" name="password"  id="register"required>
                                <hr class="mb-3">                           
                                <input type="submit" class="btn btn-primary" class="form-control" name ="create" id="register"  value="Sign Up">
                        </div>
                </div>
     </div>
 </form>

</body>
</html>
