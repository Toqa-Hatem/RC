<!DOCTYPE html>
<html>
    <html lang="en">
        <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>complain</title>
              <link rel="stylesheet" type="text/css" href="complain.css">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
              integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
              crossorigin="anonymous" referrerpolicy="no-referrer" />
            </head>
  
       
<?php
include('../connection.php');

if(isset($_GET['accept'])){
  $rid=$_GET['accept'];
  $q=mysqli_query($con,"UPDATE `complaints` SET `status`='accept' WHERE `complaint_id`=$rid");
  $query=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `complaints` WHERE `complaint_id`=$rid"));
  $var1=date("Y/m/d");
  $var2=date('Y/m/d',strtotime('+30 days'));
  $var3=$query['user_id'];
  $var4=$query['complaint_id'];
  $var5="5";
  $sql=mysqli_query($con,"INSERT INTO `elcpoint` VALUES(NULL,'$var5','$var3',NULL,NULL,'$var4','$var1','$var2')");
  
}
if(isset($_GET['reject'])){
  $cid=$_GET['reject'];
  $q=mysqli_query($con,"UPDATE `complaints` SET `status`='reject' WHERE `complaint_id`=$cid");
}
?>
<body>
 <div class="sidebar">
      <div class="logo">
        <p>R<span>C</span></p>
      </div>
      <ul class="navs">
        <li>
          <a href="user.php" class="active">
            <p class="links_name"  onclick="location.href='user.php'" >Users</p>
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
            <p class="links_name"onclick="location.href='complain.php'">Complaints</p>
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

    
    <div class="total">
       <h2 class="n_users"> Welcome Admin</h2>
        <img src="total.png" class="img_total" alt="">
    </div>
     
    <input type="search "class="srh" placeholder="search" >
    <img src="search.png" alt="" class="search">

   

    <div class="table">
        <h2> Complaints Information</h2>
      
    
        <table  class="table_details">
            <thead>
              <tr>
               
                <th>User Name</th>
                <th>User Email</th>
                <th>App Name</th>
                <th>serial no</th>
                <th>complain</th>
                
              </tr>
            </thead>
          
            <tbody>
              <?php
              
               $q=mysqli_query($con,"SELECT * FROM `complaints` LEFT JOIN user USING (`user_id`) WHERE `complaints`.`status` = 'pending'");
              foreach($q as $data){
                ?>

              
              <tr>
                
                <td><?php echo $data['username']?></td>
                <td><?php echo $data['email']?></td>
                <td><?php echo $data['company_name']?></td>
                <td><?php echo $data['serial_number']?></td>
                <td><?php echo $data['comment']?></td>
                <td><a class="edit" id="b1" href="complain.php?accept=<?php echo $data ['complaint_id']?>" >accept</a></td>
                <td><a class="edit" id="b2" href="complain.php?reject=<?php echo $data ['complaint_id']?>">reject</a></td>

              </tr>
              <?php } ?>
              
          
            </tbody>
          </table>

    </div>
   
    </html>