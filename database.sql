SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Tạo bảng 'order'
CREATE TABLE `order` (
    `order_id` INT AUTO_INCREMENT PRIMARY KEY,
    `order` TEXT NOT NULL,
    `customer_name` VARCHAR(255) NOT NULL,
    `customer_phone` VARCHAR(20) NOT NULL, 
    `customer_email` VARCHAR(255) NOT NULL,
    `shipping_method` VARCHAR(255) NOT NULL,
    `delivery_address` VARCHAR(500),
    `customer_note` VARCHAR(1000),
    `status` VARCHAR(1000),
    `formatted_order_id` TEXT, -- Cột lưu định dạng dd/mm/yy/order_id
    `order_date` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Tạo bảng `baohanh`
CREATE TABLE `baohanh` (
    
)

-- Định nghĩa delimiter cho trigger
DELIMITER //

-- Tạo trigger để tự động định dạng 'formatted_order_id'
CREATE TRIGGER `before_insert_order`
BEFORE INSERT ON `order`
FOR EACH ROW
BEGIN
    DECLARE order_increment INT;
    DECLARE random_string CHAR(6);

    -- Lấy giá trị AUTO_INCREMENT từ bảng 'order'
    SELECT AUTO_INCREMENT
    INTO order_increment
    FROM information_schema.TABLES
    WHERE TABLE_NAME = 'order'
    AND TABLE_SCHEMA = DATABASE();
    -- SET random_string = SUBSTRING(CONCAT(
    --     CHAR(FLOOR(65 + (RAND() * 26))), -- Chữ cái viết hoa ngẫu nhiên
    --     CHAR(FLOOR(97 + (RAND() * 26))), -- Chữ cái viết thường ngẫu nhiên
    --     CHAR(FLOOR(48 + (RAND() * 10))), -- Số ngẫu nhiên
    --     CHAR(FLOOR(65 + (RAND() * 26))),
    --     CHAR(FLOOR(97 + (RAND() * 26))),
    --     CHAR(FLOOR(48 + (RAND() * 10)))
    -- ), 1, 6);
    -- Định dạng 'formatted_order_id' với ngày tháng hiện tại và order_id
    SET NEW.formatted_order_id = CONCAT(
        DATE_FORMAT(NOW(), '%d%m%y%H%i%S'), 
        order_increment
    );
END;
//

-- Đổi lại delimiter về dấu chấm phẩy
DELIMITER ;

-- Kết thúc giao dịch
COMMIT;
