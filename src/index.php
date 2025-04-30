<?php
declare(strict_types = 1);

require 'helper.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ежедневник</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1>Список дел</h1>
        <form action="add.php" method="post">
            <input type="text" name="task" id="task" placeholder="Нужно сделать..." class="form-control">
            <button type="submit" name="sendTask" class="btn btn-success">Отправить</button>
        </form>

        <?php
        $pdo = getPDO();
        echo '<ul>';
        $query = $pdo->query('SELECT * FROM work_list ORDER BY id DESC');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo '<li><b>'.$row->task.'</b></li>';
        }
        echo '</ul>';
        ?>

    </div>

</body>
</html>