<?php
$todoArray = [];
if (file_exists('todo.json')) {
$json = file_get_contents('todo.json');
$todoArray = json_decode($json, true);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="h1-wrapper">
        <h1>To do list Php</h1>
    </div>

    <div class="todo-add-form-container">
        <form action="newtodo.php" method="post">
            <input type="text" name="todo_name" id="todo_name" placeholder="Enter your todo" required>
            <input type="submit" value="Add new">
        </form>
    </div>
    <div class="row">

        <?php foreach ($todoArray as $todoName => $todo) {?>
        <div class="col-lg-4 col-md-6 col-sm-12 <?php echo $todo['completed']?'disabled':''?>">
            <div class="topic-wrapper">
                <form action="change_status.php" method="post" style="display: inline-block;">
                    <input type="hidden" name="todo_name" value="<?php echo $todoName?>">
                    <div class="topic-up"> <input type="checkbox" <?php echo $todo['completed']? 'checked':''?>></div>
                </form>
            </div>
            <p><?php echo $todoName?></p>
            <form action="delete.php" method="post" style="display: inline-block;">
                <input type="hidden" name="todo_name" value="<?php echo $todoName?>">
                <div class="delete-button-wrapper">
                    <div class="topic-down"> <input type="image" src="img/trash-green.png" alt="Submit"
                            style="width: 20px;" />
                    </div>
                </div>
            </form>
        </div>
        <?php }?>
    </div>
</body>

</html>