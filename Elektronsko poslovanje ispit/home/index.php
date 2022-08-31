<?php
session_start();
require "../mvc/view.php";

$ads = new View();


$admin = false;
$loggedIn = false;

if(isset($_SESSION['user_type']) &&  $_SESSION['user_type'] == 1){
    $admin = true;
}

if (isset($_SESSION['user_type']) &&  $_SESSION['user_type'] >= 1)
{
    $loggedIn = true;
}

?>
<!doctype html>
<html lang="en">

<?php include("../components/head.php") ?>

<body>

<section>
   <?php include("../components/navbar.php") ?>
</section>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner asd">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/p6.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/p7.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/p5.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container" style="margin-top: 50px; margin-bottom:50px;">
        <div class="section-title">
            <h2 class="text-center btn-get-started" style="margin-top: 50px;">ABOUT US</h2>
            <hr>
        </div>
        <div class="section-title">
            <p style="text-align: justify;">Helping your clients buy or sell a home is a time-consuming process, 
               and writing a real estate listing description is just one tiny part of the
               process. Between showings, inspections, closings, and all the other tasks that need to get done, time is a limited resource. Writing newsletters and engaging with your 
               network on social media may not even make it on the to-do list.
                <br><br>
               That’s where OutboundEngine can help. We craft content for your email marketing campaigns as well as your social 
               pages and automatically send and post to your network. By staying in touch with your past 
               and current customers, you uncover potential opportunities and build your valuable referral business.
               <br><br>
               And now that you’ve spent time writing compelling listings, how do you get more 
               eyeballs on them? We help you sell your clients’ homes faster and close more deals by integrating IDX listings into your website. It’s called Listings Pro, 
               and it’s now available for both existing and new OutboundEngine customers. For current customers, click here to set up a call with your Account Manager to add Listings Pro to your website. 
               If you’re new to OutboundEngine, schedule a free demo today to see how we can help your real estate business grow.
            </p>
        </div>
</div>

<?php include("../components/footer.php") ?>

</body>
</html>