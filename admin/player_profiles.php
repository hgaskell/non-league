<?php include "includes/admin_header.php"; ?>


    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

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
    case "add_player_profile";
    include "add_player_profile.php";
break;

case "edit_player_profile";
include "edit_player_profile.php";
break;

case "200";
echo "NICE 200";
break;

default:
    include "includes/view_all_player_profiles.php";

break;

}

?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php"; ?>
