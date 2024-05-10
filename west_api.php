<?php
require_once('../main/connect.php');
try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $sql = "SELECT * FROM tour WHERE area LIKE 'Westside Viet Nam'";
        $stmt = $dbCon->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');

        echo json_encode($results);
    }
} catch (PDOException $e) {
    echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
}
?>
