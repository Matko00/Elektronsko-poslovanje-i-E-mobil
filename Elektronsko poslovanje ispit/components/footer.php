<?php
$root = 'http://'.getenv('HTTP_HOST').'/Examples/Elektronsko%20poslovanje%20ispit';

if(strpos($_SERVER['PHP_SELF'],basename(__FILE__))){
    header("Location:$root");
}
?>

<footer class="footer" style="width: 100%; height:100px; background:#d1d1d1; text-align:center; color:#fff; margin-top:30px; padding-top:30px; bottom:10px;">
    <a href="#" style="font-size: 23px; color:#fff; text-decoration:none">REAL ESTATE</a>
    <br>
    <small>realestate@email.com</small>
</footer> 