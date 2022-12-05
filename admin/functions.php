<?php
function checkQuery($query)
{
    global $connection;
    if (!$query)
    {
        die('Query failed!' . mysqli_error($connection));
    }
}

function create_category()
{
    global $connection;
    if (isset($_POST['submit']))
    {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title))
        {
            echo "Category cannot be blank!";
        }
        else
        {
            $query = "INSERT INTO categories(cat_name)";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);

            checkQuery($query);
        }
    }
}

function get_all_categories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_categories_query))
    {
        $cat_id = $row['cat_id'];
        $cat_name = $row['cat_name'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_name}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'><i class='fa fa-trash' aria-hidden='true'></i></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'><i class='fa fa-edit' aria-hidden='true'></i></td>";
        echo "</tr>";
    }
}

function delete_category()
{
    global $connection;
    if (isset($_GET['delete']))
    {
        $this_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = ${this_cat_id}";
        $delete_category_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function get_user_players()
{
    global $connection;
    $player_user_id = $_SESSION['user_id'];
    $query = "SELECT * from players WHERE player_user_id = ${player_user_id}";
    $select_all_players_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_players_query))
    {
        $player_id = $row['player_id'];
        $player_name = $row['player_name'];
        $player_image = $row['player_image'];
        $player_dob = $row['player_dob'];
        $player_position = $row['player_position'];
        $player_region = $row['player_region'];
        $player_bio = substr($row['player_bio'], 0, 50);
        $player_email = $row['player_email'];
        $player_height = $row['player_height'];
        $player_preferred_foot = $row['player_preferred_foot'];
        $player_status = $row['player_status'];
        echo "<tr>";
        echo "<td>{$player_id}</td>";
        echo "<td>{$player_name}</td>";
        echo "<td><img style='width:100%;' src='../images/{$player_image}'></td>";
        echo "<td>{$player_dob}</td>";
        echo "<td>{$player_position}</td>";
        echo "<td>{$player_region}</td>";
        echo "<td>{$player_bio}</td>";
        echo "<td>{$player_email}</td>";
        echo "<td>{$player_height}</td>";
        echo "<td>{$player_preferred_foot}</td>";
        echo "<td>{$player_status}</td>";
        echo "<td><a href='player_profiles.php?delete={$player_id}'><i class='fa fa-trash' aria-hidden='true'></i></td>";
        echo "<td><a href='player_profiles.php?source=edit_player_profile&p_id={$player_id}'><i class='fa fa-edit' aria-hidden='true'></i></td>";
        echo "</tr>";
    }
}

function get_all_players()
{
    global $connection;
    $query = "SELECT * from players";
    $select_all_players_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_all_players_query))
    {
        $player_id = $row['player_id'];
        $player_name = $row['player_name'];
        $player_image = $row['player_image'];
        $player_dob = $row['player_dob'];
        $player_position = $row['player_position'];
        $player_region = $row['player_region'];
        $player_bio = substr($row['player_bio'], 0, 50);
        $player_email = $row['player_email'];
        $player_height = $row['player_height'];
        $player_preferred_foot = $row['player_preferred_foot'];
        $player_status = $row['player_status'];
        echo "<tr>";
        echo "<td>{$player_id}</td>";
        echo "<td>{$player_name}</td>";
        echo "<td><img style='width:100%;' src='../images/{$player_image}'></td>";
        echo "<td>{$player_dob}</td>";
        echo "<td>{$player_position}</td>";
        echo "<td>{$player_region}</td>";
        echo "<td>{$player_bio}</td>";
        echo "<td>{$player_email}</td>";
        echo "<td>{$player_height}</td>";
        echo "<td>{$player_preferred_foot}</td>";
        echo "<td>{$player_status}</td>";
        echo "<td><a href='player_profiles.php?delete={$player_id}'><i class='fa fa-trash' aria-hidden='true'></i></td>";
        echo "<td><a href='player_profiles.php?source=edit_player_profile&p_id={$player_id}'><i class='fa fa-edit' aria-hidden='true'></i></td>";
        echo "</tr>";
    }
}

function delete_player()
{
    global $connection;
    if (isset($_GET['delete']))
    {
        $this_player_id = $_GET['delete'];

        $query = "DELETE FROM players WHERE player_id = ${this_player_id}";
        $delete_player_query = mysqli_query($connection, $query);
        header("Location: player_profiles.php");
    }
}

