<?php
require_once('../main/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $total_records = $dbCon->query('SELECT count(tourid) as total FROM tour')->fetchColumn();
        $limit = 4;
        $total_pages = ceil($total_records / $limit);
        $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

        if ($current_page < 1) {
            $current_page = 1;
        } elseif ($current_page > $total_pages) {
            $current_page = $total_pages;
        }

        $start = ($current_page - 1) * $limit;

        $stmt = $dbCon->prepare("SELECT *, DATEDIFF(thoigianve, thoigiandi) AS duration FROM tour LIMIT :start, :limit");
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $response = array(
            'total_pages' => $total_pages,
            'current_page' => $current_page,
            'tours' => $data
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
    }
}
?>