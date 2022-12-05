<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>

                <?php
if (isset($_GET['source']))
{
    $source = $_GET['source'];
}
else
{
    $source = '';
}

switch ($source)
{
    case "add_user";
    include "add_user.php";
break;

case "edit_user";
include "edit_user.php";
break;

default:
    include "includes/view_all_users.php";

break;

}

?>

            </div>
        </div>
    </div>

    <?php include "includes/admin_footer.php"; ?>
