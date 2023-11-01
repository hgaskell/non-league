<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/navigation.php"; ?>

<div class="player-page">

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

    <div class="player-heading">
        <h2>
            <a class="player-heading-link" href="#"><?php echo $player_name ?></a>
        </h2>
    </div>
    <div class="player-image">
        <img class="" src="images/<?php echo $player_image ?>">
    </div>

    <div class="player-info">
        <ul>
            <li>Age <span><?php echo getAge($player_dob); ?></span> <i class="fas fa-birthday-cake"></i></li>
            <li>Position <span><?php echo $player_position ?></span> <i class="fas fa-vector-square"></i></li>
            <li>Region <span><?php echo $player_region ?></span> <i class="fas fa-map-pin"></i></li>
            <li>Height <span><?php echo $player_height ?>cm</span> <i class="fas fa-ruler-vertical"></i></li>
            <li>Preferred Foot <span><?php echo $player_preferred_foot ?></span> <i class="fas fa-shoe-prints"></i></li>
        </ul>
    </div>

    <div class="player-bio">
        <h4>bio</h4>
        <p><?php echo $player_bio ?></p>
    </div>


    
    
                
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

<div class="player-form">
        <h4>Get in touch</h4>
        <form role="form" action="" method="post">
            <div class="player-form-container">
                <input type="text" name="message_sender" class="player-form-input" placeholder="Name">
            </div>
            <div class="player-form-container">
                <input type="email" name="message_email" class="player-form-input" placeholder="Email">
            </div>
            <div class="player-form-container">
                <textarea class="player-form-input" name="message_content" rows="3" placeholder="Message"></textarea>
            </div>
            <button type="submit" name="create_message" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
<?php include "includes/footer.php"; ?>
