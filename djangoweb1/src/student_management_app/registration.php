<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body  style="background-color:grey;">
  <form action="registration.php" method="post" align="center" enctype="multipart/form-data">
    Name: <input type="text" name="name" value="" required="required" x-webkit-speech="x-webkit-speech"><br><br>
    Email: <input type="email" name="email" value="" required="required" x-webkit-speech><br><br>
    Password: <input type="password" name="password" value="" required="required"><br><br>
    Confirm Password: <input type="password" name="repassword" value="" required="required"><br><br>
    Address: <textarea name="address" rows="4" cols="30"></textarea><br><br>
    Gender:<input type="radio" name="gender" value="male">Male</input>
           <input type="radio" name="gender" value="female">Female</input><br><br><br>
    Branch:<select name="branch" required="required">
              <option>CMPN</option>
              <option>INFT</option>
              <option>EXTC</option>
              <option>ETRX</option>
              <option>CIVIL</option>
              <option>MECHANICAL</option>
              <option>BIOMEDICAL</option>
            </select><br><br>
   BirthDate: <input type="date" name="birthdate" value="" required="required"><br><br>
   Declaration:<input type="file" name="image" value="UPLOAD"><br><br><br>
   <input type="submit" name="register" value="REGISTER">
  </form>
  <script type="text/javascript">
  if (document.createElement("input").webkitSpeech === undefined) {
    alert("Speech input is not supported in your browser.");
  }
  </script>

  <?php
    if(isset($_POST['register'])){

      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $repassword = $_POST['repassword'];
      $address = $_POST['address'];
      $gender = $_POST['gender'];
      $branch = $_POST['branch'];
      $birthdate = $_POST['birthdate'];

      $image = $_FILES['image']['name'];
      $image_tmp = $_FILES['image']['tmp_name'];
      move_uploaded_file($image_tmp,"images/$image");

      if($gender =="" or $address== ""){
        echo "<script>alert('Please fill out all fields')</script>";
      }
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Please enter valid Email ID')</script>";
      }
      if(strlen($password)<8 or strlen($repassword)<8){
        echo "<script>alert('Password should be atleast 8 characters')</script>";
      }
      if($password != $repassword){
        echo "<script>alert('Incorrect Password')</script>";
      }

    }
   ?>
















  </body>
</html>
