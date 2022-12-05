<?php
if (isset($_GET['p_id']))
{
    $this_player_id = $_GET['p_id'];
}

$query = "SELECT * from players WHERE player_id = $this_player_id ";
$select_player_id = mysqli_query($connection, $query);
checkQuery($select_player_id);

while ($row = mysqli_fetch_assoc($select_player_id))
{
    $player_id = $row['player_id'];
    $player_name = $row['player_name'];
    $player_image_preview = $row['player_image'];
    $player_dob = $row['player_dob'];
    $player_position = $row['player_position'];
    $player_region = $row['player_region'];
    $player_bio = $row['player_bio'];
    $player_email = $row['player_email'];
    $player_height = $row['player_height'];
    $player_preferred_foot = $row['player_preferred_foot'];
    $player_status = $row['player_status'];
    $player_tags = $row['player_tags'];
}

if (isset($_POST['edit_player']))
{
    $player_name = $_POST['player_name'];
    $player_image = $_FILES['player_image']['name'];
    $player_image_temp = $_FILES['player_image']['tmp_name'];
    $player_dob = $_POST['player_dob'];
    $player_region = $_POST['player_region'];
    $player_bio = $_POST['player_bio'];
    $player_email = $_POST['player_email'];
    $player_position = $_POST['player_position'];
    $player_height = $_POST['player_height'];
    $player_preferred_foot = $_POST['player_preferred_foot'];
    $player_status = $_POST['player_status'];
    $player_tags = $_POST['player_tags'];

    move_uploaded_file($player_image_temp, "../images/$player_image");

    if (empty($player_image))
    {
        $query = "SELECT * from players WHERE player_id = $this_player_id ";
        $select_player_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_player_image))
        {
            $player_image = $row['player_image'];
        }
    }

    $query = "UPDATE players SET ";
    $query .= "player_name = '${player_name}', ";
    $query .= "player_image = '${player_image}', ";
    $query .= "player_dob = '${player_dob}', ";
    $query .= "player_region = '${player_region}', ";
    $query .= "player_bio = '${player_bio}', ";
    $query .= "player_email = '${player_email}', ";
    $query .= "player_height = '${player_height}', ";
    $query .= "player_position = '${player_position}', ";
    $query .= "player_preferred_foot = '${player_preferred_foot}', ";
    $query .= "player_status = '${player_status}', ";
    $query .= "player_tags = '${player_tags}' ";
    $query .= "WHERE player_id = {$this_player_id} ";

    $edit_player_query = mysqli_query($connection, $query);
    checkQuery($edit_player_query);
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="player_name">Player Name</label>
        <input value="<?php echo $player_name; ?>" class="form-control" type="text" name="player_name">
    </div>

    <div class="form-group">
        <label style="width:100%" for="player_image">Image</label>
        <img style="width:15%;padding-bottom:10px;" src="../images/<?php echo $player_image_preview; ?>" alt="Player Image">
        <input class="form-control" type="file" name="player_image">
    </div>

    <div class="form-group">
        <label for="player_dob">DOB</label>
        <input value="<?php echo $player_dob; ?>" class="form-control" type="date" name="player_dob">
    </div>

    <div class="form-group">
        <label style="width:100%;" for="player_region">Region</label>
        <select name="player_region" id="player_region">
            <option value="<?php echo $player_region; ?>"><?php echo $player_region; ?></option>
            <?php
if ($player_region == "England")
{
    echo "<option value='Scotland'>Scotland</option>";
    echo "<option value='Wales'>Wales</option>";
    echo "<option value='Northern Ireland'>Northern Ireland</option>";
}
else if ($player_region == "Scotland")
{
    echo "<option value='England'>England</option>";
    echo "<option value='Wales'>Wales</option>";
    echo "<option value='Northern Ireland'>Northern Ireland</option>";
}
else if ($player_region == "Wales")
{
    echo "<option value='England'>England</option>";
    echo "<option value='Scotland'>Scotland</option>";
    echo "<option value='Northern Ireland'>Northern Ireland</option>";
}
else if ($player_region == "Northern Ireland")
{
    echo "<option value='England'>England</option>";
    echo "<option value='Scotland'>Scotland</option>";
    echo "<option value='Wales'>Wales</option>";
}
?>
        </select>
    </div>

    <div class="form-group">
        <label for="player_bio">Bio</label>
        <textarea class="form-control" type="text" name="player_bio" cols="30" rows="10"><?php echo $player_bio; ?></textarea>
    </div>

    <div class="form-group">
        <label for="player_email">Email</label>
        <input value="<?php echo $player_email; ?>" class="form-control" type="email" name="player_email">
    </div>

    <div class="form-group">
        <label for="player_height">Height (cm)</label>
        <input value="<?php echo $player_height; ?>" class="form-control" type="number" maxlength="3" name="player_height">
    </div>

    <div class="form-group">
        <label style="width:100%;" for="player_position">Position</label>
        <select name="player_position" id="player_position">
            <option value="<?php echo $player_position; ?>"><?php echo $player_position; ?></option>
            <?php
if ($player_position == "Goalkeeper")
{
    echo "<option value='Defender'>Defender</option>";
    echo "<option value='Midfielder'>Midfielder</option>";
    echo "<option value='Attacker'>Attacker</option>";
}
else if ($player_position == "Defender")
{
    echo "<option value='Goalkeeper'>Goalkeeper</option>";
    echo "<option value='Midfielder'>Midfielder</option>";
    echo "<option value='Attacker'>Attacker</option>";
}
else if ($player_position == "Midfielder")
{
    echo "<option value='Goalkeeper'>Goalkeeper</option>";
    echo "<option value='Defender'>Defender</option>";
    echo "<option value='Attacker'>Attacker</option>";
}
else if ($player_position == "Attacker")
{
    echo "<option value='Goalkeeper'>Goalkeeper</option>";
    echo "<option value='Defender'>Defender</option>";
    echo "<option value='Midfielder'>Midfielder</option>";
}
?>
        </select>
    </div>

    <div class="form-group">
        <label style="width:100%;" for="player_preferred_foot">Preferred Foot</label>
        <select name="player_preferred_foot" id="player_preferred_foot">
            <option value="<?php echo $player_preferred_foot; ?>"><?php echo $player_preferred_foot; ?></option>
            <?php
if ($player_preferred_foot == "Left")
{
    echo "<option value='Right'>Right</option>";
}
else
{
    echo "<option value='Left'>Left</option>";
}
?>
        </select>
    </div>

    <div class="form-group">
        <label style="width:100%;" for="player_status">Status</label>
        <select name="player_status" id="player_status">
            <option value="<?php echo $player_status; ?>"><?php echo $player_status; ?></option>
            <?php
if ($player_status == "Active")
{
    echo "<option value='Inactive'>Inactive</option>";
}
else
{
    echo "<option value='Active'>Active</option>";
}
?>
        </select>
    </div>

    <?php if ($_SESSION['role'] == "Admin")
{ ?>
    <div class="form-group">
        <label style="width:100%;" for="player_tags">Player of the week?</label>
        <select name="player_tags" id="player_tags">
            <option value="<?php echo $player_tags; ?>"><?php echo $player_tags; ?></option>
            <?php
    if ($player_tags == "Featured")
    {
        echo "<option value=''>No</option>";
    }
    else
    {
        echo "<option value='Featured'>Featured</option>";
    }
?>
        </select>
    </div>
    <?php
} ?>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_player" value="Edit Player">
    </div>

</form>
