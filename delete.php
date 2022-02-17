<?php


if (!empty($_GET["index"])) {
    $dsn = 'mysql:dbname=php_course;host=127.0.0.1;port=3306;';
    $user = 'admin';
    $password = '12345678';

    try {
        $db = new PDO($dsn, $user, $password);
        $query = "DELETE FROM students WHERE (id = :stdId)";
        $stmt = $db->prepare($query);

        $stmt->execute(["stdId" => $_GET["index"]]);
        $stmt->closeCursor();
        $db = null;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
} else {
    header("location: index.php");
    exit;
}
