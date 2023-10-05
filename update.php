<?php
session_start();

include"connection.php";
$sr_no=$_GET['updateid'];


$sql = "SELECT * FROM `student` WHERE sr_no='$sr_no'";
$data = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($data);

$sr_no=$row['sr_no'];
$name=$row['name'];
 $email=$row['email'];
 $contact_no=$row['contact_no'];
 $gender=$row['gender'];
 $qualification=$row['qualification'];
 $address=$row['address'];
  // if($data){
  //   while ($row = mysqli_fetch_assoc($data)){


if (isset($_POST['submit'])) {
    
    $sr_no = $_POST['sr_no'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_no = $_POST['number'];
    $gender = $_POST['gender'];
    $qualification = $_POST['qualification'];
    $address = $_POST['address'];
    $quary = "UPDATE `student` SET sr_no='$sr_no',name='$name',email='$email'
    ,contact_no='$contact_no',gender='$gender',qualification='$qualification',address='$address' where sr_no=$sr_no";
    $data=mysqli_query($con,$quary);
    if ($data) {
      $_SESSION['flash_message'] = "updated successfully ";
  
      
      header('location:display.php');
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" rel="stylesheet">
 
</head>
<body>
<h1 class="text-center">Update form</h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="sr_no" class="form-label">Sr_No</label>
        <input type="text" name="sr_no" value="<?php echo $sr_no; ?>" class="form-control" placeholder="enter id" required>
      </div>

      <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input type="name" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="enter name" required>
      </div>
    
      <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email"  class="form-control" value="<?php echo $email; ?>"  placeholder="enter email" required>
      </div>    
      
      <div class="form-group">
        <label for="number" class="form-label">Contact No</label>
        <input type="number" name="number"  class="form-control" value="<?php echo $contact_no; ?>"  placeholder="enter number" required>
      </div>    
      
      <div class="form-group">
        <label for="gender" class="form-label">Gender:-</label><br>
        <input type="radio" id="male" name="gender" value="male"  <?php if($gender =='male'){echo 'checked';} ?> required>
          <label for="female">Male</label><br>
          <input type="radio" id="female" name="gender" value="female" <?php if($gender =='female'){echo 'checked';} ?> required>
            <label for="female">Female</label><br>
      </div>     
      
      <div class="form-group">
        <label for="qualification" class="form-label">Qualification</label>
        <input type="qualification" name="qualification" value="<?php echo $qualification; ?>"  class="form-control" placeholder="enter qualification" required>
      </div>   
      <div class="form-group">
        <label for="address" class="form-label">Address</label>
        <input type="address" name="address"  class="form-control" value="<?php echo $address; ?>"  placeholder="enter address" required>
      </div><br>   
        <button type="submit"  name="submit" class="btn btn-primary">Update</button>
         
    </form> 
  </div>
</body>
</html>