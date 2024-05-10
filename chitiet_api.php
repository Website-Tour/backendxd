<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour5";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if(isset($_GET["idbaidang"])) {
    $idbaidang = $_GET["idbaidang"];

    $sql = "SELECT tentour, image, chitiet, ndchitiet";
    for ($i = 1; $i <= 7; $i++) {
        $sql .= ", ngay$i, ndngay$i, imagengay$i";
    }
    $sql .= " FROM tour WHERE tourid = $idbaidang";

    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $tour_info = array(
            "tentour" => $row['tentour'],
            "image" => $row['image'],
            "chitiet" => $row['chitiet'],
            "ndchitiet" => $row['ndchitiet']
        );
        for ($i = 1; $i <= 7; $i++) {
            $column_name = 'ngay' . $i;
            $tour_info[$column_name] = array(
                "ngay" => $row[$column_name],
                "nd" => $row['nd' . $column_name],
                "image" => $row['image' . $column_name]
            );
        }
        header('Content-Type: application/json');
        echo json_encode($tour_info);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Không tìm thấy thông tin tour."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Vui lòng cung cấp idbaidang."));
}

$conn->close();
?>
