<?php include "includes/header.php";?>
<?php include "includes/db.php";?>
<?php include "includes/navigation.php";?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <form class="form-inline" action="filter.php" method="post">
                <div class="row form-group d-flex">
                    <div class="col-4 d-flex flex-column align-items-center" >
                        <label for="filter_position">Position</label>
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
                    </div>
                    
                    <select class="col-8 custom-select align-self-center" name="filter_region">
                        <option value="">Any</option>
                        <option value="England">England</option>
                        <option value="Wales">Wales</option>
                        <option value="Scotland">Scotland</option>
                        <option value="Northern Ireland">Northern Ireland</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="filter_player" value="Reset Filters">
                </div>
            </form>
        </div>
        <div class="col-10">
<?php
    if(isset($_POST['filter_player'])){
        $filter_position = $_POST['filter_position'];
        $filter_region = $_POST['filter_region'];

        $query = "SELECT * from players WHERE player_region LIKE '%$filter_region%' AND player_position LIKE '%$filter_position%'";
        $filter_query = mysqli_query($connection, $query);

        checkQuery($filter_query);

        $count = mysqli_num_rows($filter_query);

        if($count == 0){
            echo "<h2>No Results</h2>";
        } else {
            //$query = "SELECT * FROM players";
            //$select_all_players_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($filter_query)){
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

?>

            <div class="d-flex mb-3 filter-border">
                <div class="player-headings flex-center filter-border-top filter-border-bottom">
                    <h5 class="">
                        <a class="text-decoration-none" href="post.php?p_id=<?php echo $player_id; ?>"><?php echo $player_name ?></a>
                    </h5>
                    <div>
                        <img class="img-responsive img" src="images/<?php echo $player_image ?>">
                    </div>
                    
                </div>
                <ul class="list-group list-group-flush justify-content-center attribute-list filter-border-bottom">
                    <li class="list-group-item filter-border-right filter-border-top">Age: <?php echo getAge($player_dob); ?></li>
                    <li class="list-group-item filter-border-right">Position: <?php echo $player_position ?></li>
                    <li class="list-group-item filter-border-right">Region: <?php echo $player_region ?></li>
                    <li class="list-group-item filter-border-right">Height: <?php echo $player_height ?></li>
                    <li class="list-group-item filter-border-right">Preferred Foot: <?php echo $player_preferred_foot ?></li>
                </ul>
                <div class="d-flex align-items-center flex-grow-1 flex-column justify-content-around">
                    <a class="btn btn-primary filter-btn filter-btn filter-btn-light" href="<?php echo $player_email ?>">Contact</a>
                    <a class="btn btn-primary filter-btn filter-btn" href="post.php?p_id=<?php echo $player_id; ?>">Profile</a>
                </div>
                </div>
        

    <?php   }   }   } ?>
        

    </div>
    
</div>
<?php        include "includes/footer.php"; ?>