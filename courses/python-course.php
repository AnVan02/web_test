<title>PYTHON BASIC</title>
<?php require "../header.php"; ?>
    <style>
      /* Đảm bảo các phần tử trong trang web dễ đọc trên thiết bị di động */
/* Đảm bảo các phần tử trong trang web dễ đọc trên thiết bị di động */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    color: #1a201a;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 5%;
    color: #e30613;
}

.nav-links {
    list-style: none;
    display: flex;
    z-index: 1000;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    color: #080808;
    text-decoration: none;
    font-weight: bold;
    padding: 0 10px;
}

.nav-links a:hover {
    color: #3498db;
}

.menu-toggle {
    display: none;
    font-size: 1.8rem;
    cursor: pointer;
}

.logo h1 {
    font-size: 2.5rem;
    font-weight: bold;
    letter-spacing: 1px;
}

.about, .target {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 50px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    flex-wrap: wrap;  /* Ensure wrapping on small screens */
}

.content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 200px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    flex-wrap: wrap;  /* Ensure wrapping on small screens */
}

.content:hover, .about:hover, .target:hover {
    transform: scale(1.05);
}

.text-content, .about-content, .target_content {
    max-width: 50%;
    padding: 20px;
    box-sizing: border-box;
}

.text-content h2, .about-content h2, .target_content h2 {
    font-size: 48px;
    margin: 0 0 20px 0;
    text-align: center;
}

.text-content p, .about-content p, .target_content p {
    font-size: 18px;
    margin: 0 0 20px 0;
}

.image-content, .image-about, .image_target {
    max-width: 50%;
}

.chapter {
    text-align: center;
    margin: 0 auto;
    padding: 40px;
    max-width: 800px;
    margin-bottom: 20px;
}

.chapter h2 {
    text-align: center;
    font-size: 48px;
    margin: 0 0 20px 0;
}

