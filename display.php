<?php 
session_start();
include "connection.php";
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

<?php 
  if(isset($_SESSION['flash_message'])){
    $message= $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
    echo $message;
  }
?>
  
  <div class="container">
        <button class="btn btn-primary my-5"><a href="" class="text-light">Add User</a>
    </div>
<table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Sr No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact_No</th>
      <th scope="col">Gender</th>
      <th scope="col">Qualification</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT * FROM student";
      $data = mysqli_query($con,$sql);
      if($data)
      {
        $sno=0;
        while ($row = mysqli_fetch_assoc($data))
        {
          $srn++;
          $sr_no=$srn;
          $name=$row['name'];
          $email=$row['email'];
          $contact_no=$row['contact_no'];
          $gender=$row['gender'];
          $qualification=$row['qualification'];
          $address=$row['address'];
          echo'<tr>
          <th scope="row">'.$sr_no.'</th>
          <td>'.$name.'</td>
          <td>'.$email.'</td>
          <td>'.$contact_no.'</td>
          <td>'.$gender.'</td>
          <td>'.$qualification.'</td>
          <td>'.$address.'</td>
          <td>
            <button class="btn btn-primary"><a href="update.php? updateid='.$row['id'].'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="delete.php? deleteid='.$row['id'].'" class="text-light">Delete</a></button>
          </td>
          </tr>';
        }
      }
    ?>
  
    </tbody> 
</table>
</body>
</html>