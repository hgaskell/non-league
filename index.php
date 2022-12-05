<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/navigation.php"; ?>

    
    <div class="container">
        <div class="row hero-banner flex-row-reverse">
            <div class="col-md-8 align-self-end">
                <h1 class="page-header">Non League Promotors</h1>
            </div>  
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-4">
                <h3 class="search-heading mb-5">Find a player<i class="far fa-arrow-right"></i></h3>
            </div>
            <div class="col-8">
                <form class="form-inline my-2 my-lg-0 d-flex" action="search.php" method="post">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Player Search" aria-label="Search">
                <button name="submit" class="btn btn-default" id="playerSearch" type="submit">
                    <i class="fa fa-search"></i>
                </button>
                </form>
            </div>
        </div>
        <div class="row">
        <?php
$query = "SELECT * FROM players WHERE player_tags = 'Featured'";
$select_featured_player_query = mysqli_query($connection, $query);
checkQuery($select_featured_player_query);

while ($row = mysqli_fetch_assoc($select_featured_player_query))
{
    $player_id = $row['player_id'];
    $player_name = $row['player_name'];
    $player_image = $row['player_image'];
    $player_dob = $row['player_dob'];
    $player_position = $row['player_position'];
    $player_region = $row['player_region'];
    $player_bio = $row['player_bio'];
    $player_email = $row['player_email'];
    $player_height = $row['player_height'];
    $player_preferred_foot = $row['player_preferred_foot'];
    $player_status = $row['player_status'];

    if ($player_status !== 'Active')
    {

    }
    else
    { ?>
                            <div class="card border col-4">
                            <h4 class="text-center mt-1 card-title">Player of the week</h4>
                            <h4 class="text-center card-title">
                                <a href="post.php?p_id=<?php echo $player_id; ?>"><?php echo $player_name ?></a>
                            </h4>
                            <div>
                                <img class="img-responsive img-slick" src="images/<?php echo $player_image ?>">
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Age: <?php echo getAge($player_dob); ?></li>
                                <li class="list-group-item">Position: <?php echo $player_position ?></li>
                                <li class="list-group-item">Region: <?php echo $player_region ?></li>
                                <li class="list-group-item">Height: <?php echo $player_height ?>cm</li>
                                <li class="list-group-item">Preferred Foot: <?php echo $player_preferred_foot ?></li>
                            </ul>
                            <a class="btn btn-primary" href="post.php?p_id=<?php echo $player_id; ?>">Profile</a>
                            </div><?php
    }
}
?>          
                <div class="col-8 align-self-center border filter-box">
                    <h3 class="text-center">Player Filter</h3>
                    <div class="">
                        <form class="form-inline" action="filter.php" method="get">
                            <div class="row form-group d-flex">
                                <div class="col-4 d-flex flex-column align-items-center" >
                                    <label for="filter_position">Position</label>
                                    <img class="filter-img" src="images/position.JPG" alt="">
                                </div>
                                
                                <select class="col-8 custom-select align-self-center" name="filter_position">
                                    <option value="">Any</option>
                                    <option value="Goalkeeper">Goalkeeper</option>
                                    <option value="Defender">Defender</option>
                                    <option value="Midfielder">Midfielder</option>
                                    <option value="Attacker">Attacker</option>
                                </select>
                            </div>

                            <div class="row form-group d-flex mt-2">
                                <div class="col-4 d-flex flex-column align-items-center" >
                                    <label for="filter_region">Region</label>
                                    <img class="filter-img" src="images/region.JPG" alt="">
                                </div>
                                
                                <select class="col-8 custom-select align-self-center" name="filter_region">
                                    <option value="">Any</option>
                                    <option value="England">England</option>
                                    <option value="Wales">Wales</option>
                                    <option value="Scotland">Scotland</option>
                                    <option value="Northern Ireland">Northern Ireland</option>
                                </select>
                            </div>
                            <div class="row form-group d-flex mt-2">
                                <div class="col-4 d-flex flex-column align-items-center" >
                                    <label for="filter_region">Level</label>
                                    <img class="filter-img" src="images/level.JPG" alt="">
                                </div>
                                
                                <!-- <select class="col-8 custom-select align-self-center" name="filter_region">
                                    <option value="">Any</option> -->
                                    <!-- <option value="England">England</option>
                                    <option value="Wales">Wales</option>
                                    <option value="Scotland">Scotland</option>
                                    <option value="Northern Ireland">Northern Ireland</option> -->
                                <!-- </select> -->
                            </div>
                            <div class="form-group text-center">
                                <input class="btn btn-primary" type="submit" name="filter_player" value="Go">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 d-flex autoplay">
                <?php
$query = "SELECT * FROM players";
$select_all_players_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all_players_query))
{
    $player_id = $row['player_id'];
    $player_name = $row['player_name'];
    $player_image = $row['player_image'];
    $player_dob = $row['player_dob'];
    $player_position = $row['player_position'];
    $player_region = $row['player_region'];
    $player_bio = $row['player_bio'];
    $player_email = $row['player_email'];
    $player_height = $row['player_height'];
    $player_preferred_foot = $row['player_preferred_foot'];
    $player_status = $row['player_status'];

    if ($player_status !== 'Active')
    {

    }
    else
    {
?>
                <div class="card mr-2 d-flex">
                    <h4 class="card-title">
                        <a href="post.php?p_id=<?php echo $player_id; ?>"><?php echo $player_name ?></a>
                    </h4>
                    <div>
                        <img class="img-responsive img-slick" src="images/<?php echo $player_image ?>">
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Age: <?php echo getAge($player_dob); ?></li>
                        <li class="list-group-item">Position: <?php echo $player_position ?></li>
                        <li class="list-group-item">Region: <?php echo $player_region ?></li>
                        <li class="list-group-item">Height: <?php echo $player_height ?>cm</li>
                        <li class="list-group-item">Preferred Foot: <?php echo $player_preferred_foot ?></li>
                    </ul>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $player_id; ?>">Profile</a>
                </div>
                    <?php
    }
} ?>
            </div>
        </div>
        



<?php include "includes/footer.php"; ?>
