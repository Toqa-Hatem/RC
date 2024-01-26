<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add card</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="add_card.css" />
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
        $fetch = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `card details`  WHERE `card_id` = $id"));
        if(isset($_POST['update'])){
            $var1 = $_POST['username'];
            $var2 = $_POST['expiredate'];
            
          
            $run_update = mysqli_query($con , "UPDATE `card details` SET 
            `card_number` = '$var1' , 
            `expiration_date` = '$var2',
             WHERE `card_id` = $id  ");
            header("location:./add_card.php");
        }
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <div class="sidebar">
      <div class="logo">
        <p>R<span>C</span></p>
      </div>
      <ul class="navs">
        <li>
          <a href="user.php#" class="active">
            <p class="links_name" onclick="location.href='user.php'" >Users</p>
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
            <p class="links_name">logout</p>
          </a>
        </li>
      </ul>
    </div>
    <div class="admin-view">
      <div class="content-right">
        <form method="post">
          <label for="">Card number</label>
          <input
            type="text"
            name="username"
            value="<?php if($update)echo $fetch['card_number'] ?>"
            placeholder="Enter card  number" />

          <label for="">ExpireDate</label>
          <input
            type="date"
            name="expiredate"
            value="<?php if($update)echo $fetch['expiration_date'] ?>" />

          <label for="">Method</label>
          <input
            type="text"
            name="method"
            value="<?php if($update)echo $fetch['method'] ?>" />

          

          <label for="">CCV</label>
          <input
            type="password"
            name="CCV"
        
            placeholder="Enter CCV" />

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
