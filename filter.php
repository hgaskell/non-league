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
if (isset($_GET['filter_position']))
{

    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = '';
    }

    if ($page == '' || $page == 1)
    {
        $page_1 = 0;
    }
    else
    {
        $page_1 = ($page * 3) - 3;
    }

    $filter_position = $_GET['filter_position'];
    $filter_region = $_GET['filter_region'];

    $filter_count_query = "SELECT * from players WHERE player_region LIKE '%$filter_region%' AND player_position LIKE '%$filter_position%'";
    $run_filter_count_query = mysqli_query($connection, $filter_count_query);
    $get_count = mysqli_num_rows($run_filter_count_query);

    $filter_count = ceil($get_count / 3);

    $query = "SELECT * from players WHERE player_region LIKE '%$filter_region%' AND player_position LIKE '%$filter_position%' LIMIT $page_1, 3";
    $filter_query = mysqli_query($connection, $query);

    checkQuery($filter_query);

    $count = mysqli_num_rows($filter_query);

    if ($count == 0)
    {
        echo "<h2>No Results</h2>";
    }
    else
    {
        $count = ceil($count / 2);

        while ($row = mysqli_fetch_assoc($filter_query))
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
    <ul class="pagination">
    <?php
        for ($i = 1;$i <= $filter_count;$i++)
        {
            echo "<li class='page-item'><a class='page-link' href='filter.php?filter_position={$filter_position}&filter_region={$filter_region}&page={$i}'>$i</a></li>";
        }
    ?>
    </ul>

    <?php
    }
} ?>
    
</div>
<?php include "includes/footer.php"; ?>
