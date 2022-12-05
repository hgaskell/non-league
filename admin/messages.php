<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username'] ?></small> 
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
    case "view_message";
    include "view_message.php";
break;

default:
    include "includes/view_all_messages.php";

break;

}

?>

            </div>
        </div>
    </div>

    <?php include "includes/admin_footer.php"; ?>
