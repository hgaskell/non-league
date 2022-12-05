<div class="col-md-4">

<?php
if (!isset($_SESSION['user_id']))
{
    echo '
<div class="well d-flex justify-content-end">
    
    <form action="includes/login.php" method="post">
    <a href="#" id="showLogin">Login</a>
        <div class="login-form position-absolute">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Username">
            </div>
            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="input-group-btn">
                    <button name="login" class="btn btn-primary" type="submit">
                        Login
                    </button>
                </span>
            </div>
        </div>
    </form>
    <span class="px-1">/</span>
    <a href="registration.php">Create an Account</a>
</div>';
}
else
{
    echo '
    <div class="d-flex justify-content-end">
        <ul class="nav navbar-nav">
            <li class="px-2"><a href="admin"><i class="fa fa-user"></i></a></li>
            <li><a href="includes/logout.php"><i class="fa fa-arrow-from-left"></i></a></li>
        </ul>
    </div>
    ';
}

?>

    <div class="new_col_helper">
        <?php
if (isset($_GET['p_id']))
{
    $this_player_id = $_GET['p_id'];
}
?>
    </div>


</div>
