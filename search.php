<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/navigation.php"; ?>


    <div class="filter-heading">
        <h2>
            Available Players
        </h2>
    </div>

    <div class="filters">

    <div class="sidebar-filters">
        <form class="filter-row" action="filter.php" method="get">
            <div class="filter-input">
                <div class="filter-label heading-4" >
                    <label for="filter_position">Position</label>
                </div>
                
                <select class="filter-dropdown" name="filter_position">
                    <option value="">Any</option>
                    <option value="Goalkeeper">Goalkeeper</option>
                    <option value="Defender">Defender</option>
                    <option value="Midfielder">Midfielder</option>
                    <option value="Attacker">Attacker</option>
                </select>
            </div>

            <div class="filter-input">
                <div class="filter-label heading-4" >
                    <label for="filter_region">Region</label>
                </div>
                
                <select class="filter-dropdown" name="filter_region">
                    <option value="">Any</option>
                    <option value="England">England</option>
                    <option value="Wales">Wales</option>
                    <option value="Scotland">Scotland</option>
                    <option value="Northern Ireland">Northern Ireland</option>
                </select>
            </div>
            <div class="filter-btn">
                <input class="btn btn-primary" type="submit" value="Reset Filters">
            </div>
        </form>
    </div>
    <div class="players">

                <?php
if (isset($_POST['search']))
{
    $search = $_POST['search'];

    $query = "SELECT * FROM players WHERE player_name LIKE '%$search%' ";
    $search_query = mysqli_query($connection, $query);

    if (!$search_query)
    {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $count = mysqli_num_rows($search_query);

    if ($count == 0)
    {
        echo "<h2>No Results</h2>";
    }
    else
    {
        //$query = "SELECT * FROM players";
        //$select_all_players_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($search_query))
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
?>
    <div class="player">
        <img src="images/<?php echo $player_image ?>" alt="Player Image" class="player__img">
        <h5 class="player__name"><?php echo $player_name ?></h5>
        <div class="player__location">
            <p>Region: <?php echo $player_region ?></p>
        </div>
        <div class="player__age">
            <p>Age: <?php echo getAge($player_dob); ?></p>
        </div>
        <div class="player__position">
            <p>Position: <?php echo $player_position ?></p>
        </div>
        <div class="player__height">
            <p>Height: <?php echo $player_height ?>cm</p>
        </div>
        <a class="btn player__btn" href="post.php?p_id=<?php echo $player_id; ?>">Contact player</a>
    </div>
    <?php
        } ?>

    </div>

    <?php
    }
} ?>
    
</div>

<?php include "includes/footer.php"; ?>
