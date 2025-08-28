<?php
require_once 'functions.php';

// c) Khởi tạo mảng nhiều nhân viên
$danhSachNhanVien = khoiTaoNhieuNhanVien([
    [1, 'Nguyen Van A', 25, 3.2],
    [2, 'Tran Thi B', 28, 3.5],
    [3, 'Le Van C', 32, 4.0],
    [4, 'Pham Thi D', 27, 3.3],
    [5, 'Hoang Van E', 35, 4.2],
    [6, 'Vo Thi F', 29, 3.6],
    [7, 'Dang Van G', 31, 3.8],
    [8, 'Bui Thi H', 26, 3.1],
]);

// Lấy style từ form submission, mặc định là 'random'
$currentStyle = isset($_POST['colorStyle']) ? $_POST['colorStyle'] : 'random';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Nhân viên</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Danh sách Nhân viên</h1>

        <form method="POST" action="" class="controls">
            <label>
                <input type="radio" name="colorStyle" value="random" <?php echo $currentStyle === 'random' ? 'checked' : ''; ?>>
                Màu ngẫu nhiên
            </label>
            <label>
                <input type="radio" name="colorStyle" value="alternating" <?php echo $currentStyle === 'alternating' ? 'checked' : ''; ?>>
                Màu chẵn lẻ
            </label>
            <button type="submit">Đổi kiểu màu</button>
        </form>

        <div id="tableContainer">
            <?php
            // Hiển thị bảng với style được chọn
            echo taoBangNhanVien($danhSachNhanVien, $currentStyle);
            ?>
        </div>
    </div>
</body>

</html>