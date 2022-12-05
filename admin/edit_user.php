<?php
if (isset($_GET['u_id']))
{
    $this_user_id = $_GET['u_id'];

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

if (isset($_POST['edit_user']))
{
    $user_handle = $_POST['user_handle'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    if ($user_password != "")
    {
        $query = "SELECT randSalt FROM users";
        $select_randsalt_query = mysqli_query($connection, $query);
        checkQuery($select_randsalt_query);

        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['randSalt'];
        $hashed_password = crypt($user_password, $salt);

        $query = "UPDATE users SET ";
        $query .= "user_password = '${hashed_password}' ";
        $query .= "WHERE user_handle = '{$user_handle}' ";

        $edit_profile_query = mysqli_query($connection, $query);
        checkQuery($edit_profile_query);

    }

    $query = "UPDATE users SET ";
    $query .= "user_handle = '${user_handle}', ";
    $query .= "user_firstname = '${user_firstname}', ";
    $query .= "user_lastname = '${user_lastname}', ";
    $query .= "user_email = '${user_email}', ";
    $query .= "user_role = '${user_role}' ";
    $query .= "WHERE user_id = {$this_user_id} ";

    $edit_user_query = mysqli_query($connection, $query);
    checkQuery($edit_user_query);
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_handle">Username</label>
        <input class="form-control" type="text" name="user_handle" value="<?php echo $user_handle; ?>">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input class="form-control" type="text" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input class="form-control" type="text" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input class="form-control" type="email" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
        <label for="user_password">New Password</label>
        <input class="form-control" type="password" name="user_password" value="">
    </div>
    <div class="form-group">
        <select name="user_role">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php
if ($user_role == "Admin")
{
    echo "<option value='User'>User</option>";
}
else
{
    echo "<option value='Admin'>Admin</option>";
}
?>
        </select>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>
</form>
