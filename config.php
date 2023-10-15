<?php
$dsn = "mysql:host=localhost;dbname=user";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $pdo->prepare("INSERT INTO info (first_name, last_name, age, active, married, height, description, image_path) 
                           VALUES (:first_name, :last_name, :age, :active, :married, :height, :description, :image_path)");

   $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image_path"]["name"]);
    move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file);


    $stmt->bindParam(':first_name', $_POST['first_name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':age', $_POST['age']);
    $i = isset($_POST['active']) ? 1 : 0;
    $stmt->bindParam(':active', $i);
    $stmt->bindParam(':married', $_POST['married'], PDO::PARAM_INT);
    $stmt->bindParam(':height', $_POST['height']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->bindParam(':image_path', $target_file);
    $stmt->execute();


    if ($i == 1) { 
        $activeUsersStmt = $pdo->prepare("INSERT INTO active_users (first_name, last_name) 
                                          VALUES (:first_name, :last_name)");

        $activeUsersStmt->bindParam(':first_name', $_POST['first_name']);
        $activeUsersStmt->bindParam(':last_name', $_POST['last_name']);
        $activeUsersStmt->execute();
    }

    echo "User added successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
