<?php

// a) Khai báo mảng NhanVien
$init_nv = [
    'id' => null,
    'hoten' => null,
    'tuoi' => null,
    'hsl' => null
];


// b) Hàm khởi tạo thông tin cho một đối tượng nhân viên
function khoiTaoNhanVien($id, $hoten, $tuoi, $hsl)
{
    return [
        'id' => $id,
        'hoten' => $hoten,
        'tuoi' => $tuoi,
        'hsl' => $hsl
    ];
}

// c) Hàm khởi tạo thông tin cho nhiều đối tượng nhân viên
function khoiTaoNhieuNhanVien($danhSach)
{
    $mangNhanVien = [];
    foreach ($danhSach as $nv) {
        $mangNhanVien[] = khoiTaoNhanVien($nv[0], $nv[1], $nv[2], $nv[3]);
    }
    return $mangNhanVien;
}

// d) Hàm tạo bảng table để hiển thị thông tin nhiều nhân viên
function taoBangNhanVien($danhSachNhanVien, $style = 'random')
{
    $html = '<table class="employee-table">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>ID</th>';
    $html .= '<th>Họ tên</th>';
    $html .= '<th>Tuổi</th>';
    $html .= '<th>Hệ số lương</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';

    foreach ($danhSachNhanVien as $index => $nv) {
        if ($style === 'random') {
            $bgColor = taoMauNgauNhien();
            $html .= '<tr style="background-color: ' . $bgColor . '">';
        } else {
            $class = taoMauChanLe($index);
            $html .= '<tr class="' . $class . '">';
        }

        $html .= '<td>' . $nv['id'] . '</td>';
        $html .= '<td>' . $nv['hoten'] . '</td>';
        $html .= '<td>' . $nv['tuoi'] . '</td>';
        $html .= '<td>' . number_format($nv['hsl'], 1) . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody>';
    $html .= '</table>';

    return $html;
}

// e) Hàm tạo màu ngẫu nhiên cho dòng dữ liệu
function taoMauNgauNhien()
{
    $red = rand(100, 255);
    $green = rand(100, 255);
    $blue = rand(100, 255);

    return 'rgb(' . $red . ',' . $green . ',' . $blue . ')';
}

// f) Hàm tạo màu chẵn lẻ cho bảng
function taoMauChanLe($index)
{
    return ($index % 2 == 0) ? 'even-row' : 'odd-row';
}
