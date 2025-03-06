<title>Danh Sách Đại Lý ROSA</title>

<?php
    require "header.php";
    require "data/dealers.php"; // Giả sử bạn đã có dữ liệu đại lý trong file dealers.php

    // Khởi tạo biến
    $selectedProvince = $_POST['province'] ?? '';  // Đảm bảo giá trị province được giữ lại
    $selectedDistrict = $_POST['district'] ?? '';  // Đảm bảo giá trị district được giữ lại nếu có
    $agencies = [];
    $agencyDetail = null;
    $agencyIndex = $_POST['agencyIndex'] ?? null; // Lấy agencyIndex từ form POST

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy tỉnh và quận từ form
        $selectedProvince = $_POST['province'] ?? '';
        $selectedDistrict = $_POST['district'] ?? ''; // Lấy quận/huyện từ form
    
        // Nếu tỉnh được chọn, xử lý danh sách quận
        if ($selectedProvince && isset($agencyList[$selectedProvince])) {
            // Nếu quận được chọn, hiển thị đại lý của quận đó
            if ($selectedDistrict && isset($agencyList[$selectedProvince][$selectedDistrict])) {
                $agencies = $agencyList[$selectedProvince][$selectedDistrict];
            } else {
                // Nếu không chọn quận, hiển thị tất cả đại lý của tỉnh
                $agencies = [];
                foreach ($agencyList[$selectedProvince] as $districtAgencies) {
                    $agencies = array_merge($agencies, $districtAgencies);
                }
            }
    
            // Xử lý hiển thị chi tiết đại lý nếu có
            if ($agencyIndex === null && count($agencies) > 0) {
                $agencyIndex = 0; // Chọn đại lý đầu tiên mặc định
            }

            if ($agencyIndex !== null && isset($agencies[$agencyIndex])) {
                $agencyDetail = $agencies[$agencyIndex]; // Lấy thông tin chi tiết của đại lý
            }
        }
    }
?>



<style>
/* Cấu trúc chung cho trang */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    /* padding: 40px; Đảm bảo padding nhỏ cho điện thoại */
    background-color: #f9f9f9;
    box-sizing: border-box; /* Đảm bảo padding được tính vào chiều rộng và chiều cao */
}

/* Cấu trúc chung cho các phần tử trong trang */
.container {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 84px auto;
    flex-direction: row; /* Các phần tử sẽ nằm trên cùng một hàng */
    flex-wrap: wrap; /* Cho phép các phần tử cuộn xuống khi không đủ chỗ */
    box-sizing: border-box;
    padding: 10px; /* Đảm bảo padding cho container */
}

/* Cấu trúc cho các panel (left và right) */
.left-panel, .right-panel {
    width: 48%;
    box-sizing: border-box;
    padding: 15px; /* Thêm padding để văn bản không bị sát biên */
}

/* Thiết lập padding cho các label, select và button */
label, select, button {
    display: block;
    margin: 10px 0;
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
}

/* Button */
button {
    background-color: #FF0000;
    color: white;
    cursor: pointer;
    border: none;
    margin-top: 20px;
    padding: 15px; /* Padding lớn hơn cho button trên điện thoại */
    font-size: 1.2em; /* Kích thước font chữ lớn hơn */
}

/* Danh sách đại lý */
.agency-list {
    list-style-type: none;
    padding: 0;
}

.agency-list li {
    padding: 15px; /* Padding lớn hơn để dễ nhìn và nhấp chuột */
    background-color: #f2f2f2;
    margin-bottom: 10px;
    cursor: pointer;
}

