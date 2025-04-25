<?php
// Kết nối CSDL
$host = "localhost";
$user = "root";         // Tài khoản mặc định của Laragon
$pass = "";             // Mật khẩu mặc định thường để trống
$db   = "loi_chuc_db";  // Tên CSDL bạn đã tạo

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

// Nhận dữ liệu từ form
$ten = $_POST['ten'] ?? '';
$loi_chuc = $_POST['loi_chuc'] ?? '';

if ($ten && $loi_chuc) {
    $stmt = $conn->prepare("INSERT INTO loi_chuc (ten, loi_chuc) VALUES (?, ?)");
    $stmt->bind_param("ss", $ten, $loi_chuc);
    $stmt->execute();
    echo "ok";
} else {
    echo "Thiếu thông tin!";
}

$conn->close();
?>
