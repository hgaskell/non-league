<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<?php
if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password))
    {
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT randSalt FROM users";
        $select_randsalt_query = mysqli_query($connection, $query);
        if (!$select_randsalt_query)
        {
            die("QUERY FAILED!" . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randsalt_query);

        $salt = $row['randSalt'];
        $password = crypt($password, $salt);

        $query = "INSERT INTO users (user_handle, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}','{$email}','{$password}','User' )";
        $register_user_query = mysqli_query($connection, $query);

        if (!$register_user_query)
        {
            die("QUERY FAILED! " . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }

        $message = "<div><h6>Registration Succesful</h6><a href='admin'>Go to admin</a></div>";

        $query = "SELECT * FROM users WHERE user_handle = '{$username}' ";
        $select_user_query = mysqli_query($connection, $query);

        if (!$select_user_query)
        {
            die("QUERY FAILED!" . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($select_user_query))
        {
            $db_id = $row['user_id'];
            $db_username = $row['user_handle'];
            $db_password = $row['user_password'];
            $db_firstname = $row['user_firstname'];
            $db_lastname = $row['user_lastname'];
            $db_role = $row['user_role'];
        }

        $password = crypt($password, $db_password);

        $_SESSION['user_id'] = $db_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['role'] = $db_role;

    }
    else
    {
        $message = "Missing fields";
    }
}
else
{
    $message = "";
}
?>
    
    <?php include "includes/navigation.php"; ?>

    <div class="registration">
        <div class="registration-form">
            <h1>Register</h1>
            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                </div>
                    <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
                    <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                </div>
                <button type="submit" name="submit" id="btn-login" class="btn btn-primary" value="Register">Register</button>
            </form>
            <?php echo $message; ?>
        </div>
        
    </div>




<?php include "includes/footer.php"; ?>
