<?php
if (isset($_POST['create_player']))
{
    $player_name = $_POST['player_name'];
    $player_image = $_FILES['player_image']['name'];
    $player_image_temp = $_FILES['player_image']['tmp_name'];
    $player_dob = $_POST['player_dob'];
    $player_region = $_POST['player_region'];
    $player_bio = $_POST['player_bio'];
    $player_email = $_POST['player_email'];
    $player_height = $_POST['player_height'];
    $player_preferred_foot = $_POST['player_preferred_foot'];
    $player_status = $_POST['player_status'];
    $player_position = $_POST['player_position'];

    $player_user_id = $_SESSION['user_id'];

    move_uploaded_file($player_image_temp, "../images/$player_image");

    $query = "INSERT INTO players(player_name, player_image, player_dob, player_region, player_bio, player_email, player_height, player_preferred_foot, player_status, player_position, player_user_id) ";
    $query .= "VALUES('{$player_name}','{$player_image}','{$player_dob}','{$player_region}','{$player_bio}','{$player_email}',{$player_height},'{$player_preferred_foot}','{$player_status}','{$player_position}', {$player_user_id} ) ";

    $create_player_query = mysqli_query($connection, $query);

    checkQuery($create_player_query);

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="player_name">Player Name</label>
        <input class="form-control" type="text" name="player_name">
    </div>

    <div class="form-group">
        <label for="player_image">Image</label>
        <input class="form-control" type="file" name="player_image">
    </div>

    <div class="form-group">
        <label for="player_dob">DOB</label>
        <input class="form-control" type="date" name="player_dob">
    </div>

    <div class="form-group">
        <label style="width:100%;" for="player_region">Region</label>
        <select name="player_region" id="player_region">
            <option value="England">England</option>
            <option value="Scotland">Scotland</option>
            <option value="Wales">Wales</option>
            <option value="Northern Ireland">Northern Ireland</option>
        </select>
    </div>

    <div class="form-group">
        <label for="player_bio">Bio</label>
        <textarea class="form-control" type="text" name="player_bio" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="player_email">Email</label>
        <input class="form-control" type="email" name="player_email">
    </div>

    <div class="form-group">
        <label for="player_height">Height (cm)</label>
        <input class="form-control" type="number" maxlength="3" name="player_height">
    </div>

    <div class="form-group">
        <label style="width:100%;" for="player_position">Position</label>
        <select name="player_position" id="player_position">
            <option value="Goalkeeper">Goalkeeper</option>
            <option value="Defender">Defender</option>
            <option value="Midfielder">Midfielder</option>
            <option value="Attacker">Attacker</option>
        </select>
    </div>
    
    <div class="form-group">
        <label style="width:100%;" for="player_preferred_foot">Preferred Foot</label>
        <select name="player_preferred_foot" id="player_preferred_foot">
            <option value="Left">Left</option>
            <option value="Right">Right</option>
        </select>
    </div>

    <div class="form-group">
        <label style="width:100%;" for="player_status">Status</label>
        <select name="player_status" id="player_status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_player" value="Add Player">
    </div>

</form>
