<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Tools</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }
        h2 {
            color: #d70000;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            /* text-align: center; */
        }
        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .card-content {
            padding: 15px;
        }
        .card h3 {
            margin: 10px 0;
            font-size: 18px;
        }
        .card p {
            font-size: 14px;
            color: #555;
        }
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>AI Tools.</h2>
        <p>Khám phá những công cụ do Rosa phát triển trên nền tảng AI.</p>
        <div class="grid">
            <div class="card">
                <img src="chatbot.jpg" alt="Chatbots IT Dealer">
                <div class="card-content">
                    <h3>Chatbots IT Dealer</h3>
                    <p>Trợ lý tư vấn khách hàng đại lý chuyên ngành IT</p>
                </div>
            </div>
            <div class="card">
                <img src="scheduling.jpg" alt="AI Scheduling Assistants">
                <div class="card-content">
                    <h3>AI Scheduling Assistants</h3>
                    <p>Trợ lý lập kế hoạch sale hàng ngày cho bạn</p>
                </div>
            </div>
            <div class="card">
                <img src="stock.jpg" alt="AI Stock Whisperers">
                <div class="card-content">
                    <h3>AI Stock Whisperers</h3>
                    <p>Trợ lý kiểm soát tồn kho sản phẩm linh kiện IT</p>
                </div>
            </div>
            <div class="card">
                <img src="predictive.jpg" alt="AI Predictive Analytics">
                <div class="card-content">
                    <h3>AI Predictive Analytics</h3>
                    <p>Trợ lý phân tích nhu cầu thị trường bán sỉ SP IT</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
