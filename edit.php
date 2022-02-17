<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>edit</title>
</head>

<body>

    <?php
    if (!empty($_GET["index"])) {
        $stdId = $_GET["index"];
        $dsn = 'mysql:dbname=php_course;host=127.0.0.1;port=3306;';
        $user = 'admin';
        $password = '12345678';
        try {
            $db = new PDO($dsn, $user, $password);
            $query = "SELECT * FROM students WHERE id= :stdId";
            $stmt = $db->prepare($query);
            $stmt->execute(["stdId" => $stdId]);
            $std = $stmt->fetchObject();
            $stmt->closeCursor();
            $db = null;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    } else {
        header("location: index.php");
        exit;
    }
    ?>

    <form method="POST">
        <a href="./index.php">Back</a>
        <p>
            <input type="hidden" placeholder="id" name="id" value="<?php echo $std->id; ?>">
        </p>
        <p>
            <input type="text" placeholder="first name" name="firstName" value="<?php echo $std->firstName; ?>">
        </p>
        <p>
            <input type="text" placeholder="last name" name="lastName" value="<?php echo $std->lastName; ?>">
        </p>
        <p>
            <input type="text" placeholder="track" name="track" value="<?php echo $std->track; ?>">
        </p>
        <p>
            <input type="text" placeholder="gender" name="gender" value="<?php echo $std->gender; ?>">
        </p>
        <input type="submit" name="save" value="Save">
    </form>

    <?php
    if (isset($_POST['save'])) {
        $stdId = $_GET["index"];
        $dsn = 'mysql:dbname=php_course;host=127.0.0.1;port=3306;';
        $user = 'admin';
        $password = '12345678';
        try {
            $db = new PDO($dsn, $user, $password);
            $updateQuery = "UPDATE students SET firstName = :stdFName, lastName = :stdLName, track = :stdTrack, gender = :stdGender WHERE id= :stdId";
            $updateStmt = $db->prepare($updateQuery);
            $updateStmt->execute([
                'stdFName' => $_POST['firstName'],
                'stdLName' => $_POST['lastName'],
                'stdTrack' => $_POST['track'],
                'stdGender' => $_POST['gender'],
                "stdId" => $_POST["id"]
            ]);


            header('location: index.php');
            exit;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    ?>
</body>

</html>