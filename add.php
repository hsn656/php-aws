<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>add</title>
</head>

<body>
    <form method="POST">
        <a href="index.php">Back</a>
        <p>
            <input type="text" placeholder="first name" name="firstName">
        </p>
        <p>
            <input type="text" placeholder="last name" name="lastName">
        </p>
        <p>
            <input type="text" placeholder="track" name="track">
        </p>
        <p>
            <input type="text" placeholder="gender" name="gender">
        </p>
        <input type="submit" name="save" value="Save">
    </form>

    <?php
    if (isset($_POST['save'])) {
        $dsn = 'mysql:dbname=php_course;host=127.0.0.1;port=3306;';
        $user = 'admin';
        $password = '12345678';
        try {


            $db = new PDO($dsn, $user, $password);
            $query = "INSERT INTO `php_course`.`students` (`firstName`, `lastName`, `track`, `gender`) VALUES (:stdFName, :stdLName, :stdTrack, :stdGender)";

            $stmt = $db->prepare($query);
            $stmt->execute([
                'stdFName' => $_POST['firstName'],
                'stdLName' => $_POST['lastName'],
                'stdTrack' => $_POST['track'],
                'stdGender' => $_POST['gender']
            ]);

            $stmt->closeCursor();
            $db = null;

            header('location: index.php');
            exit;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    ?>

</body>

</html>