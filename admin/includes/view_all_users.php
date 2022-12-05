<div class="col-xs-6">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Delete</th>
                <th>Edit</th>

            </tr>
        </thead>
        <tbody>
        <?php get_all_users(); ?>
        </tbody>
    </table>
    <?php delete_user(); ?>
</div>