<title>(CES 2025)Trên tay phiên bản GeForce RTX 5090 Founders Edition, chiến thần mới của NVIDIA </title>
<?php
function convertTitleToFileName($title) {
    // Thay thế các ký tự tiếng Việt có dấu thành không dấu
    $title = strtr($title, [
        'à'=>'a','á'=>'a','ạ'=>'a','ả'=>'a','ã'=>'a',
        'â'=>'a','ầ'=>'a','ấ'=>'a','ậ'=>'a','ẩ'=>'a','ẫ'=>'a',
        'ă'=>'a','ằ'=>'a','ắ'=>'a','ặ'=>'a','ẳ'=>'a','ẵ'=>'a',
        'è'=>'e','é'=>'e','ẹ'=>'e','ẻ'=>'e','ẽ'=>'e',
        'ê'=>'e','ề'=>'e','ế'=>'e','ệ'=>'e','ể'=>'e','ễ'=>'e',
        'ì'=>'i','í'=>'i','ị'=>'i','ỉ'=>'i','ĩ'=>'i',
        'ò'=>'o','ó'=>'o','ọ'=>'o','ỏ'=>'o','õ'=>'o',
        'ô'=>'o','ồ'=>'o','ố'=>'o','ộ'=>'o','ổ'=>'o','ỗ'=>'o',
        'ơ'=>'o','ờ'=>'o','ớ'=>'o','ợ'=>'o','ở'=>'o','ỡ'=>'o',
        'ù'=>'u','ú'=>'u','ụ'=>'u','ủ'=>'u','ũ'=>'u',
        'ư'=>'u','ừ'=>'u','ứ'=>'u','ự'=>'u','ử'=>'u','ữ'=>'u',
        'ỳ'=>'y','ý'=>'y','ỵ'=>'y','ỷ'=>'y','ỹ'=>'y',
        'đ'=>'d',
        'À'=>'A','Á'=>'A','Ạ'=>'A','Ả'=>'A','Ã'=>'A',
        'Â'=>'A','Ầ'=>'A','Ấ'=>'A','Ậ'=>'A','Ẩ'=>'A','Ẫ'=>'A',
        'Ă'=>'A','Ằ'=>'A','Ắ'=>'A','Ặ'=>'A','Ẳ'=>'A','Ẵ'=>'A',
        'È'=>'E','É'=>'E','Ẹ'=>'E','Ẻ'=>'E','Ẽ'=>'E',
        'Ê'=>'E','Ề'=>'E','Ế'=>'E','Ệ'=>'E','Ể'=>'E','Ễ'=>'E',
        'Ì'=>'I','Í'=>'I','Ị'=>'I','Ỉ'=>'I','Ĩ'=>'I',
        'Ò'=>'O','Ó'=>'O','Ọ'=>'O','Ỏ'=>'O','Õ'=>'O',
        'Ô'=>'O','Ồ'=>'O','Ố'=>'O','Ộ'=>'O','Ổ'=>'O','Ỗ'=>'O',
        'Ơ'=>'O','Ờ'=>'O','Ớ'=>'O','Ợ'=>'O','Ở'=>'O','Ỡ'=>'O',
        'Ù'=>'U','Ú'=>'U','Ụ'=>'U','Ủ'=>'U','Ũ'=>'U',
        'Ư'=>'U','Ừ'=>'U','Ứ'=>'U','Ự'=>'U','Ử'=>'U','Ữ'=>'U',
        'Ỳ'=>'Y','Ý'=>'Y','Ỵ'=>'Y','Ỷ'=>'Y','Ỹ'=>'Y',
        'Đ'=>'D'
    ]);

    // Chuyển sang chữ thường
    $title = strtolower($title);

    // Thay thế các ký tự không phải chữ hoặc số bằng dấu gạch ngang
    $title = preg_replace('/[^a-z0-9\s]+/u', '', $title);
    $title = preg_replace('/\s+/', '-', $title);

    return $title . '.php';
}

// Tiêu đề bài viết
$tieuDeBaiViet = "(CES 2025)Trên tay phiên bản GeForce RTX 5090 Founders Edition, chiến thần mới của NVIDIA";

// Tên file mới
$tenFileMoi = convertTitleToFileName($tieuDeBaiViet);


// Đổi tên file
$tenFileCu = 'tintuc37.php';

// if (!file_exists($tenFileCu)) {
//     echo "Lỗi: File cũ ($tenFileCu) không tồn tại.<br>";
// } else {
//     if (!is_writable($tenFileCu)) {
//         echo "Lỗi: Không có quyền ghi trên file cũ ($tenFileCu).<br>";
//     } else {
//         if (rename($tenFileCu, $tenFileMoi)) {
//             echo "Đổi tên file thành công: $tenFileMoi<br>";
//         } else {
//             echo "Lỗi: Không thể đổi tên file.<br>";
//         }
//     }
// }
?>

