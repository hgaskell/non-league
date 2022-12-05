<div class="col-xs-6">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>DOB</th>
                <th>Position</th>
                <th>Region</th>
                <th>Bio</th>
                <th>Email</th>
                <th>Height</th>
                <th>Preferred Foot</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
if ($_SESSION['role'] == "Admin")
{
    get_all_players();
}
else if ($_SESSION['role'] == "User")
{
    get_user_players();
}
?>
        </tbody>
    </table>
    <?php delete_player(); ?>
</div>
