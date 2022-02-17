<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>home</title>
</head>

<body>
    <a href="add.php">Add</a>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Track</th>
            <th>Gender</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php

            $dsn = 'mysql:dbname=php_course;host=127.0.0.1;port=3306;';
            $user = 'admin';
            $password = '12345678';

            try {
                $db = new PDO($dsn, $user, $password);
                $query = "select * from students";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $stds=$stmt->fetchAll(PDO::FETCH_OBJ);
                

                // while ($std = $stmt->fetchObject()) {
                foreach($stds as $std){
                    echo "
                    <tr>
                        <td>" . $std->id . "</td>
                        <td>" . $std->firstName . "</td>
                        <td>" . $std->lastName . "</td>
                        <td>" . $std->track . "</td>
                        <td>" . $std->gender . "</td>
                        <td>
                            <a href='edit.php?index=" . $std->id  . "'>Edit</a>
                            <a  onclick='deleteStd($std->id)' >Delete</a>
                        </td>
                    </tr>
                ";
                }

                //close query
                $stmt->closeCursor();

                //close connection
                $db=null;
                
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
    <script src="./delete.js" ></script>
</body>

</html>