function get_all_messages()
{
    global $connection;

    $player_user_id = $_SESSION['user_id'];
    $query = "SELECT * from players WHERE player_user_id = $player_user_id";
    $select_user_id = mysqli_query($connection, $query);
    checkQuery($select_user_id);
    while ($row = mysqli_fetch_assoc($select_user_id))
    {
        $player_id = $row['player_id'];

        $query = "SELECT * from messages WHERE message_player_id = $player_id";
        $select_all_messages_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_all_messages_query))
        {
            $message_id = $row['message_id'];
            $message_player_id = $row['message_player_id'];
            $message_sender = $row['message_sender'];
            $message_email = $row['message_email'];
            $message_content = substr($row['message_content'], 0, 50);
            $message_date = $row['message_date'];
            $message_status = $row['message_status'];
            echo "<tr>";
            echo "<td>{$message_id}</td>";
            echo "<td>{$message_sender}</td>";
            echo "<td>{$message_email}</td>";
            //echo "<td>{$message_content}</td>";
            echo "<td>{$message_date}</td>";

            $query = "SELECT * FROM players WHERE player_id = $message_player_id";
            $link_player_to_message_query = mysqli_query($connection, $query);
            checkQuery($query);
            while ($row = mysqli_fetch_assoc($link_player_to_message_query))
            {
                $player_id = $row['player_id'];
                $player_name = $row['player_name'];
                echo "<td>$player_name</td>";
            }

            echo "<td>{$message_status}</td>";
            echo "<td><a href='messages.php?delete={$message_id}'><i class='fa fa-trash' aria-hidden='true'></i></td>";
            echo "<td><a href='messages.php?source=view_message&m_id={$message_id}'><i class='fa fa-folder-open' aria-hidden='true'></i></td>";
            echo "</tr>";
        }
    }
}

function delete_message()
{
    global $connection;
    if (isset($_GET['delete']))
    {
        $this_message_id = $_GET['delete'];

        $query = "DELETE FROM messages WHERE message_id = ${this_message_id}";
        $delete_message_query = mysqli_query($connection, $query);
        checkQuery($query);
        header("Location: messages.php");
    }
}

function mark_message_read()
{
    global $connection;
    if (isset($_GET['source']))
    {
        $this_message_id = $_GET['m_id'];
        $query = "UPDATE messages SET ";
        $query .= "message_status = 'Read' ";
        $query .= "WHERE message_id = {$this_message_id} ";
        $mark_message_read_query = mysqli_query($connection, $query);
        checkQuery($mark_message_read_query);
    }
}

function get_all_users()
{
    global $connection;
    $query = "SELECT * from users";
    $select_all_users_query = mysqli_query($connection, $query);
    checkQuery($select_all_users_query);
    while ($row = mysqli_fetch_assoc($select_all_users_query))
    {
        $user_id = $row['user_id'];
        $user_handle = $row['user_handle'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_handle}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
        echo "<td><a href='users.php?delete={$user_id}'><i class='fa fa-trash' aria-hidden='true'></i></td>";
        echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'><i class='fa fa-edit' aria-hidden='true'></i></td>";
        echo "</tr>";
    }
}

function create_user()
{
    global $connection;
    if (isset($_POST['create_user']))
    {
        $user_handle = $_POST['user_handle'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];

        $query = "INSERT INTO users(user_handle, user_firstname, user_lastname, user_email, user_password, user_role) ";
        $query .= "VALUES('{$user_handle}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_password}','{$user_role}' ) ";

        $create_user_query = mysqli_query($connection, $query);

        checkQuery($create_user_query);

    }
}

function delete_user()
{
    global $connection;
    if (isset($_GET['delete']))
    {
        $this_user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = ${this_user_id}";
        $delete_user_query = mysqli_query($connection, $query);
        checkQuery($delete_user_query);
        header("Location: users.php");
    }
}

function get_user_data()
{
    global $connection;
    if (isset($_GET['u_id']))
    {
        $this_user_id = $_GET['u_id'];
    }

    $query = "SELECT * from users WHERE user_id = $this_user_id ";
    $select_user_id = mysqli_query($connection, $query);
    checkQuery($select_user_id);

    while ($row = mysqli_fetch_assoc($select_user_id))
    {
        $user_handle = $row['user_handle'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
    }
}

function select_user_role()
{
    global $connection;
    $query = "SELECT * FROM users";
    $select_user_role = mysqli_query($connection, $query);
    checkQuery($select_user_role);

    while ($row = mysqli_fetch_assoc($select_user_role))
    {
        $user_id = $row['user_id'];
        $user_role = $row['user_role'];

        echo "<option value='$user_id'>{$user_role}</option>";
    }
}

?>
