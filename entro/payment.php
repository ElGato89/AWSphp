
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
                    <a href="index.php"><img src="images/logo1.jpg" alt="#" /></a>
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
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from $_POST array
    $concert_name = $_POST['concert_name'];
    $concert_date = $_POST['concert_date'];
    $concert_time = $_POST['concert_time'];
    $concert_venue = $_POST['concert_venue'];
    $concert_price = $_POST['concert_price'];
    $quantity = $_POST['quantity'];

    // Calculate total price
    $total_price = $concert_price * $quantity;

    // Now you can use these variables to display payment confirmation or process payment.
} else {
    // Handle case when form data is not submitted
    echo "Form data is not submitted.";
}
?>
<style>
    #qrPaymentBtn{
        border: 2px;
        border-color: black;
    }
    #cardPaymentBtn{
        border: 2px;
        border-color: black;
    }
</style>

<h2>Payment Confirmation</h2>
    <p>Concert Name: <?php echo $concert_name; ?></p>
    <p>Date: <?php echo $concert_date; ?></p>
    <p>Time: <?php echo $concert_time; ?></p>
    <p>Venue: <?php echo $concert_venue; ?></p>
    <p>Price per ticket: RM<?php echo $concert_price; ?></p>
    <p>Quantity: <?php echo $quantity; ?></p>
    <p>Total Price: RM<?php echo $total_price; ?></p>
    
    <button id="cardPaymentBtn">Card Payment</button>
    <div id="cardPaymentSection" style="display: none;">
        <form action="receipt.php" method="POST">
            <!-- Hidden fields to pass concert details -->
            <input type="hidden" name="concert_name" value="<?php echo $concert_name; ?>">
            <input type="hidden" name="concert_date" value="<?php echo $concert_date; ?>">
            <input type="hidden" name="concert_time" value="<?php echo $concert_time; ?>">
            <input type="hidden" name="concert_venue" value="<?php echo $concert_venue; ?>">
            <input type="hidden" name="concert_price" value="<?php echo $concert_price; ?>">
            <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
            <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
            
            <!-- User card payment details -->
            <label for="custName">Customer Name:</label>
            <input type="text" id="custName" name="custName" required><br>
            <label for="cardNo">Card Number:</label>
            <input type="text" id="cardNo" name="cardNo" required><br>
            <label for="expDate">Expiry Date:</label>
            <input type="text" id="expDate" name="expDate" required><br>
            <label for="cvcNo">CVC Number:</label>
            <input type="text" id="cvcNo" name="cvcNo" required><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#cardPaymentBtn").click(function(){
                $("#cardPaymentSection").slideToggle();
            });
        });
    </script>
    

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
