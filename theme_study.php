<?php require "header.php";?>

<div class="container my-5">
    <h3><b style='color: red; font-weight: bolder;'>PHẦN MỀN KHOÁ HỌC</b></h3>
    <p>PHẦN MỀN CHUYÊN VỀ KHOÁ HỌC</p>

<div>
<div class ="container my-5">
    <div class="card-container">
        <div class="card-container">
            <div class="card">
                <h3>PYTHON CƠ BẢN</h3>
                <p>Netus proin orci ligula sociosqu ut hac magnis.</p>
                <img src="image0.jpg" alt="Dịch vụ doanh nghiệp">
                <a href="#" class="explore-button">Khám phá</a>
            </div>
            <div class="card">
                <h3>THỊ GIÁC MÁY TÍNH </h3>
                <p>Netus proin orci ligula sociosqu ut hac magnis.</p>
                <img src="image2.jpg" alt="Dịch vụ cá nhân">
                <a href="#" class="explore-button">Khám phá</a>
            </div>
            <div class="card">
                <h3>PHẦN MỀN QUẢN TRỊ DOANH NGHIỆP</h3>
                <p>Netus proin orci ligula sociosqu ut hac magnis.</p>
                <img src="image3.jpg" alt="Hỗ trợ khách hàng">
                <a href="#" class="explore-button">Khám phá</a>
            </div>
            <div class="card">
                <h3>Hỗ trợ khách hàng</h3>
                <p>Netus proin orci ligula sociosqu ut hac magnis.</p>
                <img src="image3.jpg" alt="Hỗ trợ khách hàng">
                <a href="#" class="explore-button">Khám phá</a>
            </div>
        </div>
    </div>
</div>

<style> 
    /* body{
        padding: 80px;
        background-color: #f8f9fa;
    }     */
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center; /* Align items in the center */
    }

    .card {
        flex: 0 1 40%; /* 40% width to make the cards smaller */
        box-sizing: border-box;
        margin: 10px; /* Add margin between cards */
        padding: 1rem; /* Add padding inside the card */
        border: 1px solid #ccc; /* Add a border for better visibility */
        border-radius: 8px; /* Rounded corners for a cleaner look */
        background-color: #f9f9f9; /* Light background color */
    }

    .card img {
        width: 100%;
        border-radius: 10px;
    }
    .explore-button {
        font-size: 12px; /* Make the font size smaller */
        padding: 5px 10px; /* Adjust padding to make the button smaller */
        border: 1px solid #007bff; /* Add a border */
        border-radius: 4px; /* Rounded corners for a cleaner look */
        background-color: #007bff; /* Button background color */
        color: white; /* Button text color */
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Make the button inline */
        margin-top: 10px; /* Add some space above the button */
    }


</style>

<?php require "footer.php";?>