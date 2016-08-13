<?php
$db = new PDO("mysql:host=localhost;dbname=shows", "dbuser", "dbpassword");
$data = json_decode(file_get_contents('php://input'));

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "INSERT INTO users (username,password) values (:username,:password)";
    $query = $db->prepare($sql);
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);

    $username = $data->username;
    $password = $data->password;
    $query->execute();

    $result['id'] = $db->lastInsertId();
    echo json_encode($result);
}
?>