/* Chi tiết đại lý */
.agency-detail {
    background-color: white;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

.agency-detail p {
    font-size: 1.1em;
}

/* Bản đồ (Google Maps) */
.map iframe {
    width: 100%;
    height: 300px;
    border: none;
}

.selected-agency {
        background-color: #5CACEE !important;
        color: black;
    }

    .agency-list li {
        padding: 15px;
        background-color: #f2f2f2;
        margin-bottom: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .agency-list li:hover {
        background-color: #ddd;
    }

    .agency-detail {
        background-color: white;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

/* Responsive cho màn hình nhỏ (Điện thoại, max-width: 768px) */
@media (max-width: 768px) {
    body {
        padding: 10px; /* Đảm bảo padding nhỏ cho điện thoại */
    }

    .container {
        flex-direction: column; /* Các phần tử sẽ xếp chồng lên nhau khi màn hình nhỏ */
        padding: 10px; /* Thêm padding cho container */
    }

    .left-panel, .right-panel {
        width: 100%; /* Mỗi panel sẽ chiếm 100% chiều rộng trên điện thoại */
        padding: 15px; /* Thêm padding cho các panel */
    }

    label, select, button {
        font-size: 1.2em; /* Kích thước font lớn hơn cho các phần tử */
        padding: 15px; /* Padding lớn hơn cho các phần tử */
    }

    .agency-list li {
        font-size: 1.1em; /* Tăng kích thước font cho danh sách đại lý */
        padding: 15px; /* Thêm padding lớn cho các item trong danh sách */
    }
    button {
        padding: 15px; /* Button lớn hơn */
        font-size: 1.3em; /* Font chữ lớn hơn */
    }

    .agency-detail p {
        font-size: 1em;
        padding: 10px; /* Thêm padding cho các đoạn văn */
    }

    .map iframe {
        height: 250px; /* Giảm chiều cao bản đồ trên điện thoại */
    }
}

</style>
<div class="container">
    <div class="left-panel">
        <form method="POST">
        <h3 style="color: #FF0000;">Danh Sách Đại lý ROSA</h3>
            <!-- Dropdown Tỉnh/Thành phố -->
            <label for="province">Chọn Tỉnh/Thành phố:</label>
            <select id="province" name="province" onchange="this.form.submit()">
                <option value="">-- Tỉnh/Thành phố --</option>
                <?php foreach ($agencyList as $city => $districts): ?>
                    <option value="<?= $city ?>" <?= $selectedProvince == $city ? 'selected' : '' ?>><?= $city ?></option>
                <?php endforeach; ?>
            </select>

           <!-- Dropdown Quận/Huyện -->
        <label for="district">Chọn Quận/Huyện:</label>
        <select id="district" name="district" onchange="this.form.submit()">
            <option value="">-- Quận/Huyện --</option>
                <?php 
                // Kiểm tra nếu tỉnh đã được chọn, hiển thị các quận của tỉnh đó, nếu không thì để trống
                if ($selectedProvince) {
                    foreach (array_keys($agencyList[$selectedProvince]) as $district): ?>
                        <option value="<?= $district ?>" <?= $selectedDistrict == $district ? 'selected' : '' ?>><?= $district ?></option>
                    <?php endforeach; 
                }
                ?>
        </select>   
                <!-- <button type="submit">Xem danh sách đại lý</button> -->
            </form>

        


 <!-- Hiển thị danh sách đại lý -->
 <?php if ($selectedProvince && !empty($agencies)): ?>
            <ul class="agency-list">
                <?php foreach ($agencies as $index => $agency): ?>
                    <li id="agency-<?= $index ?>" onclick="selectAgency(<?= $index ?>)">
                        <?= $agency[0] ?> - <?= $agency[1] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif ($selectedProvince && empty($agencies)): ?>
        <?php endif; ?>
    </div>

    <!-- Hiển thị chi tiết đại lý -->
    <?php if ($agencyDetail): ?>
        <div class="right-panel agency-detail">
            <h3 style="color: #FF0000;"><?= $agencyDetail[0] ?></h3>
            <p><strong>Địa chỉ:</strong> <?= $agencyDetail[1] ?></p>
            <p><strong>Số điện thoại:</strong> <?= $agencyDetail[2] ?></p>
            <p><strong>Website:</strong> <a href="<?= $agencyDetail[3] ?>" target="_blank"><?= $agencyDetail[3] ?></a></p>
            <?php if ($agencyDetail[4]): ?>
                <div class="map">
                    <iframe src="<?= $agencyDetail[4] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            <?php else: ?>
                <p>Chưa có địa chỉ Google Maps</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<script>
    // JavaScript xử lý việc chọn đại lý
    function selectAgency(index) {
        // Tạo form để gửi thông tin đến server
        const form = document.createElement('form');
        form.method = 'POST'; // Gửi dữ liệu dưới dạng POST
        form.action = ''; // Gửi đến chính trang này

        // Thêm dữ liệu cần thiết vào form
        form.innerHTML = `
            <input type="hidden" name="province" value="<?= $selectedProvince ?>" /> 
            <input type="hidden" name="district" value="<?= $selectedDistrict ?>" /> 
            <input type="hidden" name="agencyIndex" value="${index}" />
        `;

        // Gửi form khi người dùng chọn đại lý
        document.body.appendChild(form);
        form.submit(); // Gửi yêu cầu

        // Thay đổi màu sắc các đại lý (nút)
        const agencies = document.querySelectorAll('.agency-list li');
        agencies.forEach((agency, idx) => {
            agency.classList.remove('selected-agency'); // Xóa màu của các đại lý khác
            if (idx === index) {
                agency.classList.add('selected-agency'); // Thêm màu cho đại lý được chọn
            }
        });
    }

    // Nếu có đại lý được chọn mặc định, thêm lớp selected
    document.addEventListener('DOMContentLoaded', function() {
        const selectedAgencyIndex = <?= $agencyIndex ?? -1 ?>;
        if (selectedAgencyIndex >= 0) {
            const agencyItem = document.getElementById('agency-' + selectedAgencyIndex);
            if (agencyItem) {
                agencyItem.classList.add('selected-agency');
            }
        }
    });
</script>




<script>
    async function loadAgencies() {
        try {
            const response = await fetch("..//data/dealers.php"); // Gọi API
            const agencies = await response.json();

            // Kiểm tra nếu dữ liệu bị rỗng
            if (!agencies || agencies.length === 0) {
                document.getElementById('agency-list').innerHTML = "<p>Không có đại lý nào.</p>";
                return;
            }

            // Hiển thị danh sách đại lý
            let agencyList = document.getElementById('agency-list');
            agencyList.innerHTML = agencies.map(agency => `
                <h3>${agency.name}</h3>
                <p>${agency.address}</p>
                <hr>
            `).join('');

            // Hiển thị bản đồ với vị trí đại lý
            let map = L.map('map').setView([10.7769, 106.7009], 6); // Trung tâm Việt Nam
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            agencies.forEach(agency => {
                L.marker([agency.latitude, agency.longitude])
                    .addTo(map)
                    .bindPopup(`<b>${agency.name}</b><br>${agency.address}`);
            });
        } catch (error) {
            console.error("Lỗi tải dữ liệu:", error);
            document.getElementById('agency-list').innerHTML = "<p>Lỗi tải dữ liệu.</p>";
        }
    }

    loadAgencies();
</script>
<?php require "footer.php"; ?>