<?php require "../header.php" ?>
<section class="news-detail">
    <h1>(CES 2025) Trên tay phiên bản GeForce RTX 5090 Founders Edition, chiến thần mới của NVIDIA</h1>
    <div class="meta">
        <span>Tác giả: Admin</span> | 
        <span>Ngày đăng: 09/01/2025</span>
    </div>
     <p>
          Tại CES Quốc tế 2025, chúng tôi đã có cơ hội trải nghiệm thực tế với card đồ họa NVIDIA GeForce RTX 5090 Founders Edition "Blackwell" mới. Sản phẩm này có kích thước rất lớn — dài và cao hơn RTX 4090 FE, nhưng lại có đổ dày mỏng hơn so với phiên bản 4090 , độ dày của chiếc card mà Nvidia giới thiệu lần này chỉ là  2 khe cắm. Điều này là do các nhà thiết kế của NVIDIA đã tìm ra cách bù đắp diện tích tản nhiệt bị mất do làm mỏng card bằng cách kéo dài nó theo các hướng khác. Card vẫn giữ được phong cách thẩm mỹ đặc trưng của các dòng Founders Edition từ hai thế hệ trước, quay lại thời điểm của dòng RTX 30, nhưng thay đổi về khái niệm luồng không khí hai chiều.
     </p>
     <img src="/assets/upload/news/37c.png" alt="AMD Ra Mắt GPU Radeon RX 9070 XT & RX 9070">

     <p>
          Trong khi các thế hệ trước sử dụng một quạt hút gió ở một bên, thổi vào PCB, và một quạt khác ở cuối backplate hút không khí qua tản nhiệt và ra phía sau, RTX 5090 FE có hai quạt lớn, cả hai đều thổi không khí lạnh qua tản nhiệt và ra phía sau card. PCB nằm ở trung tâm của card và dựa vào một bộ PCB phụ cho giao diện máy chủ và các đầu ra hiển thị.
     </p>

     <p>
          Thành phần lớn nhất trên PCB, chiếm gần 1/3 diện tích bo mạch, là GPU "GB202", nền tảng của RTX 5090. GPU này có số lượng chân cắm rất lớn không chỉ để đáp ứng nhu cầu năng lượng mà còn cho giao diện bộ nhớ GDDR7 512-bit. Ở một góc của PCB, nhô ra từ phía trên của bộ làm mát, là đầu vào nguồn 12V2x6 của card, có công suất định mức 600 W (chúng tôi vẫn chưa biết tổng công suất điện của RTX 5090).    
     </p>

     <p>
          Card sử dụng giải pháp VRM với 19 pha cho VGPU và 8 pha cho bộ nhớ. Tương tự như một bo mạch GPU AI, NVIDIA đã áp dụng kỹ thuật PCB mật độ cao, không để phí phạm không gian ở cả hai mặt của PCB. Các cuộn cảm và DRMOS (do MPS sản xuất) nằm ở mặt trên, bao quanh GPU ở ba mặt; và các tụ điện nằm ở mặt dưới.    
     </p>

     <p>
          Mặt dưới của PCB có các kết nối dẫn đến hai thành phần phụ. Một kết nối với PCB có chân vàng PCI-Express 5.0 x16. Kết nối khác dẫn đến bộ chia I/O hiển thị. Cả hai kết nối đều được thực hiện bằng cáp ruy băng mỏng giống như loại dùng trong laptop, và được dẫn dọc theo các cạnh của bộ làm mát, để không cản trở luồng không khí.   
     </p>
    <div class="tdb-block-inner">
      <ul class="tdb-tags" style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">
        <li style="margin-right: 15px; font-weight: bold; font-size: 16px; color: #333;">
          <span>Tags:</span>
        </li>
         <li style="margin-right: 10px;">
            <a href="" style="text-decoration: none; font-size: 14px; color: #FF0000; padding: 5px 5px">#CES2025</a>
         </li>
         
        <li style="margin-right: 10px;">
          <a href="https://www.nvidia.com/vi-vn/geforce/" style="text-decoration: none; font-size: 14px; color: #FF0000; padding: 5px 5px">#NVIDIA</a>
        </li>
        
        <li style="margin-right: 10px;">
          <a href="https://rosacomputer.vn/" style="text-decoration: none; font-size: 14px; color: #FF0000; padding: 5px 5px">#ROSA</a>
        </li>
        
        <li style="margin-right: 10px;">
          <a href="https://rosacomputer.vn/product.php" style="text-decoration: none; font-size: 14px; color: #FF0000; padding: 5px 5px">#MAYBO</a>
        </li>
        
      </ul>
    </div>
   
        
     <p><em>Nguồn: <a href="https://www.techpowerup.com/330857/nvidia-geforce-rtx-5090-founders-edition-hands-on-taken-apart">NVIDIA GeForce RTX 5090 Founders Edition Hands On, Taken Apart</a></em></p>   

   
</section>

<style>
    /* Reset */
    body, h1, h2, p, ul, li, a, img {
    margin: 0;
    padding: 0;
    font-size:16px;
    list-style: none;
    text-decoration: none;
    box-sizing: border-box;
    }

    body {
    font-family: 'Arial', sans-serif;
    line-height: 1.8;
    color: #333;
    background: #f9f9f9;
    margin: 0;
    }


    /* News Detail Section */
    .news-detail {
    padding: 110px 10%;
    background: #fff;
    border-radius: 8px;
    margin: 30px auto;
    max-width: 1200px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .news-detail h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    color: #222;
    }

    .news-detail .meta {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 20px;
    }

    .news-detail img {
    width:90%;
    border-radius: 8px;
    margin-bottom: 20px;
    }

    .news-detail h2 {
    margin-top: 30px;
    font-size: 1.8rem;
    color: #ec4242;
    }

    .news-detail p {
    margin: 15px 0;
    line-height: 1.8;
    }
 

    .news-detail blockquote {
    margin: 30px 0;
    padding: 20px;
    font-style: italic;
    background: #f1f1f1;
    border-left: 4px solid #eb4747;
    }

</style>


<?php require "../footer.php" ?>