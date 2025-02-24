<?php
ob_start();
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function exportToExcel($result, $start_date, $end_date) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Tạo tiêu đề cho file Excel
    $sheet->setCellValue('A1', 'Mã hàng');
    $sheet->setCellValue('B1', 'Tên hàng');
    $sheet->setCellValue('C1', 'Số Serial');
    $sheet->setCellValue('D1', 'Ngày c.từ');
    $sheet->setCellValue('E1', 'Thoi han bh');

    // Lặp qua kết quả và xuất ra file Excel
    $row = 2; // Bắt đầu từ dòng 2 để bỏ tiêu đề
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['Tenhang']);
        $sheet->setCellValue('B' . $row, $data['Mahang']);
        $sheet->setCellValue('C' . $row, $data['SoSerial']);
        $sheet->setCellValue('D' . $row, $data['NgayXuat']);
        $sheet->setCellValue('E' . $row, $data['ThoiHanBH']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename = 'File Bao Hanh ' . $start_date . "_" . $end_date . '.xlsx';

    // Xuất file Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    ob_end_clean();
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    ob_end_flush();
    exit();
}

// Kiểm tra xem có dữ liệu được gửi từ biểu mẫu không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kết nối đến cơ sở dữ liệu MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "123";

    // Kết nối đến MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    } 

    // Lấy ngày bắt đầu và kết thúc từ biểu mẫu
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Kiểm tra giá trị ngày
    if (empty($start_date) || empty($end_date)) {
        die("Ngày bắt đầu và kết thúc không được để trống.");
    }

    // Sử dụng Prepared Statements để bảo vệ khỏi SQL Injection
    $stmt = $conn->prepare("SELECT SoSerial, MaHang, TenHang, NgayXuat, ThoiHanBH FROM sanpham WHERE NgayXuat BETWEEN ? AND ?");
    
    if ($stmt === false) {
        die("Lỗi chuẩn bị truy vấn: " . $conn->error);
    }

    $stmt->bind_param("ss", $start_date, $end_date);
    
    if (!$stmt->execute()) {
        die("Lỗi thực thi truy vấn: " . $stmt->error);
    }
    $result = $stmt->get_result();
    // Kiểm tra số lượng hàng trả về
    if ($result->num_rows > 0) {
        // Kiểm tra số lượng trả về
        if ($result->num_rows <= 100000) {
            // Gọi hàm xuất Excel
            exportToExcel($result, $start_date, $end_date);
        } else {
            echo "<script>alert('Không thể xuất file excel, do số lượng sản phẩm lớn hơn 100,000'); window.location.href='';</script>";
        }
    } else {
        echo "<script>alert('Không có dữ liệu để xuất.'); window.location.href='';</script>";
        
    }
    
    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>