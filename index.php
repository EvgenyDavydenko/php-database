<?php

require_once __DIR__ . '/Database.php';
$config = require_once __DIR__ . '/config.php';

$db = new Database($config);

if (isset($_POST['title']) && ($_POST['content'])) {
    $insert = $db->query("INSERT INTO posts (title, content) VALUES (:title, :content)",[
        'title' => $_POST['title'],
        'content' => $_POST['content']
    ]);
}

$query = $db->query('SELECT * FROM posts ORDER BY id DESC');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post" action="">
        <input type="text" name="title"><br>
        <textarea name="content"></textarea><br>
        <button type="submit">Add</button>
    </form>

    <div>
        <?php foreach ($query as $post): ?>
            <div>
                <h2><?= $post['title']?></h2>
                <p><?= $post['content']?></p>
            </div>
        <?php endforeach ?>
    </div>

</body>
</html>

