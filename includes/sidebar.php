<div class="col-md-4">

<?php
if (!isset($_SESSION['user_id']))
{
    echo '
<div>
    <form class="account-section" action="includes/login.php" method="post">
    <a class="dropdown-toggle" id="showLogin">Login<i class="fas fa-chevron-down"></i></a></a>
        <div class="dropdown-menu login-menu">
            <div class="username-input">
                <input name="username" type="text" class="" placeholder="Username">
            </div>
            <div class="password-input">
                <input name="password" type="password" class="" placeholder="Password">
                <span class="">
                    <button name="login" class="btn-small" type="submit">
                        Login
                    </button>
                </span>
            </div>
        </div>
    </form>
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
