<?php
session_start();
require "./mvc/view.php";

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

<?php include("./components/head.php") ?>

<body>

<section>
    <?php include("./components/navbar.php") ?>
</section>


<section id="hero">
    <div class="hero-container text-center">
        <div class="actions">
            <h2>Filter now</h2>
            <form class="filters-wrapper">
            <div class="filters">
                <i class="fa fa-home" aria-hidden="true"></i>
                <label class="form-label" style="size: 30px;">Type</label>
                <select class="form-select" onchange="GetEntry(this, 'ads')" name="type">
                    <option value="">Property type</option>
                <?php
                $filters = $ads->getFilters();
                $property_type = [];
                for ($i=0; $i < sizeof($filters['property_type']); $i++) { 
                    $value = $filters['property_type'][$i];
                    $property_type[] = $value;
                    echo "<option value='$value[id]'>$value[property_type]</option>";
                }
                ?>
                </select>
            </div> 
            <div class="filters">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <label class="form-label">Location</label>
                <select class="form-select" onchange="GetEntry(this, 'ads')" name="location">
                    <option value="">Location</option>
                <?php
                
                for ($i=0; $i < sizeof($filters['location']); $i++) { 
                    $value = $filters['location'][$i];
                    echo "<option>$value[location]</option>";
                }
                ?>
                </select>
            </div>
            <div class="filters">
                <i class="fa fa-money" aria-hidden="true"></i>
                <label class="form-label">Price</label>
                <?php
                    $range = $filters['minmax'][0];

                    echo "<input onchange=\"GetEntry(this, 'ads')\" type='range' class='form-range' min='$range[max]' max='$range[min]' name='range'>";
                ?>
            </div>
            <div class="filters">
                <i class="fas fa-calendar-week" aria-hidden="true"></i>
                <label class="form-label">Rent start</label>
                <?php
                    echo "<input class='form-control' onchange=\"GetEntry(this, 'ads')\" type='date' class='form-range' name='rent_start'>";
                ?>
            </div>
            <div class="filters">
                <i class="fas fa-calendar-week" aria-hidden="true"></i>
                <label class="form-label">Rent end</label>
                <?php
                    echo "<input class='form-control' onchange=\"GetEntry(this, 'ads')\" type='date' class='form-range' name='rent_end'>";
                ?>
            </div>
            </form>
        </div
    </div>
</section>


<section id="variety" class="variety pt-4">
    <div class="container">
        <div class="section-title">
            <?php 
            if(isset($_SESSION['id_user'])){
                echo "
                    <button type='button' class='btn' style='float:right;' onclick=\"AddNewAd("; echo htmlspecialchars(json_encode($property_type)); echo")\">Add new</button>
                ";
            }
            ?>
            <h2 class="text-center btn-get-started">Real estates</h2>
            <hr>
        </div>
        <div class="ads-list">
        <?php
            $adsData = $ads->getAds();
            for ($i = 0;$i < sizeof($adsData);$i++)
            {
                $value = $adsData[$i];
                if($value['active'] != 0){
                    echo "
                    <div class='card single-ad'>
                        <img class='card-img-top' src='uploads/$value[image]' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>$value[property_type]</h5>
                            <p class='card-text'><b>Price: </b>$value[price] € / day</p>
                            <p class='card-text'><i class='fa fa-map-marker' aria-hidden='true'></i> <b>Location: </b> $value[location]</p>
                            
                            <div>
                                <div class='field-single'>
                                    <label>Rent start</label>
                                    <input type='date' disabled value='$value[rent_start]'/>
                                </div>
                                <div class='field-single'>
                                    <label>Rent end</label>
                                    <input type='date' disabled value='$value[rent_end]'/>
                                </div>
                            </div>

                            <p class='card-text' style='margin-top:10px;font-size: 15px;'>$value[description]</p>
                            <p class='card-text'><small class='text-muted'>$value[email]</small></p>
                        </div>
                        ";
                        if(isset($_SESSION['id_user'])){
                            if($value['rented_by'] != null){
                                echo "<div class='rented'>Already rented</div>";
                            }
                                if($value['rented_by'] == $_SESSION['id_user']){
                                    echo "
                                    <div  style='background-color:transparent;'>
                                        <form>
                                            <label style='margin-top:5px; padding-left:20px;'>Comment code:</label>
                                            <input class='form-control' style='margin-bottom:5px;' name='verification'/>
                                            <h5 style='text-align: center;'>Comment</h5>
                                            <div class='card-footer'>
                                                <textarea type='text' class='area form-control'></textarea>
                                                <button type='button' class='btn' onclick=\"sendComment(this, $value[id])\"><i class='fa fa-paper-plane' aria-hidden='true'></i></button>
                                                <div class='alert alert-info alert-dismissible visually-hidden mt-3' role='alert'>
                                                    <span class='message'></span>
                                                    <button type='button' onclick='RemoveMessage(this)' class='btn-close'>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    ";
                                }else if($value['id_user'] != $_SESSION['id_user']){
                                    echo "
                                    <div class='card-footer' style='background-color:transparent;'>
                                        <h5 style='text-align: center;'>Send message</h5>
                                        <textarea type='text' class='area form-control'></textarea>
                                        <button type='button' class='btn' onclick=\"sendMessage(this, $value[id_user])\"><i class='fa fa-paper-plane' aria-hidden='true'></i></button>
                                        <div class='alert alert-info alert-dismissible visually-hidden mt-3' role='alert'>
                                            <span class='message'></span>
                                            <button type='button' onclick='RemoveMessage(this)' class='btn-close'>
                                            </button>
                                        </div>
                                    </div>";
                                } else{
                                    $users = $ads->users();
                                    echo "
                                        <div class='btn' onclick=\"DeleteAd(this, $value[id])\">Delete ad</div>
                                        <form>
                                            <select class='form-control' style='display:block;' name='rented_by'>
                                                <option disabled selected>Select</option>
                                                    ";
                                                    for ($i=0; $i < sizeof($users); $i++) { 
                                                        $userValue = $users[$i];
                                                        echo "
                                                        <option value='$userValue[id_user]' ".($userValue['id_user'] == $value['rented_by'] ? "selected='true'" : "").">$userValue[email]</option>
                                                        ";
                                                    }
                                                    echo "
                                            </select>
                                            <div class='btn' onclick=\"ReservateAd(this, $value[id])\">Reservate for</div>
                                            <div class='alert alert-info alert-dismissible visually-hidden mt-3' role='alert'>
                                                <span class='message'></span>
                                                <button type='button' onclick='RemoveMessage(this)' class='btn-close'>
                                                </button>
                                            </div>
                                        </form>
                                    ";
                                }
                        }
                        echo "
                    </div>
                    ";
                }
            }
            if(!sizeof($adsData)){
                echo "
                <div class='row'>
                    There is no active ad. 
                </div>";
            }
        ?>
        </div>
    </div>
</section>

<?php include("./components/footer.php") ?>

</body>
</html>