.roadmap {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

.roadmap::before {
    content: "";
    position: absolute;
    width: 4px;
    background-color: #e30613;
    top: 0;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}

.step {
    position: relative;
    background-color: #f9f9f9;
    border-radius: 15px;
    padding: 20px;
    margin: 20px 0;
    width: 80%;
    max-width: 500px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.step h3 {
    font-size: 1.5rem;
    color: #e30613;
    margin-bottom: 10px;
}

.step p {
    font-size: 1.1rem;
    color: #333;
}

.step::before {
    content: "";
    position: absolute;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #e30613;
    top: 20px;
    left: -10px;
}

.step:hover {
    transform: scale(1.05);
}

.step:nth-child(even) {
    align-self: flex-start;
    margin-right: auto;
}

.step:nth-child(odd) {
    align-self: flex-end;
    margin-left: auto;
}

.step:nth-child(odd)::before {
    left: calc(100% + 10px);
}

.step:nth-child(even)::before {
    right: calc(100% + 10px);
}

.tooltip_1, .tooltip_2 {
    display: none;
    position: absolute;
    top: 50%;
    left: 105%;
    transform: translateY(-50%);
    background-color: #f9f9f9;
    color: #0c0c0c;
    padding: 8px;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-size: 0.9rem;
    width: auto;
    max-width: 300px;
    word-wrap: break-word;
    overflow-wrap: break-word;
    white-space: normal;
    z-index: 1;
}

.step:hover .tooltip_1, .step:hover .tooltip_2 {
    display: block;
    opacity: 1;
}



/* Thiết lập CSS cho thiết bị di động */
@media (max-width: 768px) {
    nav {
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-links {
        display: none;
        flex-direction: column;
        gap: 10px;
        background-color: #888787;
        position: absolute;
        top: 100px;
        right: 5%;
        width: 90%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .nav-links.active {
        display: flex;
    }

    .menu-toggle {
        display: block;
    }

    .nav-links li {
        margin: 10px 0;
    }

    .content, .about, .target {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .text-content, .about-content, .target_content {
        max-width: 90%;
        margin: 0 auto;
    }

    .image-content img, .image-about img, .image_target img {
        width: 100%;
        height: auto;
    }

    .chapter {
        padding: 20px;
    }

    .roadmap {
        width: 100%;
        padding: 0;
    }

    .step {
        width: 90%;
        margin: 20px auto;
    }

    .step::before {
        display: none;
    }

    footer p {
        padding-left: 10px;
        padding-right: 10px;
    }
}

@media (max-width: 480px) {
    body {
        font-size: 14px;
    }

    .logo h1 {
        font-size: 1.8rem;
    }

    nav {
        padding: 10px 5%;
    }

    .nav-links a {
        font-size: 14px;
    }

    .content, .about, .target {
        padding: 20px;
    }

    .text-content h2, .about-content h2, .target_content h2 {
        font-size: 24px;
    }

    .text-content p, .about-content p, .target_content p, .step p {
        font-size: 16px;
    }

    .step h3 {
        font-size: 1.2rem;
    }

    footer p {
        padding-left: 10px;
        padding-right: 10px;
    }
    .content{
        margin-top: 100px;
    }
  
}


    </style>

    <div class="content">
        <div class="text-content">
            <h2>Khóa học python cơ bản</h2>
            <p>
                Khóa học Python cơ bản giúp bạn xây dựng nền tảng vững chắc trong lập trình Python. 
                Dành cho người mới bắt đầu, khóa học này bao gồm các khái niệm cốt lõi như biến, 
                vòng lặp, hàm, và cấu trúc dữ liệu căn bản. Từng bước, bạn sẽ học cách viết mã dễ hiểu, 
                hiệu quả và làm quen với những ứng dụng đơn giản. Đây là bước khởi đầu hoàn hảo để bạn 
                khám phá tiềm năng của Python và chuẩn bị sẵn sàng cho các cấp độ lập trình cao hơn!</p>
        </div>

        <div class="image-content">
            <img alt="Green snake coiled on a branch" height="400" src="/assets/upload/study/python_tutorial.png" width="600"/>
        </div>
    </div>

    <div class="about">
        <div class="image-about">
            <img alt="Green snake coiled on a branch" height="400" src="/assets/upload/study/about_content.png" width="600"/>
        </div>

        <div class="about-content">
            <h2>Giới thiệu khóa học</h2>
            <p>
                Khóa học này sẽ giúp bạn làm chủ các kiến thức nền tảng về Python, 
                từ cú pháp cơ bản đến việc sử dụng các thư viện phổ biến như NumPy và Pandas. 
                Với lộ trình bài bản, bạn sẽ nhanh chóng nắm vững các kỹ năng cốt lõi, 
                mở ra cánh cửa vào thế giới lập trình. Đây là lựa chọn lý tưởng cho những ai 
                mới bắt đầu, giúp bạn tự tin bước vào hành trình khám phá và chinh phục Python.
            </p>
            <p ><u><i>"Khóa học này đã được tích hợp sẵn trong phần mềm khi mua máy bộ ROSA, giúp bạn dễ dàng tiếp cận và học tập mà không cần cài đặt thêm."</i></u></p>
        </div>        
    </div>

    <div class="target">
        <div class="target_content">
            <h2>Mục tiêu khóa học</h2>
            <p>
                Mục tiêu của khóa học Python cơ bản là giúp người học xây dựng nền tảng vững chắc trong lập trình Python, 
                từ đó có thể phát triển kỹ năng trong các lĩnh vực khác như khoa học dữ liệu, phát triển web, và trí tuệ 
                nhân tạo. Khóa học sẽ hướng dẫn học viên từ những kiến thức cơ bản như cú pháp, biến, vòng lặp và hàm, 
                đến các khái niệm phức tạp hơn như xử lý dữ liệu, làm việc với tệp tin, và giới thiệu một số thư viện 
                phổ biến như NumPy và Pandas. Sau khóa học, người học sẽ có thể tự tin viết các chương trình Python cơ bản,
                hiểu rõ cách sử dụng ngôn ngữ này trong các dự án nhỏ và đặt nền móng cho các khóa học nâng cao hơn
            </p>
        </div>

        <div class="image_target">
            <img alt="Green snake coiled on a branch" height="400" src="/assets/upload/study/target_content.png" width="600"/>
        </div>
    </div>

    <div class="chapter">
        <h2>Nội dung khóa học</h2>
        <div class="roadmap">
            <div class="step">
                <h3>Chương 1</h3>
                <p>Giới thiệu chung về Python</p>
                
            </div>
            <div class="step">
                <h3>Chương 2</h3>
                <p>Cấu trúc điều kiện, vòng lặp và hàm trong Python</p>
            </div>
            <div class="step">
                <h3>Chương 3</h3>
                <p>Cấu trúc dữ liệu trong Python</p>
            </div>
            <div class="step">
                <h3>Chương 4</h3>
                <p>Module và Package</p>
            </div>
            <div class="step">
                <h3>Chương 5</h3>
                <p>Pandas</p>
            </div>
            <div class="step">
                <h3>Chương 6</h3>
                <p>Matplotlib</p>
            </div>
        </div>
    </div>
    <?php require "../footer.php"; ?>