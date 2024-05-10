<?php
require_once('../main/connect.php');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        if(isset($_GET["mailadmin"])) {
            $mailadmin = $_GET["mailadmin"];
            $sql = "SELECT tourid,tentour, chitiet, giatour,thoigiandi,  thoigianve,tendiadiem,area, image  , DATEDIFF(thoigianve, thoigiandi) AS duration FROM tour where mail = '$mailadmin'";
            $stmt = $dbCon->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            header('Content-Type: application/json');

            echo json_encode($results);
        }
    }
    } catch (PDOException $e) {
        echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
    }
?>