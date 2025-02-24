<title>Hướng dẫn sử dụng Stable Diffusion một cách đơn giản</title>
<?php require "../header.php" ?>
<section class="news-detail">
    <h1>Hướng dẫn sử dụng Stable Diffusion một cách đơn giản</h1>
    <div class="meta">
        <span>Tác giả: Admin</span> | 
        <span>Ngày đăng: 19/12/2024</span>
    </div>
    <h2>l. Giới thiệu các công cụ </h2>
    <p>
        Để sử dụng Stable Diffusion (SD), bạn cần biết các công cụ phổ biến để triển khai công nghệ này. Mỗi công cụ có ưu nhược điểm riêng, đáp ứng các nhu cầu khác nhau. Dưới đây là các công cụ phổ biến nhất:
    </p>

    <p style="color:red"><strong>1. Stable Diffusion WebUI (Automatic1111)</strong></p>
    <ul>
        <li>
            Ưu điểm : Dễ sử dụng, giao diện thân thiện nhiều extension hỗ trợ 
        </li>
        <li>
            Nhược điểm : Chưa tối ưu hoạt động khá nặng 
        </li>
    </ul>

    <img src="/assets/upload/news/Picture1.png" alt="Stable Diffusion">

    <p style="color:red"><strong>2. ComfyUI</strong></p>
    <ul>
        <li>
            Ưu điểm : Tạo quy trình làm việc phức tạp với giao diện kéo-thả. Phù hợp với các tác vụ lặp lại hoặc yêu cầu độ chi tiết cao
        </li>
        <li>
            Nhược điểm : Cần nhiều kiến thức để tự phát triển workflow.
        </li>
    </ul>
    <img src="/assets/upload/news/Picture2.png" alt="Stable Diffusion">

    <p style="color:red"><strong>3. Forge </strong></p>
    <ul>
        <li>
            Ưu điểm : Dựa trên Automatic nhưng nhẹ hơn. Hỗ trợ nhiều tính năng độc quyền như Layer Diffusion.
        </li>
        <li>
            Nhược điểm : Ít cập nhật, đôi khi thiếu công cụ mới.
        </li>

    </ul>
    <img src="/assets/upload/news/Picture3.png" alt="Stable Diffusion">

    <p style="color:red"><strong>4.	Fooocus </strong></p>
    <ul>
        <li>
            Ưu điểm : Dễ sử dụng, tối ưu cho SDXL.
        </li>
        <li>
            Nhược điểm : Không hỗ trợ tác vụ phức tạp hoặc cài thêm extension.
        </li>

    </ul>
    <img src="/assets/upload/news/Picture4.png" alt="Stable Diffusion">

    <p><b>Lời khuyên</b>Hãy cài đặt và thử nghiệm cả 4 công cụ nếu có thể để trải nghiệm sự khác biệt và chọn công cụ phù hợp nhất với nhu cầu của bạn.</p>
    
    <p>Ngoài ra, bạn có thể tham khảo thêm các công cụ khác như StableSwarmUI, SDFX, InvokeAI, VoltaML, SD.Next Web UI.</p>

    <h2>ll Cách cài đặt </h2>
    
    <p><strong>Cấu hình tối thiểu :</strong></p>
    
    <ul>
        <li>•	Card Nvidia từ 6GB VRAM trở lên (GTX 1060).</li>
        <li>•	Đề xuất từ 12GB VRAM trở lên (RTX 3060).</li>
    </ul>
    
    <h2>1.  Trường hợp máy không đủ cấu hình </h2>
    <p>Bạn có thể thuê máy chủ từ các dịch vụ </p>
    <ul>
        <p><strong>	Google Colab </strong></p>
        <p><strong>	Kaikun.io </strong></p>
        <p><strong>	Vast.ai | RunPod </strong></p>
        <p><strong>	AWS SageMaker | Kaggle</strong></p>
        <p><strong>	Tensord Art | Liblib | SeaArt | Shakker</strong></p>
    </ul>    
    <p><b>Lời khuyên</b>Với người mới, sử dụng Google Colab sẽ là lựa chọn dễ tiếp cận nhất. SDVN hiện đã phát triển các công cụ Google Colab tối ưu, bạn có thể tìm hướng dẫn chi tiết từ cộng đồng.</p>

    <h2>2.  Trường hợp máy đủ cấu hình </h2>
    <p><b>Lưu ý trướt khi cài đặt</b></p>
    <ul>
        <p style="color:red"><strong>• Không đặt đường dẫn cài đặt chứa dấu cách hoặc ký tự đặt biệt</strong></p>

    </ul>
    <p><b>  Truy cập trang GitHub Stability Matrix</b> và tải phiên bản phù hợp với hệ điều hành.</p>
    
    <img src="/assets/upload/news/Picture5.png" alt="Stable Diffusion">
    
    <p>
          Cài đặt và khởi tạo Stability Matri
    </p>
    
    <p>
         Cấu hình thư mục dữ liệu trong mục "Setting".
    </p>
    
    <img src="/assets/upload/news/Picture6.png" alt="Stable Diffusion">
    
    <p>
         Chọn và cài đặt các gói cần thiết
    </p>
    
    <img src="/assets/upload/news/Picture7.png" alt="Stable Diffusion">
    
    <p>
         Sau khi hoàn tất, truy cập đường dẫn server để sử dụng.
    </p>
    
    <img src="/assets/upload/news/Picture8.png" alt="Stable Diffusion">
    
    <p style="color:red">
        <b>a. Cài đặt Automatic 1111</b>
    </p>
    
    <p>
        1. Truy cập GitHub chính thức của Automatic1111.
    </p>
    
    <p>
        2. Làm theo hướng dẫn trong mục "Installation and Running
    </p>
    
    <img src="/assets/upload/news/Picture9.png" alt="Stable Diffusion">
    
    <p>
        3. Chọn một trong hai phương thức  
    </p>
        <ul>
            <li>Cài đặt với Python và Git tích hợp</li>
        </ul>
        
        <img src="/assets/upload/news/Picture10.png" alt="Stable Diffusion">
        
        <ul>
            <li>Cài đặt với Python và Git hệ thống (cần kiến thức cơ bản về Python) </li>
        </ul>
        
            <img src="/assets/upload/news/Picture11.png" alt="Stable Diffusion">
        <p>
        4.  Sau khi cài đặt, chạy tệp webui-user.bat. Đợi quá trình tải hoàn tất để nhận đường dẫn server và sử dụng trên trình duyệt.
        </p>
        <P>
        5.  Lưu ý với phương pháp cài đặt qua python hệ thống:
        </P>
            <ul>
            <li>
                	Phiên bản cài đặt python chỉ cần là 3.10 là được, mới nhất càng tốt, không cần phải là 3.10.6, python 3.11 vẫn dùng được nhưng có tỉ lệ lỗi.
            </li>
            <li>
                	Cài đặt python có thể cài bằng nhiều cách, ưu tiên cài đặt thông qua microsoft store (đối với window), thông qua mini anaconda (đối với mac)
            </li>
            <li>
                	Mọi người nên đọc qua về python, git ở phần sau trước khi sử dụng phương pháp này để cài
            </li>
            <li>
                	Trường hợp window hệ thống không nhận python (khi chạy webui-user.bat thấy báo không tìm thấy python). Chúng ta sẽ mở chỉnh sửa tệp webui-user.bat bằng notepad, nhập đường dẫn tệp python.exe vào dòng Python= (dòng này chỉ có tác dụng trong lần đầu chạy tệp webui-user.bat, từ lần sau automatic sẽ sử dụng python ở thư mục venv)
            </li>
        </ul>
    <p style="color:red"><b>b. Cài đặt ComfyUI</b></p>
            <ul>
                <li>1.	Truy cập GitHub chính thức của ComfyUI</li>
                <li>2.	Tải tệp nén (Portable) từ phần "Installing", sau đó giải nén.</li>
                <li>3.	Chạy tệp .bat trong thư mục "update" trước khi chạy tệp run.bat.</li>
                <li>4.	Tệp run.bat sẽ khởi tạo server để sử dụng ComfyUI. Luôn đảm bảo tệp này chạy trong quá trình sử dụng.</li>
            </ul>
            <img src="/assets/upload/news/Picture12.png" alt="Stable Diffusion">
        <p><b>Lưu ý</b> Nếu bạn sử dụng phương pháp cài đặt thủ công, hãy làm quen với giao diện dòng lệnh (CMD, Terminal), Python và Git.</p>
        
        
        #ROSA
        #MAYBOROSA
        #ROSAAI

</section>



<style>
    /* Reset */
    body, h1, h2, p, ul, li, a, img {
    margin: 0;
    padding: 0;
    font-size: 1rem;
    list-style: none;
    text-decoration: none;
    box-sizing: border-box;
    }

    body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
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
    width: 100%;
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