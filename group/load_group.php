<?php
include('../config/db_connect.php');

$name = $_POST['n_id'];


$stmt = $conn->prepare("SELECT u.username, g.name 
 FROM user_group ug
 inner join users u on u.id = ug.user_id
 inner join groups g on g.id = ug.group_id 
 where g.name = '$name'");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();


if ($count > 0) {
    for($i=0; $i<$count; $i++) {
        $row = $rows[$i];
        echo "<li class='list-group-item list-group-item-action' onselect='selectMembers()'>".$row["username"]."</li>";
    }
}