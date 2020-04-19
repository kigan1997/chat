<?php

//insert_chat.php

include('database_connection.php');

session_start();

$data = array(
 ':to_user_id'  => $_POST['to_user_id'],
 ':from_user_id'  => $_SESSION['user_id'],
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);

/*$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status) 
VALUE (:to_user_id, :from_user_id, :chat_message, :status);
";*/

$query = 'INSERT INTO chat_message (to_user_id, from_user_id, chat_message,status) VALUE ('.$_POST['to_user_id'].', '.$_SESSION['user_id'].', "'.$_POST['chat_message'].'", 1);';

$statement = $connect->prepare($query);

//if($statement->execute($data))
/*if($statement->execute())
{
    echo 'send';
 //echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
} else echo 'error inserting';
*/

try{
    $statement->execute();
    echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
?>