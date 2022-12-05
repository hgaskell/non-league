<div class="col-xs-6">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sender</th>
                <th>Email</th> 
                <th>Date</th>
                <th>Player</th>
                <th>Status</th>
                <th>Delete</th>
                <th>Open</th>
            </tr>
        </thead>
        <tbody>
        <?php get_all_messages(); ?>
        </tbody>
    </table>
    
    <?php delete_message(); ?>
    
</div>