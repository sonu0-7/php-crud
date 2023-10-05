<?php
  session_start();
  include"connection.php";

  if (isset($_POST['submit'])) {
      $uname = $_POST['username'];
      $fname = $_POST['firstname'];
      $addr = $_POST['address'];
      $gender = $_POST['gender'];
      $country = $_POST['country'];

      $hobbies = implode(",", $_POST['hobbies']);

      if($uname !="" && $fname!="" && $addr!=""){
        $quary = "INSERT INTO `userinfo`(`username`, `firstname`, `address`, `gender`, `country`, `hobbies`) 
        VALUES ('$uname','$fname','$addr','$gender','$country','$hobbies')";
        $data=mysqli_query($con,$quary);

        if ($data) {
          header('location: user.php');
        } else {
          echo 'failed';
        }

      } else {
        echo 'first fill all of the field';
      }
      
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  
</head>
<body>
<h1 class="text-center">Add User</h1>
  <div class="container col-6">
    <form action="" method="post">
      <div class="form-group">
        <label for="name" class="form-label">Username: </label>
        <input type="text" name="username"  class="form-control" placeholder="Enter Username" required>
      </div>
    
      <div class="form-group">
        <label for="firstname" class="form-label">Firstname: </label>
        <input type="text" name="firstname"  class="form-control" placeholder="Enter the Firstname" required>
      </div>    
      
      <div class="form-group">
        <label for="address" class="form-label">Address: </label>
        <textarea name="address" cols="84" rows="5" placeholder="Enter the address here.."></textarea>
      </div>    
      
      <div class="form-group">
        <label for="gender" class="form-label">Gender: </label>
        <input type="radio" id="male" name="gender" value="male">
          <label for="female">Male</label>
          <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
      </div>    

      <div class="form-group">
        <label for="country" class="form-level">Country: </label>
        <select name="country" id="" class="form-control">
          <option value="" selected>Select the country</option>
          <option value="country1">Country1</option>
          <option value="Country2">Country2</option>
          <option value="Country3">Country3</option>
          <option value="Country4">Country4</option>
          <option value="Country5">Country5</option>
        </select>
      </div>

      <div class="form-group">
        <label for="hobbies" class="form-label" name="hobbies[]">Hobbies: </label>
        <input type="checkbox" name="hobbies[]" value="cricket">Cricket
        <input type="checkbox" name="hobbies[]" value="chess">Chess
        <input type="checkbox" name="hobbies[]" value="football">Football
        <input type="checkbox" name="hobbies[]" value="music">Music
      </div><br><br>

      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success" value="submit">
      </div>

    </form> 
  </div>
</body>
</html>