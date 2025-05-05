<?php
session_start();
require 'connection.php';
require 'function.php';

// Check if logout message is set
if (isset($_SESSION['logout_message'])) {
    // Display alert message
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['logout_message'] . '</div>';
    
    // Unset the session variable to remove the message after displaying it
    unset($_SESSION['logout_message']);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Homepage</title>
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
</head>
<!-- body -->

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
  </div>
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header-top">
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
     <section class="slider_section">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">  
          <div class="carousel-item active">

            <div class="container">
              <div class="carousel-caption">
                <div class="row">
                  <div class="col-md-12">
                    <div class="text-bg">
                      <span>Welcome to</span>
                      <h1>MUSIC SOCIETY</h1>
                      <p>"Welcome to our Music SOCIETY, your gateway to the world of live music! Explore upcoming concerts, festivals, and gigs from your favorite artists and discover new talents. From rock to pop, jazz to classical, find the perfect show to suit your taste. Book tickets, check out venue details, and get ready to experience the magic of live performances. Start your musical journey with us today!"</p>
                      <a href="#">Buy Tickets </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">

            <div class="container ">
              <div class="carousel-caption">

                <div class="row">
                  <div class="col-md-12">
                    <div class="text-bg">
                        <span>The Best</span>
                      <h1>MUSIC BAND EVER</h1>
                      <p>
                        "Meet HYBS, Thailand's dynamic band blending traditional sounds with modern flair. Experience their captivating performances, where each note resonates with the vibrant essence of Thai music!"</p>
                      <a href="#">Buy Tickets </a>
                    </div>
                  </div>  

                </div>
              </div>
            </div>

          </div>


          <div class="carousel-item">

            <div class="container">
              <div class="carousel-caption ">
                <div class="row">
                  <div class="col-md-12">
                    <div class="text-bg">
                        <span>The Best</span>
                      <h1>MUSIC BAND EVER</h1>
                      <p>"Meet HYBS, Thailand's dynamic band blending traditional sounds with modern flair. Experience their captivating performances, where each note resonates with the vibrant essence of Thai music!"</p>
                      <a href="#">Buy Tickets </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
     
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
      
    </a>
   </div>
    
  

</section>
</div>
</header>



<!-- about  -->

<!-- end abouts -->




<!-- upcoming -->
<div id="upcoming" class="upcoming">
  <div class="container-fluid padding_left3">
    <div class="row display_boxflex">
      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
       <div class="box_text">
          <div class="titlepage">
            <h2>Current Concerts</h2>
          </div>
          <p>"Discover HYBS, the sensational band from Thailand, celebrated for blending traditional Thai melodies with contemporary rhythms. With each performance, HYBS creates an immersive musical journey that transcends boundaries. Their dynamic stage presence and infectious energy promise to enchant and inspire audiences. Embark on a captivating exploration of Thailand's music scene with HYBS, where tradition and innovation harmonize in an unforgettable experience."</p>
          <a href="purchase.php">Buy Now</a>
        </div>
      </div> 
    
      <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 border_right">
         <div class="upcomimg">
           <figure><img src="images/hybs2.jpg" alt="#"/></figure>
        </div>
          </div>
  </div>
    </div>
</div>
<!-- end upcoming -->

<!-- Gallery -->


<div id="gallery" class="Gallery">
  <div class="container"> 
    <div class="row display_boxflex">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 margi_bott">
            <div class="Gallery_img">
              <figure><img src="images/gallery1.jpg" alt="#"/></figure>
            </div>
            <div class="hover_box">
             
              <ul class="icon_hu">
                 <h3>HYBS</h3>
                <li><a href="concert-details-user.php"><img src="icon/h.png" alt="#"/></a></li>
                 <li><a href="concert-details-user.php"><img src="icon/h.png" alt="#"/></a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 margi_bott">
            <div class="Gallery_img">
              <figure><img src="images/JayChou.jpg" alt="#"/></figure>
            </div>
            <div class="hover_box">
             
              <ul class="icon_hu">
                 <h3>Jay Chou</h3>
                <li><a href="concert-details-user.php"><img src="icon/h.png" alt="#"/></a></li>
                 <li><a href="concert-details-user.php"><img src="icon/h.png" alt="#"/></a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 margi_bott1">
            <div class="Gallery_img">
              <figure><img src="images/Taylor.jpg" alt="#"/></figure>
            </div>
            <div class="hover_box">
             
              <ul class="icon_hu">
                 <h3>Taylor Swift</h3>
                <li><a href="concert-details-user.php"><img src="icon/h.png" alt="#"/></a></li>
                 <li><a href="concert-details-user.php"><img src="icon/h.png" alt="#"/></a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="Gallery_img">
              <figure><img src="images/Gallery4.jpg" alt="#"/></figure>
            </div>
            <div class="hover_box">
             
              <ul class="icon_hu">
                 <h3>Greenland</h3>
                <li><a href="concert-details-user.php"><img src="icon/h.png" alt="#"/></a></li>
                 <li><a href="concert-details-user.php"><img src="icon/h.png" alt="#"/></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="Gallery_text">
          <div class="titlepage">
            <h2>Upcoming Concerts</h2>
          </div>
          <p>
"Get ready for an exhilarating musical experience at our upcoming concert! Featuring a diverse lineup of talented artists, this event promises to deliver an unforgettable night of live music and entertainment. From soulful melodies to electrifying beats, there's something for every music lover to enjoy. Stay tuned for updates and be sure to secure your tickets early for what's sure to be an incredible concert experience!"</p>
          <a href="concerts.php">Read More</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- end Gallery --> 




    <!--  footer -->
    <footer>
      <div class="footer ">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <form class="contact_bg">
            <div class="row">
              <div class="col-md-12">
                <div class="titlepage">
                  <h2>Contact us</h2>
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Name" type="text" name="Your Name">
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Email" type="text" name="Your Email">
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Phone" type="text" name="Your Phone">
                </div>
                <div class="col-md-12">
                  <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <button class="send">Send</button>  
                </div>
              </div>
            </div>
            </form>

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