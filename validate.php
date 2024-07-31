<!DOCTYPE html>
<html>
    <head>
        <style>
            .error { color : #FF0000;}
        </style>
    </head>
<body>


<?php  

// define variables and set to empty

$nameErr = $emailErr = $genderErr = $WebsiteErr = "";
$name = $email = $gender = $comment = $subsite = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $nameErr = "Please enter a valid name";
    }
    else {
     $name = test_input($_POST["name"]);
     if(!preg_match("/^[a-zA-Z-']*$/",$name)) {
        $nameErr = "Only letters and white spaces allowed";
     }
   }
}

if(empty($_POST["email"])) {
    $emailErr = "Valid Email Address";
}
else {
    $email = test_input($_POST["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailErr = "The email address is incorrect";
   }
}

if(empty($_POST["website"])) {
    $website = "";
}
else {
    $website = test_input($_POST["website"]);
    if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
        $WebsiteErr = "Enter a valid website URL";
    }
}

if(empty($_POST["comment"])) {
    $comment = "";
}else{
    $comment = test_input($_POST["comment"]);
}

if(empty($_POST["gender"])) {
    $genderErr = "Please select a gender";
} else {
    $gender = test_input($_POST["gender"]);
}


function test_input ($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<h2> PHP Form Validation Example </h2>
<p> <span class="error">* required field </span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Full Name: <input type="text" name="name">
<Span class="error">* <?php echo $nameErr; ?></Span>
<br><br>

E-mail address: <input type="text" name="email">
<Span class="error">* <?php echo $emailErr; ?></Span>
<br><br>

Website: <input type="text" name="website">
<Span class="error">* <?php echo $WebsiteErr; ?></Span>
<br><br>

Comment: <textarea name="comment" rows="2" cols="10"></textarea>
<br><br>

Gender : 
           <input type="radio" name="gender" value="female">Female
           <input type="radio" name="gender" value="male">Male
           <!-- <Span class="error">* <?php echo $gender; ?></Span> -->
           <br><br>
    <input type="submit" name="submit" value="submit">

</form>

<?php
  echo "<h2> Your Input: </h2>";
  echo $name;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $website;
  echo "<br>";
  echo $comment;
  echo "<br>";
  echo $gender;

  ?>

</body>
</html>

