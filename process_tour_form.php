<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "tour5"; 

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = $_POST["ten"];
    $phone_number = $_POST["phone"];
    $email = $_POST["email"];
    $tour_name = $_POST["tentour"];
    $area = $_POST["area"];
    $address = $_POST["address"];
    $limit = $_POST["limit"];
    $unlimit = $_POST["unlimit"];
    $start_date = $_POST["start"];
    $end_date = $_POST["end"];
    $tour_price = $_POST["money"];
    $tour_detail = $_POST["chitiet"];
    $image = $_POST["image"];
    $images = $_POST["images"];
    $ngay1 = $_POST["ngay1"];
    $imagengay1 = $_POST["imagengay1"];
    $ndngay1 = $_POST["ndngay1"];
    $ngay2 = $_POST["ngay2"];
    $imagengay2 = $_POST["imagengay2"];
    $ndngay2 = $_POST["ndngay2"];
    $ngay3 = $_POST["ngay3"];
    $imagengay3 = $_POST["imagengay3"];
    $ndngay3 = $_POST["ndngay3"];
    $ngay4 = $_POST["ngay4"];
    $imagengay4 = $_POST["imagengay4"];
    $ndngay4 = $_POST["ndngay4"];
    $ngay5 = $_POST["ngay5"];
    $imagengay5 = $_POST["imagengay5"];
    $ndngay5 = $_POST["ndngay5"];
    $ngay6 = $_POST["ngay6"];
    $imagengay6 = $_POST["imagengay6"];
    $ndngay6 = $_POST["ndngay6"];
    $ngay7 = $_POST["ngay7"];
    $imagengay7 = $_POST["imagengay7"];
    $ndngay7 = $_POST["ndngay7"];

    $sql = "INSERT INTO tour (adminname, adminphone, mail, tentour, area, tendiadiem, gioihannguoi, soluongtrong, thoigiandi, thoigianve, giatour, chitiet, image, images, ngay1, imagengay1, ndngay1, ngay2, imagengay2, ndngay2, ngay3, imagengay3, ndngay3, ngay4, imagengay4, ndngay4, ngay5, imagengay5, ndngay5, ngay6, imagengay6, ndngay6, ngay7, imagengay7, ndngay7) VALUES ('$admin_name', '$phone_number', '$email', '$tour_name', '$area', '$address', '$limit', '$unlimit', '$start_date', '$end_date', '$tour_price', '$tour_detail', '$image', '$images', '$ngay1', '$imagengay1','$ndngay1', '$ngay2', '$imagengay2','$ndngay2', '$ngay3', '$imagengay3','$ndngay3', '$ngay4', '$imagengay4','$ndngay4', '$ngay5', '$imagengay5','$ndngay5', '$ngay6', '$imagengay6','$ndngay6','$ngay7', '$imagengay7','$ndngay7')";
    
    // if ($conn->query($sql) === TRUE) {
        $last_admin_id = $conn->insert_id;
        if ($conn->query($sql) === TRUE) { // This line executes the query again
            echo "<h1>Tour created successfully</h1>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
    else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    $conn->close();
}
?>
