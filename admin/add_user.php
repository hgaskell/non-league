<?php create_user(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_handle">Username</label>
        <input class="form-control" type="text" name="user_handle">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input class="form-control" type="text" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input class="form-control" type="text" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input class="form-control" type="email" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input class="form-control" type="password" name="user_password">
    </div>
    <div class="form-group">
        <select name="user_role">
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>