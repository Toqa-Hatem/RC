<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New User</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="add_user.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
  </head>
  <body>
    <?php include("../connection.php"); 
    $update = FALSE; 
    if(isset($_GET['update'])){
        $update = TRUE;
        $id = $_GET['update'];
        $fetch = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `user` WHERE `user_id` = $id"));
        if(isset($_POST['update'])){
            $var1 = $_POST['username'];
            $var2 = $_POST['email'];
            $var3 = $_POST['birthdate'];
            $var4 = $_POST['phone'];
            $var5 = $_POST['city'];
            $var6 = $_POST['address'];
            $run_update = mysqli_query($con , "UPDATE `user` SET 
            `username` = '$var1' , 
            `email` = '$var2',
            `birthdate` = '$var3',
            `city` = '$var5',
            `Address` = '$var6',
            `phone` = '$var4' WHERE `user_id` = $id  ");
            header("location:./user.php");
        }
    }
    
    ?>
    <div class="sidebar">
      <div class="logo">
        <p>R<span>C</span></p>
      </div>
      <ul class="navs">
        <li>
          <a href="user.php" class="active">
            <p class="links_name" onclick="location.href='user.php'">Users</p>
          </a>
        </li>
        <li>
          <a href="application.php">
            <p class="links_name" onclick="location.href='application.php'">Applications</p>
          </a>
        </li>
        <li>
          <a href="reviews.php">
            <p class="links_name" onclick="location.href='reviews.php'">Reviews</p>
          </a>
        </li>
        <li>
          <a href="complain.php">
            <p class="links_name" onclick="location.href='complain.php'">Complaints</p>
          </a>
        </li>
        <li>
          <a href="payment.php">
            <p class="links_name" onclick="location.href='payment.php'">Payments</p>
          </a>
        </li>
        <hr />
        <li>
          <a href="../login.php">
            <p class="links_name" >logout</p>
          </a>
        </li>
      </ul>
    </div>
    <div class="admin-view">
      <div class="content-right">
        <form method="post">
          <label for="">Username</label>
          <input
            type="text"
            name="username"
            value="<?php if($update)echo $fetch['username'] ?>"
            placeholder="Enter username" />
          <label for="">Email</label>
          <input
            type="text"
            name="email"
            value="<?php if($update)echo $fetch['email'] ?>"
            placeholder="Enter Email" />
          
          <label for="">Birthdate</label>
          <input
            type="date"
            name="birthdate"
            value="<?php if($update)echo $fetch['birthdate'] ?>" />
         
          <label for="">Phone</label>
          <input
            type="text"
            name="phone"
            value="<?php if($update)echo $fetch['phone'] ?>"
            placeholder="Enter Phone" />
          <label for="">City</label>
          <input
            type="text"
            name="city"
            value="<?php if($update)echo $fetch['city'] ?>"
            placeholder="Enter city" />
          <label for="">Address</label>
          <input
            type="text"
            name="address"
            value="<?php if($update)echo $fetch['Address'] ?>"
            placeholder="Enter address" />
          <?php if($update){ ?>
          <button type="update" name="update" class="b1">update</button>
          <?php } else { ?>
          <button type="submit" name="done" class="b1">Add</button>
          <?php } ?>
        </form>
      </div>
    </div>
  </body>
</html>
