<?php
//EDIT CATEGORY
if (isset($_GET['edit']))
{
    $cat_id = $_GET['edit'];
    $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
    $get_category_id_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($get_category_id_query))
    {
        $cat_id = $row['cat_id'];
        $cat_name = $row['cat_name'];
?>
<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <input value="<?php echo $cat_name ?>" class="form-control" type="text" name="cat_title">
    </div>
    <?php
        if (isset($_POST['edit']))
        {
            $this_cat_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_name = '{$this_cat_title}' WHERE cat_id = {$cat_id} ";
            $edit_category_query = mysqli_query($connection, $query);
            header("Location: categories.php");
            if (!$edit_category_query)
            {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
?>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit" value="Edit Category">
    </div>
    <?php
    }
}
?>
</form>
