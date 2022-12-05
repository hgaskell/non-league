<?php
if (isset($_GET['m_id']))
{
    $this_message_id = $_GET['m_id'];
}

$player_user_id = $_SESSION['user_id'];
$query = "SELECT * from players WHERE player_user_id = $player_user_id";
$select_user_id = mysqli_query($connection, $query);
checkQuery($select_user_id);
while ($row = mysqli_fetch_assoc($select_user_id))
{
    $player_id = $row['player_id'];

    $query = "SELECT * from messages WHERE message_player_id = $player_id AND message_id = $this_message_id";
    $select_opened_messages_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_opened_messages_query))
    {
        $message_id = $row['message_id'];
        $message_sender = $row['message_sender'];
        $message_email = $row['message_email'];
        $message_content = substr($row['message_content'], 0, 50);
        $message_date = $row['message_date'];
        $message_status = $row['message_status'];
    }
}
?>
    <h3>From: <strong><?php echo $message_sender . " - " ?></strong><?php echo $message_email; ?></h3>
    <p>Date: <?php echo $message_date; ?></p>
    <p> <?php echo $message_content; ?> </p>
    <div>
        <a href='messages.php?delete=<?php echo $this_message_id; ?>'>Delete</a>
        <a href='messages.php'>Back to Inbox</a>
    </div>
<?php delete_message(); ?>
<?php mark_message_read(); ?>
