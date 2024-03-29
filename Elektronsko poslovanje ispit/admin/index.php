<?php
session_start();
require_once "../mvc/view.php";
require_once "../components/usersads.php";

$view = new View();


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
<div id="tabs">
    <ul class="nav nav-pills nav-justified" style="background-color: #ececec;">
        <li class="nav-item" style="border-right: 1px solid #ccc;">
            <a onclick="toggleTabs(this)" class="active btn first" href='#tabs-1' style="text-transform: uppercase;color:#4d4d4d;display: block;">Real estates</a>
        </li>
        <li class="nav-item">
            <a onclick="toggleTabs(this)" class="btn second" href='#tabs-2' style="text-transform: uppercase;color:#4d4d4d;display: block;">Users</a>
        </li>
    </ul>

    <div class="variety pt-4" id="tabs-1">
        <div class="container">
            <div class="section-title">
                <h2 class="text-center btn-get-BSstarted">Real estates</h2>
                <hr>
            </div>
            <div class="ads-list">
            <?php renderUserAds($view); ?>
            </div>
        </div>
    </div>


    <div class="variety pt-4" id="tabs-2">
        <div class="container">
            <div class="section-title">
                <h2 class="text-center btn-get-started">Users</h2>
                <hr>
            </div>
            <div class="ads-list" style="justify-content: center;">
                <?php
                    $users = $view->users();
                    echo "
                    <div>
                        <div style='display:flex; justify-content:center;'>
                            <form style='flex:1; padding:0 30%;'>
                                <div style='display: flex;justify-content: center;flex-direction: column;'>
                                    <select class='form-select' style='display:block;' name='id'>
                                        <option disabled selected>Select</option>
                                        ";
                                            for ($i=0; $i < sizeof($users); $i++) { 
                                                $value = $users[$i];
                                                echo "
                                                    <option value='$value[id_user]'>$value[email]</option>
                                                ";
                                            }
                                    echo "
                                    </select>
                                    <button onclick=\"Block(this, 'user')\" type='button' ".(sizeof($users) > 0 ? "" : "disabled='true'")." class='btn btn-secondary' style='margin:15px 0;'>Block / Unblock user</button>
                                    <div class='alert alert-info alert-dismissible visually-hidden mt-3' role='alert'>
                                        <span class='message'></span>
                                        <button type='button' onclick='RemoveMessage(this)' class='btn-close'>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>             
                    ";
                ?>
            </div>
        </div>
    </div>
</div>

<?php include("../components/footer.php") ?>

</body>
<script>
    $( function() {
        $( "#tabs" ).tabs({
            active: "tabs-1"
        });
    } );
</script>
</html>