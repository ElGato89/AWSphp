
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- site metas -->
        <title>Entro</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- fevicon -->
        <link rel="icon" href="images/fevicon.png" type="image/gif" />
        <!-- bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Responsive-->
        <link rel="stylesheet" href="css/responsive.css">  
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
        <!-- Tweaks for older IEs-->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
<style>
    table{
        margin-top: 20px;
        width: 90%;
        margin-left: 5px;
        height: 400px;
    }
    button{
        align-items: center;
        transition: ease-in;
    }
    button:hover{
        background-color: buttonshadow;
        transition: ease-in(0.6s);
        
    }
    table tr th td a{
        text-decoration: none;
        background-color: red;
    }
</style>
    </head>
    <body class="main-layout contineer_page">
        <?php
        //require_once './database/concert schedule.php';
        ?>
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
  </div>
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
   
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="index.html"><img src="images/logo1.jpg" alt="#" /></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9">
              
               <div class="menu-area">
                <div class="limit-box">
                  <nav class="main-menu ">
                    <ul class="menu-area-main">
                      <li class="active"> <a href="index.php">Home</a> </li> 
                      <li> <a href="concerts.php">Concerts</a> </li>
                      <li> <a href="schedule-user.php">Schedules</a></li>
                      <?php 
                      if(isset($_SESSION["user_id"])){

                          echo "<li ><a href='profile.php'>Profile</a> </li>";
                          echo "<li  > <a href='logout_member.php'>Log Out</a> </li>";
                      }else{
                          echo "<li ><a href='login_member.php'>Login</a> </li>";
                      }
                        ?>
                      </li>
                      
                     </ul>
                   </nav>
                
               </div> 
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- end header inner -->

     <!-- end header -->
    
</header>



<!-- upcoming -->

<?php
// Include the database connection script
include 'db_connect.php';

// SQL query to retrieve payment history data
$sql = "SELECT * FROM payment_history";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Customer Name: " . $row["custName"]. "<br>";
        echo "Card Number: " . $row["cardNo"]. "<br>";
        echo "Expiry Date: " . $row["expDate"]. "<br>";
        echo "CVC Number: " . $row["cvcNo"]. "<br>";
        echo "Concert Name: " . $row["concert_name"]. "<br>";
        echo "Concert Date: " . $row["concert_date"]. "<br>";
        echo "Concert Time: " . $row["concert_time"]. "<br>";
        echo "Concert Venue: " . $row["concert_venue"]. "<br>";
        echo "Price per Ticket: " . $row["concert_price"]. "<br>";
        echo "Quantity: " . $row["quantity"]. "<br>";
        echo "Total Price: " . $row["total_price"]. "<br>";
        echo "Created At: " . $row["created_at"]. "<br>";
        echo "<hr>";
    }
} else {
    echo "No payment history found.";
}

// Close the database connection
$conn->close();
?>

<h2>Payment History</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Card Number</th>
            <th>Expiry Date</th>
            <th>CVC Number</th>
            <th>Concert Name</th>
            <th>Concert Date</th>
            <th>Concert Time</th>
            <th>Concert Venue</th>
            <th>Price per Ticket</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Created At</th>
        </tr>
        
    </table>
    

<!-- end upcoming -->



<!-- end Gallery --> 




    <!--  footer -->
    <footer>
      <div class="footer ">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              

            </div>
            <div class="col-md-12 border_top">
              <form class="news">
               <h3>Newsletter</h3>
                <input class="newslatter" placeholder="ENTER YOUR MAIL" type="text" name=" ENTER YOUR MAIL">
                <button class="submit">Subscribe</button>
              </form>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                  <div class="address">
                    <ul class="loca">
                      <li>
                        <a href="#"><img src="icon/loc.png" alt="#" /></a>Locations
                   
                        <li>
                          
                            <a href="#"><img src="icon/call.png" alt="#" /></a>+12586954775 </li>
                          <li>
                            <a href="#"><img src="icon/email.png" alt="#" /></a>demo@gmail.com </li>
                          </ul>
                         

                        </div>
                      </div>
                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                           <ul class="social_link">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                          </ul>
                       </div>
                    </div>
                  </div>

                </div>

              </div>
               <div class="container">
              </div>
            </div>
          </footer>
          <!-- end footer -->
          <!-- Javascript files-->
          <script src="js/jquery.min.js"></script>
          <script src="js/popper.min.js"></script>
          <script src="js/bootstrap.bundle.min.js"></script>
          <script src="js/jquery-3.0.0.min.js"></script>
          <script src="js/plugin.js"></script>
          <!-- sidebar -->  
          <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
          <script src="js/custom.js"></script>
          <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>




</body>
</html>
