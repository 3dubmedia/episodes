<?php
$db = new PDO("mysql:host=localhost;dbname=shows", "dbuser", "dbpassword");
$data = json_decode(file_get_contents('php://input'));

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $uid=$_GET['uid'];
    $statement = $db->prepare("SELECT * FROM episodes where uid = :uid");
    $statement->execute(array(':uid' => $uid));
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    echo json_encode($statement->fetchAll(PDO::FETCH_OBJ));
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "INSERT INTO episodes (title,season,episode,uid) values (:title,:season,:episode,:uid)";
    $query = $db->prepare($sql);
    $query->bindParam(':title', $title);
    $query->bindParam(':season', $season);
    $query->bindParam(':episode', $episode);
    $query->bindParam(':uid', $uid);

    $title = $data->title;
    $season = $data->season;
    $episode = $data->episode;
    $uid = $data->uid;

    $query->execute();

    $result['id'] = $db->lastInsertId();
    echo json_encode($result);
}

if ($_SERVER['REQUEST_METHOD'] == "PUT"){
    $sql = "UPDATE episodes SET title = :title,season = :season,episode = :episode WHERE id = :id";
    $query = $db->prepare($sql);
    $query->execute(array(":title"=>$data->title, ":id"=>$data->id, ":season"=>$data->season, ":episode"=>$data->episode));
}
 
if ($_SERVER['REQUEST_METHOD'] == "DELETE"){
    $sql = "DELETE FROM episodes WHERE id = :id";
    $query = $db->prepare($sql);
    $query->execute(array(":id"=>$_GET['id']));
}
?>