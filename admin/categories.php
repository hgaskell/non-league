<?php include "includes/admin_header.php"; ?>


    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>username</small>
                        </h1>
                    </div>
                </div>

                <div class="col-xs-6">
                <?php create_category(); ?> 
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add Category</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>

                    <?php
//UPDATE AND INCLUDE QUERY
if (isset($_GET['edit']))
{
    $cat_id = $_GET['edit'];

    include "includes/edit_categories.php";
}
?>
                </div>
                <div class="col-xs-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php get_all_categories(); ?>
                        <?php delete_category(); ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

    <?php include "includes/admin_footer.php"; ?>
