<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">Non League Promotors</h1>

                <!-- First Blog Post -->
                <?php
if (isset($_GET['p_id']))
{
    $this_player_id = $_GET['p_id'];
}

$query = "SELECT * FROM players WHERE player_id = $this_player_id ";
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
?>
                <h2>
                    <a href="#"><?php echo $player_name ?></a>
                </h2>
                <img class="img-responsive" src="images/<?php echo $player_image ?>">
                <ul class="list-unstyled">
                    <li>DOB: <?php echo $player_dob ?></li>
                    <li>Position: <?php echo $player_position ?></li>
                    <li>Region: <?php echo $player_region ?></li>
                    <li>Height: <?php echo $player_height ?></li>
                    <li>Preferred Foot: <?php echo $player_preferred_foot ?></li>
                </ul>
                <hr>
                <p><?php echo $player_bio ?></p>
                <a class="btn btn-primary" href="<?php echo $player_email ?>">Contact<span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <?php
} ?>


                <?php
if (isset($_POST['create_message']))
{
    $this_player_id = $_GET['p_id'];
    $sender_name = $_POST['message_sender'];
    $message_email = $_POST['message_email'];
    $message_content = $_POST['message_content'];

    $query = "INSERT INTO messages(message_player_id,message_sender,message_email,message_content,message_date,message_status)";
    $query .= "VALUES($this_player_id, '{$sender_name}', '{$message_email}', '{$message_content}', now(), 'Unread')";

    $create_message_query = mysqli_query($connection, $query);
    //checkQuery($query);
    
}
?>
                <!-- Message Form -->
                <div class="well">
                    <h4>Get in touch</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="sender">Name</label>
                            <input type="text" name="message_sender" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="message_email" class="form-control">
                        </div>
                        <label for="message">Message</label>
                        <div class="form-group">
                            <textarea class="form-control" name="message_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_message" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>
