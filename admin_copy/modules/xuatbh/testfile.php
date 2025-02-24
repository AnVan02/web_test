<?php
ob_start();
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function exportFilePart($data, $start, $end, $filename) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set headers cho sheet
    $sheet->setCellValue('A1', 'Mã hàng');
    $sheet->setCellValue('B1', 'Tên hàng');
    $sheet->setCellValue('C1', 'Số Serial');
    $sheet->setCellValue('D1', 'Ngày c.từ');
    $sheet->setCellValue('E1', 'Thời hạn BH');

    // Điền dữ liệu vào sheet
    $row = 2;
    for ($i = $start; $i < $end; $i++) {
        $sheet->setCellValue('A' . $row, $data[$i]['MAHANG']);
        $sheet->setCellValue('B' . $row, $data[$i]['TENHANG']);
        $sheet->setCellValue('C' . $row, $data[$i]['SOSERIAL']);
        $sheet->setCellValue('D' . $row, $data[$i]['NGAYXUAT']);
        $sheet->setCellValue('E' . $row, $data[$i]['THOIHANBH']);
        $row++;
    }

    // Tự động điều chỉnh độ rộng cột
    foreach (range('A', 'E') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Kiểm tra và tạo thư mục "exports" nếu chưa tồn tại
    $exportDir = __DIR__ . '/exports/';
    if (!is_dir($exportDir)) {
        mkdir($exportDir, 0777, true);
    }

    // Lưu file vào thư mục trên server
    $writer = new Xlsx($spreadsheet);
    $file_path = $exportDir . $filename;
    $writer->save($file_path);

    return $filename; // Trả về tên file để hiển thị link tải xuống sau
}

function exportToExcel($result, $start_date, $end_date) {
    $data = [];
    while ($row_data = $result->fetch_assoc()) {
        $data[] = $row_data;
    }

    $total_rows = count($data);
    $start_date_formatted = str_replace('/', '-', $start_date);
    $end_date_formatted = str_replace('/', '-', $end_date);
    $files = [];

    if ($total_rows > 10000) {
        // Xuất file đầu tiên và lưu tên file
        $files[] = exportFilePart($data, 0, 10000, 'File_Bao_Hanh_' . $start_date_formatted . "_" . $end_date_formatted . '_1.xlsx');
        
        // Xuất file thứ hai và lưu tên file
        $files[] = exportFilePart($data, 10000, $total_rows, 'File_Bao_Hanh_' . $start_date_formatted . "_" . $end_date_formatted . '_2.xlsx');
    } else {
        // Xuất file nếu số lượng dưới 10000
        $files[] = exportFilePart($data, 0, $total_rows, 'File_Bao_Hanh_' . $start_date_formatted . "_" . $end_date_formatted . '.xlsx');
    }

    // Hiển thị liên kết tải xuống cho từng file
    echo "<h3>Tải xuống các file:</h3><ul>";
    foreach ($files as $file) {
        echo "<li><a href='exports/$file' download>$file</a></li>";
    }
    echo "</ul>";
}


function formatDate($date) {
    // Thử chuyển đổi với format d-m-Y
    $date_obj = DateTime::createFromFormat('d-m-Y', $date);
    if (!$date_obj) {
        // Nếu không thành công, thử với format d/m/Y
        $date_obj = DateTime::createFromFormat('d/m/Y', $date);
    }
    return $date_obj ? $date_obj->format('d/m/Y') : false;
}

function prepareStatement($conn, $start_date, $end_date) {
    // Chuyển đổi chuỗi ngày thành đối tượng DateTime
    $start_datetime = DateTime::createFromFormat('d/m/Y', $start_date);
    $end_datetime = DateTime::createFromFormat('d/m/Y', $end_date);
    
    // Format lại ngày để sử dụng trong truy vấn
    $start_date_formatted = $start_datetime->format('Y-m-d');
    $end_date_formatted = $end_datetime->format('Y-m-d');
    
    // Sử dụng CONVERT để chuyển đổi chuỗi ngày trong DB thành DATE để so sánh
    $sql = "SELECT TENHANG, MAHANG, SOSERIAL, NGAYXUAT, THOIHANBH 
            FROM sanpham 
            WHERE STR_TO_DATE(NGAYXUAT, '%d/%m/%Y') >= STR_TO_DATE(?, '%Y-%m-%d')
            AND STR_TO_DATE(NGAYXUAT, '%d/%m/%Y') <= STR_TO_DATE(?, '%Y-%m-%d')
            ORDER BY STR_TO_DATE(NGAYXUAT, '%d/%m/%Y') ASC";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $start_date_formatted, $end_date_formatted);
    
    function kiemtra ($conn, $start_date, $end_date){
        $date= DateTime:: createFromFormat ('d-m-Y', $date);
            
    }
      


    return $stmt;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "123";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    } 

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if (!empty($start_date) && !empty($end_date)) {
        $formatted_start_date = formatDate($start_date);
        $formatted_end_date = formatDate($end_date);

        // Debug log
        error_log("Start Date: " . $formatted_start_date);
        error_log("End Date: " . $formatted_end_date);

        if ($formatted_start_date && $formatted_end_date) {
            $stmt = prepareStatement($conn, $formatted_start_date, $formatted_end_date);

            if ($stmt === false) {
                die("Lỗi chuẩn bị truy vấn: " . $conn->error);
            }

            if (!$stmt->execute()) {
                die("Lỗi thực thi truy vấn: " . $stmt->error);
            }

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                exportToExcel($result, $formatted_start_date, $formatted_end_date);
            } else {
                echo "<script>alert('Không có dữ liệu để xuất trong khoảng thời gian này.'); window.location.href='';</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Định dạng ngày không hợp lệ. Vui lòng sử dụng định dạng dd-mm-yyyy.'); window.location.href='';</script>";
        }
    } else {
        echo "<script>alert('Vui lòng chọn ngày bắt đầu và ngày kết thúc.'); window.location.href='';</script>";
    }

    $conn->close();
}
?>