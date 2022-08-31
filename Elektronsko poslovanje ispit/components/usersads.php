<?php
$root = 'http://'.getenv('HTTP_HOST').'/Examples/Elektronsko%20poslovanje%20ispit';

if(strpos($_SERVER['PHP_SELF'],basename(__FILE__))){
    header("Location:$root");
}

function renderUserAds($view, $admin = true) {
    
    $adsData = $admin ? $view->getAds() : $view->getMyAds();
    $propertyData = $view->getFilters();
    $comments = $view->getComments();

    for ($i = 0;$i < sizeof($adsData);$i++)
    {
        $value = $adsData[$i];
        echo "
        <div class='row single-ad'>
            <div class=' d-flex align-items-stretch'>
                <div class='card'>
                    <img class='card-img-top' src='../uploads/$value[image]' alt='Card image cap'>
                    <div class='card-body'>
                    
                        <div class='card-body'>
                            <h5 class='card-title'>$value[property_type]</h5>
                            <p class='card-text'><b>Price: </b>$value[price] € / day</p>
                            <p class='card-text'><i class='fa fa-map-marker' aria-hidden='true'></i><b>Location: </b> $value[location]</p>
                            
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
                            ".($admin ? "<p class='card-text'><small class='text-muted'>$value[email]</small></p>" : "")." 
                        </div>

                        <div class='read-more' onclick=\"$(this).closest('.single-ad').children('.edit').toggle()\"><div>
                            <i class='fas fa-edit'></i>
                            Edit
                        </div></div>
                        <div class='read-more' onclick=\"DeleteAd(this, $value[id])\"><div>
                            <i class='fas fa-trash'></i>
                            Delete
                        </div></div>
                        <div class='read-more' onclick=\"Block(this, 'ads', $value[id])\"><div>
                            <i class='fas fa-trash'></i>
                            Activate / Block
                        </div></div>
                        <div class='alert alert-info alert-dismissible visually-hidden mt-3' role='alert'>
                            <span class='message'></span>
                            <button type='button' onclick='RemoveMessage(this)' class='btn-close'>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class='comments card'>
            ";
            for ($z=0; $z < sizeof($comments); $z++) { 
                $commentsValue = $comments[$z];
                if($commentsValue['ads_id'] == $value['id'] && $commentsValue['comment'] != null) {
                    echo "
                    <div class='single-comment'>
                        <form>
                            <div><input class='form-control' value='$commentsValue[comment]' name='comment'/> -- $commentsValue[email]</div>
                            <div onclick=\"DeleteComment(this, $commentsValue[id])\">
                                <i class='fas fa-trash'></i>
                                Delete
                            </div>
                            <div onclick=\"updateComment(this, $commentsValue[id])\">
                                <i class='fas fa-edit'></i>
                                Edit
                            </div>
                            <div class='alert alert-info alert-dismissible visually-hidden mt-3' role='alert'>
                                <span class='message'></span>
                                <button type='button' onclick='RemoveMessage(this)' class='btn-close'>
                                </button>
                            </div>
                        </form>
                    </div>
                    ";
                };
            };
            echo "
            </div>
            <div class='row edit' style='display:none;'>
                <div class=' d-flex align-items-stretch'>
                    <div class='card'>
                        <div class='card-body'>
                            <form enctype='multipart/form-data'>
                                <input name='id' value='$value[id]' hidden/>
                                <h5 class='card-title'>
                                    Edit ad
                                </h5>
                                <div>
                                    <label class='form-label'>Location</label>
                                    <input class='form-control' name='location' value='$value[location]'>
                                </div>
                                <div>
                                    <label class='form-label'>Image</label>
                                   <input type='file' name='file' id='file'  src='$value[image]'>                                 
                                </div>
                                <div>
                                    <label class='form-label'>Property type</label>
                                    <select class='form-select' name='property_type'>";
                                    for ($y=0; $y < sizeof($propertyData['property_type']); $y++) { 
                                        $propertyValue = $propertyData['property_type'][$y];
                                        echo "<option ".($propertyValue['property_type'] == $value['property_type'] ? "selected='true'" : "")." value='$propertyValue[id]' >$propertyValue[property_type]</option>";
                                    }
                                    echo "
                                    </select>
                                </div>
                                <div>
                                    <label class='form-label'>Description</label>
                                    <input class='form-control' name='description' value='$value[description]'>
                                </div>
                                <div>
                                    <label class='form-label'>Price</label>
                                    <input class='form-control' name='price' value='$value[price]'>
                                </div>
                                <div>
                                    <label class='form-label'>Rent start</label>
                                    <input class='form-control' type='date' name='rent_start' value='$value[rent_start]'>
                                </div>
                                <div>
                                    <label class='form-label'>Rent end</label>
                                    <input class='form-control' type='date' name='rent_end' value='$value[rent_end]'>
                                </div>
                                <div class='read-more btn' onclick=\"Update(this, 'ads')\"><div>
                                    <i class='fas fa-edit'></i>
                                    Save
                                </div></div>
                                <div class='alert alert-info alert-dismissible visually-hidden mt-3' role='alert'>
                                    <span class='message alert'></span>
                                    <button type='button' onclick='RemoveMessage(this)' class='btn-close'>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        ";
    
    }
    if(!sizeof($adsData)){
        echo "
        <div style='text-align:center;'>
            There is no ad so far
        </div>
        ";
    }
}
?>
