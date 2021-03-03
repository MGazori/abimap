<?php
function insertLocation($data)
{
    global $pdo;
    $sql = 'INSERT INTO `locations` (`title`, `lat`, `lng`, `type`) VALUES (:title, :lat, :lng, :typ)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title' => $data['title'], ':lat' => $data['lat'], ':lng' => $data['lng'], ':typ' => $data['type']]);
    return $stmt->rowCount();
}
function getLocations($params = null)
{
    global $pdo;
    $condition = '';
    if (isset($params)) {
        $condition = "WHERE is_verified = $params";
    }
    $sql = "SELECT * FROM `locations` $condition";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->FetchAll(PDO::FETCH_OBJ);
}
