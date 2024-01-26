<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <title>Manager Users</title>
  </head>
  <body>
    <!-- BACKEND START -->
    <?php include("../connection.php"); ?>

    <?php $select = mysqli_query($con , "SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),`birthdate`)), '%Y') 
 + 0 AS age , `user`.* FROM `user` order by `status` desc");
          $number = mysqli_num_rows($select);
          if(isset($_GET['block'])){
            $id = $_GET['block'];
            $run_block = mysqli_query($con , "UPDATE `user` SET `status` = 'blocked' WHERE `user_id` = $id");
            header("location:./user.php");
          }
          if(isset($_GET['unblock'])){
            $id = $_GET['unblock'];
            $stat = "normal";
            $check_premium  = mysqli_num_rows(mysqli_query($con , "SELECT `user_id` FROM `card details` WHERE `user_id` = $id"));
            if($check_premium != 0){
              $stat = "premium";
            }
            $run_unblock = mysqli_query($con , "UPDATE `user` SET `status` = '$stat' WHERE `user_id` = $id");
            header("location:./user.php");
          }
      ?>
    <!-- BACKEND END -->

    <div class="admin-view">
      <?php include("./sidebar.html"); ?>
      <div class="content-right">
        <div class="top-section">
          <div class="total">
            <h2>Total Users</h2>
            <h2 class="n_users"><?php echo $number ?></h2>
            <img src="total.png" class="img_total" alt="" />
          </div>
          <div class="total">
            <input type="search " class="srh" placeholder="search" />
            <img src="search.png" alt="" class="search" />
          </div>
        </div>
        <div class="table">
          <h2>Users Information</h2>

          <div class="table-responsive">
            <table class="table_details">
              <thead>
                <tr>
                  <th>First name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Age</th>
                  <th>City</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($select AS $value){ ?>
                <tr>
                  <td><?php echo $value['username'] ?></td>
                  <td><?php echo $value['email'] ?></td>
                  <td><?php echo $value['phone'] ?></td>
                  <td><?php echo $value['age'] ?></td>
                  <td><?php echo $value['city'] ?></td>
                  <td><?php echo $value['Address'] ?></td>
                  <td><?php echo $value['status'] ?></td>
                  <td>
                    <a
                      href="./add_user.php?update=<?php echo $value['user_id'] ?>"
                      class="edit"
                      >Update</a
                    >
                    <?php if($value['status'] != "blocked"){ ?>
                    <a
                      href="./user.php?block=<?php echo $value['user_id'] ?>"
                      class="edit1"
                      >block</a
                    >
                    <?php } else { ?>
                    <a
                      href="./user.php?unblock=<?php echo $value['user_id'] ?>"
                      class="edit2"
                      >Unblock</a
                    >
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
