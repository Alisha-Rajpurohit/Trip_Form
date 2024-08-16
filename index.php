<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
     $server = "localhost";
     $username = "root";
     $password = "";
    
    //  Create a Database connection 
     $con = mysqli_connect($server, $username, $password);

    //  Check for connection success 
     if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
     }
    //   echo "Success connecting to the db";

   //Collect post variables 
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $desc = $_POST['desc'];
   $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
 // echo $sql;

//  Execute the query 
   if ($con->query($sql) == true) {
    //   echo "Successfully inserted";

    // Flag for successful insertion
    $insert = true;
   }
   else{
      echo "ERROR: $sql <br> $con->error";
   }

//    Close the Database connection 
   $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IIT Kharagpur US trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submitting the form. We are glad to see your exitement for the trip. </p>";
    }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Contact number">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter your any other information"></textarea>
            <span>
                <button id="btn">Submit</button>
                <button id="btn">Reset</button>
            </span>
        </form>
    </div>
   
</body>
</html>