<?php
// Kết nối CSDL
$host = "localhost";
$user = "root";
$pass = "";
$db   = "loi_chuc_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

// Truy vấn dữ liệu
$result = $conn->query("SELECT ten, loi_chuc, ngay_gui FROM loi_chuc ORDER BY id DESC");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Trả dữ liệu dạng JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
