<?php


$json = file_get_contents('todo.json');
$todoArray = json_decode($json, true);

$todoName = $_POST['todo_name'];

unset($todoArray[$todoName]);
file_put_contents('todo.json', json_encode($todoArray,JSON_PRETTY_PRINT));

header('Location: index.php');