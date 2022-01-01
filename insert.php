<?php
$insert = false;
$server="localhost";
$username="root";
$password="";
$dbname="form";

$conn = mysqli_connect($server,$username,$password,$dbname);
if(isset($_POST['submit'])){
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['age']) && !empty($_POST['gender']) && !empty($_POST['phone'])){
$name = $_POST['name'] ;
$email = $_POST['email'] ;
$age = $_POST['age'] ;
$gender = $_POST['gender'];
$phone = $_POST['phone'] ;
$other = $_POST['other'] ;

$query = "INSERT into form(name,email,age,gender,phone,other,dt) values('$name','$email','$age','$gender','$phone','$other',current_timestamp())";

$run = mysqli_query($conn,$query) or die(mysqli_error());

if($run){
    $insert = true;
    //echo"<p class='SubmitMsg'> Thanks for Filling the form! </p>";
}
else{
    echo"form not submitted";
}
}
    else{
        echo"all fields required";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Licorice&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <title>Student Details for Trip</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <img class= "bg" src="bg.jpg" alt ="Trip">
<div class="container">
      <div class="heading">
          <h1>Welcome to Manali trip Form</h1>
          <h3>Please fill the details to confirm your participation in the trip!</h3><br>
            <?php
            if( $insert == true ){
                echo"<p class='SubmitMsg'> Thanks for Filling the Form! Hope you Enjoy the trip</p>";
            }
            ?>

      </div>
    <form action="insert.php" method="post">
    <input type="text" name="name" placeholder ="Enter your Name" >
    <input type="email" name="email" placeholder= "Enter your Email_id">
    <input type="text" name="age" placeholder = "Enter your Age">
    <input type="text" name="gender" placeholder = "Enter your Gender">
    <input type="text" name="phone" placeholder= "Enter your Phone Number">
    <textarea name="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
    <button type="submit" name="submit" class="btn">Submit</button>
</div>
</form>   
</body>
</html>