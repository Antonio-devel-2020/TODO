<?php 
    include_once'conexion.php';

    /** Bringing data from list table */
    $sql_read = 'SELECT * FROM list';
    $sent = $pdo->prepare($sql_read);
    $sent->execute();
    $result = $sent->fetchAll();

    /** Statement to change the form */
    if($_GET){
        $id = $_GET['id'];
        $sql_unique = 'SELECT * FROM list WHERE id=?';
        $sent_unique = $pdo->prepare($sql_unique);
        $sent_unique->execute(array($id));
        $result_unique = $sent_unique->fetchAll();

        // var_dump($resultado_unico);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Todo</title>
</head>
<body>
    
    <nav>
        <h1>TODO LIST</h1>
    </nav>
    <div class="container">

        <div class="card-form">
            <!-- Form for adding new tasks -->
            <?php if(!$_GET): ?>
                <h1>Add new task</h1>
                <form action="./scripts/insert.php" method="POST" id="form">
                    <input type="text" name="description" placeholder="Write task" id="text">
                    <input type="submit" value="Add task" id="button">
                </form>
            <?php endif ?>

            <!-- Form for updatting tasks -->
            <?php if($_GET): ?>
                <h2 id="up">Update task</h2>
                    <?php foreach($result_unique as $unique_data): ?>
                        <form action="./scripts/update.php" method="GET" id="form">
                            <input type="text" name="description" placeholder="Write task" id="text" value="<?php echo $unique_data['description'] ?>">
                            <input type="hidden" name="id" value="<?php echo $unique_data['id'] ?>">
                            <input type="submit" value="Update task" id="update-task">
                        </form>
                    <?php endforeach ?>
            <?php endif ?>
        </div>

        <!-- List with all the pending tasks -->
        <div class="card-list">
            <h2>All my tasks</h2>
            <div class="content" id="content">
                    <table>
                        <thead>
                            <tr>
                                <th>Task number</th>
                                <th>Task description</th>
                                <th>Update task</th>
                                <th>Task completed</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($result as $data): ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['description'] ?></td>
                                <td><a href="index.php?id=<?php echo $data['id'] ?>" class="update">Update</a></td>
                                <td><a href="./scripts/delete.php?id=<?php echo $data['id'] ?>" class="delete">Completed</a></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
            </div>
        </div>

    </div>

    <!-- <script src="JS/app.js"></script> -->
</body>
</html>