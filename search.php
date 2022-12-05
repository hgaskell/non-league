<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/navigation.php"; ?>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page-header">Non League Promotors</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">
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
                <div class="card mr-2">
                    <h2 class="card-title">
                        <a href="post.php?p_id=<?php echo $player_id; ?>"><?php echo $player_name ?></a>
                    </h2>
                    <img class="img-responsive card-img-top" src="images/<?php echo $player_image ?>">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">DOB: <?php echo $player_dob ?></li>
                        <li class="list-group-item">Position: <?php echo $player_position ?></li>
                        <li class="list-group-item">Region: <?php echo $player_region ?></li>
                        <li class="list-group-item">Height: <?php echo $player_height ?></li>
                        <li class="list-group-item">Preferred Foot: <?php echo $player_preferred_foot ?></li>
                    </ul>
                    <hr>
                    <p class="card-text"><?php echo $player_bio ?></p>
                    <a class="btn btn-primary" href="<?php echo $player_email ?>">Contact<span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <?php
        }
    }
} ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>
