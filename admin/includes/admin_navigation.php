<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Home</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#profiles"><i class="fa fa-fw fa-arrows-v"></i>Profiles<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="profiles" class="collapse">
                            <li>
                                <a href="./player_profiles.php?source=add_player_profile">Add Profile</a>
                            </li>
                            <li>
                                <a href="./player_profiles.php">View All Profiles</a>
                            </li>
                        </ul>
                    </li>
                    <?php
$user_role = $_SESSION['role'];
if ($user_role == 'User')
{
    echo '
                            <li>
                                <a href="./messages.php"><i class="fa fa-fw fa-envelope"></i>Inbox</a>
                            </li>';
}
?>
                    <?php
$user_role = $_SESSION['role'];
if ($user_role == 'Admin')
{
    echo '
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i>Users<i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="users" class="collapse">
                                    <li>
                                        <a href="users.php">View All Users</a>
                                    </li>
                                    <li>
                                        <a href="users.php?source=add_user">Add User</a>
                                    </li>
                                </ul>
                            </li>';
}
?>
                    <li>
                        <a href="./profile.php"><i class="fa fa-fw fa-dashboard"></i>Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
