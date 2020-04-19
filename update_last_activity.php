<?php

//update_last_activity.php

include('database_connection.php');

session_start();

$query =
"UPDATE login_details 
SET last_activity = now() + interval 34200 second 
WHERE login_details_id = " . $_SESSION['login_details_id'] . ";" ;

echo $query;

$statement = $connect->prepare($query);

$statement->execute();

?>
