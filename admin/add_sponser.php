<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add sponser</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="add_sponser.css" />
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
        $fetch = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `application` WHERE `appid` = $id"));
        if(isset($_POST['update'])){
            $var1 = $_POST['username'];
            $var2 = $_POST['email'];
            $var3 = $_POST['password'];
            $var4 = $_POST['type'];
           
            $run_update = mysqli_query($con , "UPDATE `application` SET 
            `name` = '$var1' , 
            `email` = '$var2',
            `password` = '$var3',
            `type` = '$var4'
           WHERE `appid` = $id");
            header("location:./application.php");
        }
    }

        if(isset($_POST['done'])){
          $name=mysqli_real_escape_string($con,$_POST['username']);
          $email=mysqli_real_escape_string($con,$_POST['email']);
          $password=mysqli_real_escape_string($con,$_POST['password']);
          $type=mysqli_real_escape_string($con,$_POST['type']);
           $q=mysqli_query($con,"INSERT INTO `application` VALUES (NULL,'$name','$email','$type','$password')");
           
            header("location:./application.php");
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
            <p class="links_name" onclick="location.href='application.php'">
              Applications
            </p>
          </a>
        </li>
        <li>
          <a href="reviews.php">
            <p class="links_name" onclick="location.href='reviews.php'">
              Reviews
            </p>
          </a>
        </li>
        <li>
          <a href="complain.php">
            <p class="links_name" onclick="location.href='complain.php'">
              Complaints
            </p>
          </a>
        </li>
        <li>
          <a href="payment.php">
            <p class="links_name" onclick="location.href='payment.php'">
              Payments
            </p>
          </a>
        </li>
        <hr />
        <li>
          <a href="../login.php">
            <p class="links_name">logout</p>
          </a>
        </li>
      </ul>
    </div>
    
    <div class="admin-view">
      <div class="content-right">
        <form method="post">
          <label for="">name</label>
          <input
            type="text"
            name="username"
            value="<?php if($update)echo $fetch['name'] ?>"
            placeholder="Enter name" />
          <label for="">Email</label>
          <input
            type="text"
            name="email"
            value="<?php if($update)echo $fetch['email'] ?>"
            placeholder="Enter Email" />

          <label for="">Password</label>
          <input
            type="password"
            name="password"
            value="<?php if($update)echo $fetch['password'] ?>"
            placeholder="Enter password" />
          <label for="">Type</label>
          <input
            type="text"
            name="type"
            value="<?php if($update)echo $fetch['type'] ?>"
            placeholder="Enter type" />

          <?php if($update){ ?>
          <button type="update" name="update" class="b1">update</button>
          <?php } else { ?>
          <button type="submit" name="done" class="b2">Add</button>
          <?php } ?>
        </form>
      </div>
    </div>
  </body>
</html>
