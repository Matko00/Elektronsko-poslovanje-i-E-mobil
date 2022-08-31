<?php 
$root = 'http://'.getenv('HTTP_HOST').'/Examples/Elektronsko%20poslovanje%20ispit';

if(strpos($_SERVER['PHP_SELF'],basename(__FILE__))){
    header("Location:$root");
}
$admin = false;
if(isset($_SESSION['user_type']) &&  $_SESSION['user_type'] == 1){
    $admin = true;
}

if(isset($_SESSION['id_user']))
{
   echo '<script> sessionStorage.setItem("id", "' .$_SESSION['id_user'] .'");</script>';
}

?>
<div class="cover">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-md-end">
                <div class="reg">
                    <?php
                        if($loggedIn){
                            $adminPage= "$root/register/logout.php"; 
                            echo "
                            <a href='$adminPage'>Log Out</a>
                            ";
                        }else{
                            $registerPage= "$root/register/"; 
                            echo "
                            <a href='$registerPage' class='mr-2 mb-0'>Sign-Up | Log In</a>
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="header">
<div class="menu-bar">
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $root.'/home'; ?>">
        <h2 class="navbar-brand" >REAL ESTATE</h2>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-fill justify-content-end align-items-center">
                <li class="nav-item">
                    <a href="<?php echo $root.'/home'; ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $root.'/'; ?>"class="nav-link">Estates</a>
                </li>
                <?php
                    if($loggedIn){
                        $profilePage= "$root/profile/"; 
                        $chatPage= "$root/chat/"; 
                        echo "
                        <li class='nav-item'>
                            <a href='$profilePage'class='nav-link'>Profile</a>
                        </li>
                                                <li class='nav-item'>
                            <a href='$chatPage'class='nav-link'>Chat <span class='notification'>0</span></a>
                        </li>
                        ";

                    }
                    if($admin){
                        $adminPage= "$root/admin/"; 
                        echo "
                        <li class='nav-item'>
                            <a href='$adminPage'class='nav-link'>Admin</a>
                        </li>
                        ";
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
</div>
</section>