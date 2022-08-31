<?php
require_once '../register/functions_def.php';
require_once "../mvc/view.php";
require_once "../components/usersads.php";

session_start();
if (!isset($_SESSION['username']) OR !isset($_SESSION['id_user']) OR !is_int($_SESSION['id_user'])) {
    redirection('../index.php');
}
$loggedIn = true;

?>

<!doctype html>
<html lang="en">

    <?php include("../components/head.php") ?>

<body>

<section>
    <?php include("../components/navbar.php") ?>
</section>

<section>

    <div class="container p-0 mb-2" style='margin-top:30px; '>
        <div class="card" style="transform: none; box-shadow:none;">
            <div class="text-center fs-4 card-header" style='background-color:#ccc;'>
                <b style="text-transform: uppercase; color:#666;">Profile</b>
            </div>
            <div class="card-body">
                <?php
    
                $view = new View();
                $data = $view->getUserData();
                for ($i = 0;$i < sizeof($data);$i++)
                {
                    $value = $data[$i];
                    echo "
                    <div class='d-flex  gap-5 flex-wrap'>
                        <form action='#' style='width: calc((100% / 2) - 1.5rem);'>
                            <div class='text-center fs-6'>
                                <b style='text-transform: uppercase; color:#666;'>Update Profile</b>
                            </div>
                            <div class='form-group mt-3'>
                                <label for='firstname'>Firstname</label>
                                <input type='text' name='firstname' class='form-control' value='$value[firstname]'>
                            </div>
                            <div class='form-group mt-3'>
                                <label for='lastname'>Lastname</label>
                                <input type='text' name='lastname' class='form-control' value='$value[lastname]'>
                            </div>
                            <div class='form-group mt-3'>
                                <label for='phone'>Mobile</label>
                                <input type='text' name='phone' class='form-control' value='$value[phone]'>
                            </div>
                            <button onclick='Update(this, \"user\")' class='btn btn-secondary mt-3' type='button'>Submit</button>
                            <div class='alert alert-info alert-dismissible visually-hidden mt-3' role='alert'>
                                <span class='message'></span>
                                <button type='button' onclick='RemoveMessage(this)' class='btn-close'>
                                </button>
                            </div>
                        </form>
                        <form action='#' style='width: calc((100% / 2) - 1.5rem)'>
                            <div class='text-center fs-6'>
                                <b style='text-transform: uppercase; color:#666;'>Update Password</b>
                            </div>
                            <div class='form-group mt-3'>
                                <label for='password'>Password</label>
                                <input type='password' name='password' class='form-control'>
                            </div>                
                            <div class='form-group mt-3'>
                                <label for='cpassword'>Confirm Password</label>
                                <input type='password' name='cpassword' class='form-control'>
                            </div>
                            <div>
                                <button onclick='Update(this, \"user\")' class='btn btn-secondary mt-3' type='button'>Submit</button>
                                <div class='alert alert-info alert-dismissible visually-hidden mt-3' role='alert'>
                                    <span class='message'></span>
                                    <button type='button' onclick='RemoveMessage(this)' class='btn-close'>
                                    </button>
                                </div>
                            <div>
                        </form>  
                    </div> 
                    ";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<div class="container p-0 mb-2" style='margin-top:30px; '>
    <div class="card" style="transform: none; box-shadow:none;">
        <div class="text-center fs-4 card-header" style='background-color:#ccc;'>
            <b style="text-transform: uppercase; color:#666;">My Ads</b>
        </div>
        <div class="ads-list container" style="margin: 16px 0;">
            <?php renderUserAds($view, false); ?>
        </div>
    </div> 
</div>

<?php include("../components/footer.php") ?>
</body>
    
</html>