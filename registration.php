<?php
  session_start();
  include 'connection.php';

  // define variables and set to empty values
  $fnameErr = $lnameErr = $emailErr = $standardErr = $genderErr = $imgErr = $passErr = $cpassErr= "";
  $fname = $lname = $eml = $quali = $gender = $fileName = $pass = $cpas = "";

  if(isset($_POST['submit'])){

    if (empty($_POST["firstname"])) {
      $fnameErr = "*Firstname is required";
    } else {
      $fname = $_POST["firstname"];
    }

    if (empty($_POST["lastname"])) {
      $lnameErr = "*Lastname is required";
    } else {
      $lname = $_POST["lastname"];
    }

    if (empty($_POST["email"])) {
      $emailErr = "*Email is required";
    } else {
      $eml = $_POST["email"];
    }

    if (empty($_POST["standard"])) {
      $standardErr = "*Qualification is required";
    } else {
      $quali = $_POST["standard"];
    }

    $add = $_POST['address'];

    if (empty($_POST["gender"])) {
      $genderErr = "*Gender is required";
    } else {
      $gender = $_POST["gender"];
    }

    if(!empty($_POST['hobbies'])){
      $hobbies = implode(',',$_POST['hobbies']);
    }

    if (empty($_POST["password"])) {
      $passErr = "*Password is required";
    } else {
      $pass = $_POST["password"];
      $encpass = md5($pass);
    }

    if (empty($_POST["confirmPassword"])) {
      $cpassErr = "*Confirm password is required";
    } else {
      $cpas = $_POST["confirmPassword"];
      $cpass = md5($cpas);
    }

    if (empty($_FILES['image']['name'])) {
      $imgErr = "*Image is required";
    } else {
      $fileName = $_FILES['image']['name'];
      $fileTmpName = $_FILES['image']['tmp_name'];
      $fileSize = $_FILES['image']['size'];
      $fileError = $_FILES['image']['error'];
      $fileType = $_FILES['image']['type'];
    }

    // $fname = $_POST['firstname'];
    // $lname = $_POST['lastname'];
    // $eml = $_POST['email'];
    // $quali = $_POST['standard'];
    // $add = $_POST['address'];
    // $gender = $_POST['gender'];

    // if(!empty($_POST['hobbies'])){
    //   $hobbies = implode(',',$_POST['hobbies']);
    // }

    // $pass = $_POST['password'];
    // $encpass = md5($pass);
    // $cpas = $_POST['confirmPassword'];
    // $cpass = md5($cpas);

    // if($encpass===$cpass) {
      // $fileName = $_FILES['image']['name'];
      // $fileTmpName = $_FILES['image']['tmp_name'];
      // $fileSize = $_FILES['image']['size'];
      // $fileError = $_FILES['image']['error'];
      // $fileType = $_FILES['image']['type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'png', 'jpeg', 'pdf');

      if(in_array($fileActualExt, $allowed)) {
        if($fileError===0)  {
          if($fileSize<=2000000) {
            $fileDestination = 'upload';
            if(move_uploaded_file($fileTmpName, $fileDestination .'/' . $fileName)) {
              //  code here 
            //   $sql = "insert into `crud` (firstname, lastname, email, standard, address, gender, hobbies, image, password)
            //   values ('$fname', '$lname', '$eml', '$quali', '$add', '$gender', '$hobbies', '$fileName', '$encpass')";

            //   $result = mysqli_query($con, $sql);
            // // $last_id = mysqli_insert_id($con);
            // if($result){
            //   // echo 'Data inserted Successfully';
            //   $_SESSION['flash_message'] = "Data inserted Successfully.";
            //   header('location:login.php');
            //   } else {
            //   // echo 'Record has not stored successfully.';
            //   $_SESSION['flash_messages'] = "Record has not stored successfully.";
            //   }
            $_SESSION['flash_message'] = "Your file uploaded Successfully..";
            } 
            else {
              // echo 'file is not uploaded on the Destination.';
              $_SESSION['flash_messages'] = "file is not uploaded on the Destination.";
            }

          } else {
            // echo 'The file size is too big';
            $_SESSION['flash_messages'] = "The file size is too big.";
          }
        } else {
          echo 'There was an error during uploading this file.';
        }

      } else {
        // echo 'You cannot upload files of this type!';
        if(empty($fileName)) {
        $imgErr = "*Image is required";
      } else {
        $_SESSION['flash_messages'] = "You cannot upload files of this type!";
      }
    }
      if($encpass!=$cpass) {
      // echo 'password does not match';
      $_SESSION['flash_messages'] = "password does not match";
    }
    $sql = "insert into `crud` (firstname, lastname, email, standard, address, gender, hobbies, image, password)
      values ('$fname', '$lname', '$eml', '$quali', '$add', '$gender', '$hobbies', '$fileName', '$encpass')";

    $result = mysqli_query($con, $sql);
    // $last_id = mysqli_insert_id($con);
    if($result){
    // echo 'Data inserted Successfully';
    $_SESSION['flash_message'] = "Data inserted Successfully.";
    header('location:login.php');
    } else {
    // echo 'Record has not stored successfully.';
    $_SESSION['flash_messages'] = "Record has not stored successfully.";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" /> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
      form i {
        cursor: pointer;
      }

    </style>

</head>
<body>

<?php 
    if(isset($_SESSION['flash_messages'])){
    $message= $_SESSION['flash_messages'];
    unset($_SESSION['flash_message']);
    // echo $message;
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      '. $message .'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  } else {
    if(isset($_SESSION['flash_message'])) {
      $message= $_SESSION['flash_message'];
      unset($_SESSION['flash_message']);
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        '. $message .'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
  }
?>
    <div class="container my-5 ml-auto">
      <a href="login.php"><button class="btn btn-info float-left">Login</button></a>
    </div>
    <div class="container col-6 my-5">
    <center><h1><dfn><kbd>Registration Form</kbd></dfn></h1></center>
      <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="fname">First Name</label>
          <input type="text" class="form-control" name="firstname" placeholder="Enter the First Name" value="<?php if(isset($_POST['firstname'])) echo $fname;?>">
          <span class="error"> <?php if(isset($_POST['submit'])) echo '<p class="text-danger">'. $fnameErr . '<p>';?></span>
        </div>

        <div class="form-group">
          <label for="lname">Last Name</label>
          <input type="text" class="form-control" name="lastname" placeholder="Enter the Last Name" value="<?php if(isset($_POST['lastname'])) echo $lname;?>">
          <span class="error"> <?php if(isset($_POST['submit'])) echo '<p class="text-danger">' . $lnameErr .'<p>';?></span>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Enter the Email" value="<?php if(isset($_POST['email'])) echo $eml;?>">
          <span class="error"> <?php if(isset($_POST['submit'])) echo '<p class="text-danger">'. $emailErr .'<p>';?></span>
        </div>
        
        <div class="form-group">
          <label for="standard" class="form-level">Qualification: </label>
          <select name="standard" id="" class="form-control">
            <option value="">Select the Qualification</option>
            <option value="10" <?php if($quali=='10') echo 'selected';?> >10th Standard</option>
            <option value="12" <?php if($quali=='12') echo 'selected';?> >12th standard</option>
            <option value="B.Sc" <?php if($quali=='B.Sc') echo 'selected';?> >Bachelor's</option>
          </select>
          <span class="error"> <?php if(isset($_POST['submit'])) echo '<p class="text-danger">'. $standardErr .'<p>';?></span>
        </div>

        <div class="form-group">
        <label for="address" class="form-label">Address: </label>
        <textarea name="address" cols="83" rows="3" placeholder="Enter the address here.." value=""><?php if(isset($_POST['address'])) echo $add;?></textarea>
      </div>  

        <div class="form-group">
          <label for="gender">Gender: </label>
          Male <input type="radio" name="gender" value="M" <?php if (isset($_POST['gender']) && $_POST['gender'] === 'M') echo 'checked'; ?>>
          Female <input type="radio" name="gender" value="F" <?php if (isset($_POST['gender']) && $_POST['gender'] === 'F') echo 'checked'; ?>>
          Others <input type="radio" name="gender" value="T" <?php if (isset($_POST['gender']) && $_POST['gender'] === 'T') echo 'checked'; ?>>
          <span class="error"> <?php if(isset($_POST['submit'])) echo '<p class="text-danger">'. $genderErr .'<p>';?></span>
        </div>

        <div class="form-group">
          <label for="hobbies">Hobbies: </label>
          Cricket <input type="checkbox" name="hobbies[]" value="cricket" <?php if(isset($_POST['hobbies']) && in_array('cricket', $_POST['hobbies'])) echo 'checked'; ?>>
          Football <input type="checkbox" name="hobbies[]" value="football" <?php if(isset($_POST['hobbies']) && in_array('football', $_POST['hobbies'])) echo 'checked'; ?>>
          Song <input type="checkbox" name="hobbies[]" value="song" <?php if(isset($_POST['hobbies']) && in_array('song', $_POST['hobbies'])) echo 'checked'; ?>>
          Book <input type="checkbox" name="hobbies[]" value="book" <?php if(isset($_POST['hobbies']) && in_array('book', $_POST['hobbies'])) echo 'checked'; ?>>
        </div>

        <div class="form-group">
          <label for="formFileLg" class="form-label">Upload file</label>
          <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" <?php if (isset($_FILES['image']) &&  $_FILES['image']['name']) echo 'checked'; ?> />
          <span class="error"> <?php if(isset($_POST['submit'])) echo '<p class="text-danger">'. $imgErr. '<p>';?></span>
        </div>

        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="<?php if(isset($_POST['password'])) echo $pass;?>">
          <span class="error"> <?php if(isset($_POST['submit'])) echo '<p class="text-danger">'. $passErr . '<p>';?></span>

          <!-- <i class="bi bi-eye-slash" id="togglePassword"> -->
        </div>
        
        <div class="form-group">
          <label for="">Confirm Password</label>
          <input type="password" class="form-control" name="confirmPassword" placeholder="Enter Confirm Password" value="<?php if(isset($_POST['password'])) echo $cpas;?>">
          <span class="error"> <?php if(isset($_POST['submit'])) echo '<p class="text-danger">'. $cpassErr .'<p>';?></span>
        </div><br>
        
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
    </form>
    </div>
      


    <!-- <script>
        const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            this.classList.toggle('bi-eye');
        });
    </script> -->

</body>
</html>