<title>ROSA OFFICE Ⅱ</title>

<?php
require '../data/products.php';
require '../data/dealers.php';
require '../data/api_urls.php';
require '../header.php';

$pcName = "ROSA OFFICE Ⅱ";

$thumbnail_list = [ "../assets/images/case_cpc_right_.jpg",
                    "../assets/images/case_cpc_inside1.jpg",
                    "../assets/images/case_cpc_front_.jpg"

];




// Create CPU list
$cpu_list = [$intel_i5_14400];

// Create MAINBOARD list
$main_list = [$asus_prime_b760_wifi_d5];

// Create RAM list
$ram_list = [$kingston_8g_5600_d5,$kingston_16g_5600_d5];

// Create SSD list
$ssd_list = [$kingston_500g_m2];

// Create CASE list
$case_list = [$coolerplus_cpcc09];

// Create monitor list
$monitor_list =[$no_monitor,$aoc_21,$aoc_24];

// Create keyboard & mouse list
$key_mouse_list = [$rosa_key_mouse];

// Create OS list
$os_list = [$free_dos];


// Update other expenses
$others->price += 449; // extra


$rosa_key_mouse->sub_note = "🎁 Tặng kèm";


// Default cart (Giỏ hàng mặc định)
$cart_list = [$intel_i5_14400, // CPU
              $asus_prime_b760_wifi_d5,  // MAIN
              $kingston_8g_5600_d5,    // RAM
              $kingston_500g_m2,  // SSD
              $rosa_key_mouse,   // KEYBOARD MOUSE
              $coolerplus_cpcc09,        // CASE
              $rosa_450w,        // PSU
              $free_dos,        // OS
              $no_monitor,       // MONITOR
              $others,
              $voucher_400k];    


?>


<head>
    <!-- Import utility functions -->
    <script src="utils.js?v=<?php echo time(); ?>"></script>

    <script>
        let n_pc = 1;
        let dealerSelected = false;

        // Cập nhật giỏ hàng mặc định
        let cart_list = <?php echo json_encode($cart_list); ?>;
        
        // Cập nhật đại lý ROSA
        const dealersROSA = <?php echo json_encode($agencyList, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
        
        // Cập nhật order URL
        const order_url = "<?php echo addslashes($order_url); ?>";

        // QUAN TRỌNG! 
        let cart = new Map();
        cart_list.forEach(product => {
            cart.set(product.type,product);
        });


    // Hàm cập nhật giỏ hàng
    function updateCart(){
        
        // Get all OS buttons
        const allOSButtons = document.querySelectorAll('input[name="os"]');
        // Lấy giá từ OS được chọn
        const selectedOS = document.querySelector('input[name="os"]:checked');
        // Filter out the selected radio button to get the unselected ones
        const unselectedOSs = Array.from(allOSButtons).filter(button => button !== selectedOS);
        if (selectedOS) {
            const osOption = selectedOS.closest('.config-option');
            let osProduct = JSON.parse(osOption.dataset.product);
            let osPrice = osProduct.price;
            let optionPrice = osOption.querySelector('.option-price');
            // update cart
            cart.set(osProduct.type,osProduct);
            // clear price display
            optionPrice.innerHTML = "";

            // Iterate over each unselected radio button
            unselectedOSs.forEach(button => {
                // find the parent option
                let osOptionUnselected = button.closest('.config-option');
                // get unselected price
                let osProductUnselected = JSON.parse(osOptionUnselected.dataset.product);
                let osPriceUnselected = osProductUnselected.price;
                // get price difference
                let priceDiff = osPriceUnselected - osPrice;
                // update display price difference
                let optionPriceUnselected = osOptionUnselected.querySelector('.option-price');
                let priceDisplay = formatPrice(priceDiff);
                if (priceDiff > 0){
                    priceDisplay = "+" + priceDisplay;
                }
                else if (priceDiff === 0){
                    priceDisplay = "";
                }
                optionPriceUnselected.innerHTML = priceDisplay;
            });
        }
        
        // Get all CPU buttons
        const allCpuButtons = document.querySelectorAll('input[name="cpu"]');
        // Lấy giá từ CPU được chọn
        const selectedCpu = document.querySelector('input[name="cpu"]:checked');
        // Filter out the selected radio button to get the unselected ones
        const unselectedCpus = Array.from(allCpuButtons).filter(button => button !== selectedCpu);
        if (selectedCpu) {
            const cpuOption = selectedCpu.closest('.config-option');
            let cpuProduct = JSON.parse(cpuOption.dataset.product);
            let cpuPrice = cpuProduct.price;
            let optionPrice = cpuOption.querySelector('.option-price');
            // update cart
            cart.set(cpuProduct.type,cpuProduct);
            // clear price display
            optionPrice.innerHTML = "";

            // Iterate over each unselected radio button
            unselectedCpus.forEach(button => {
                // find the parent option
                let cpuOptionUnselected = button.closest('.config-option');
                // get unselected price
                let cpuProductUnselected = JSON.parse(cpuOptionUnselected.dataset.product);
                let cpuPriceUnselected = cpuProductUnselected.price;
                // get price difference
                let priceDiff = cpuPriceUnselected - cpuPrice;
                // update display price difference
                let optionPriceUnselected = cpuOptionUnselected.querySelector('.option-price');
                let priceDisplay = formatPrice(priceDiff);
                if (priceDiff > 0){
                    priceDisplay = "+" + priceDisplay;
                }
                else if (priceDiff === 0){
                    priceDisplay = "";
                }
                optionPriceUnselected.innerHTML = priceDisplay;
            });
        }
        
        // Get all MAIN buttons
        const allMainButtons = document.querySelectorAll('input[name="main"]');
        // Lấy giá từ MAIN được chọn
        const selectedMain = document.querySelector('input[name="main"]:checked');
        // Filter out the selected radio button to get the unselected ones
        const unselectedMains = Array.from(allMainButtons).filter(button => button !== selectedMain);
        if (selectedMain) {
            const mainOption = selectedMain.closest('.config-option');
            let mainProduct = JSON.parse(mainOption.dataset.product);
            let mainPrice = mainProduct.price;
            let optionPrice = mainOption.querySelector('.option-price');
            // update cart
            cart.set(mainProduct.type,mainProduct);
            // clear price display
            optionPrice.innerHTML = "";

            // Iterate over each unselected radio button
            unselectedMains.forEach(button => {
                // find the parent option
                let mainOptionUnselected = button.closest('.config-option');
                // get unselected price
                let mainProductUnselected = JSON.parse(mainOptionUnselected.dataset.product);
                let mainPriceUnselected = mainProductUnselected.price;
                // get price difference
                let priceDiff = mainPriceUnselected - mainPrice;
                // update display price difference
                let optionPriceUnselected = mainOptionUnselected.querySelector('.option-price');
                let priceDisplay = formatPrice(priceDiff);
                if (priceDiff > 0){
                    priceDisplay = "+" + priceDisplay;
                }
                else if (priceDiff === 0){
                    priceDisplay = "";
                }
                optionPriceUnselected.innerHTML = priceDisplay;
            });
        }

        // Get all RAM buttons
        const allRamButtons = document.querySelectorAll('input[name="ram"]');
        // Lấy giá từ RAM được chọn
        const selectedRam = document.querySelector('input[name="ram"]:checked');
        // Filter out the selected radio button to get the unselected ones
        const unselectedRams = Array.from(allRamButtons).filter(button => button !== selectedRam);
        if (selectedRam) {
            const ramOption = selectedRam.closest('.config-option');
            let ramProduct = JSON.parse(ramOption.dataset.product);
            let ramPrice = ramProduct.price;
            let optionPrice = ramOption.querySelector('.option-price');
            // update cart
            cart.set(ramProduct.type,ramProduct);
            // clear price display
            optionPrice.innerHTML = "";

            // Iterate over each unselected radio button
            unselectedRams.forEach(button => {
                // find the parent option
                let ramOptionUnselected = button.closest('.config-option');
                // get unselected price
                let ramProductUnselected = JSON.parse(ramOptionUnselected.dataset.product);
                let ramPriceUnselected = ramProductUnselected.price;
                // get price difference
                let priceDiff = ramPriceUnselected - ramPrice;
                // update display price difference
                let optionPriceUnselected = ramOptionUnselected.querySelector('.option-price');
                let priceDisplay = formatPrice(priceDiff);
                if (priceDiff > 0){
                    priceDisplay = "+" + priceDisplay;
                }
                else if (priceDiff === 0){
                    priceDisplay = "";
                }
                optionPriceUnselected.innerHTML = priceDisplay;
            });
        }

        // Get all SSD buttons
        const allSsdButtons = document.querySelectorAll('input[name="ssd"]');
        // Lấy giá từ SSD được chọn
        const selectedSsd = document.querySelector('input[name="ssd"]:checked');
        // Filter out the selected radio button to get the unselected ones
        const unselectedSsds = Array.from(allSsdButtons).filter(button => button !== selectedSsd);
        if (selectedSsd) {
            const ssdOption = selectedSsd.closest('.config-option');
            let ssdProduct = JSON.parse(ssdOption.dataset.product);
            let ssdPrice = ssdProduct.price;
            let optionPrice = ssdOption.querySelector('.option-price');
            // update cart
            cart.set(ssdProduct.type,ssdProduct);
            // clear price display
            optionPrice.innerHTML = "";

            // Iterate over each unselected radio button
            unselectedSsds.forEach(button => {
                // find the parent option
                let ssdOptionUnselected = button.closest('.config-option');
                // get unselected price
                let ssdProductUnselected = JSON.parse(ssdOptionUnselected.dataset.product);
                let ssdPriceUnselected = ssdProductUnselected.price;
                // get price difference
                let priceDiff = ssdPriceUnselected - ssdPrice;
                // update display price difference
                let optionPriceUnselected = ssdOptionUnselected.querySelector('.option-price');
                let priceDisplay = formatPrice(priceDiff);
                if (priceDiff > 0){
                    priceDisplay = "+" + priceDisplay;
                }
                else if (priceDiff === 0){
                    priceDisplay = "";
                }
                optionPriceUnselected.innerHTML = priceDisplay;
            });
        }

        // Get all monitor buttons
        const allMonitorButtons = document.querySelectorAll('input[name="monitor"]');
        // lấy màn hình được chọn
        const selectedMonitor = document.querySelector('input[name="monitor"]:checked');
        // Filter out the selected radio button to get the unselected ones
        const unselectedMonitors = Array.from(allMonitorButtons).filter(button => button !== selectedMonitor);
        if (selectedMonitor) {
            const monitorOption = selectedMonitor.closest('.config-option');
            let monitorProduct = JSON.parse(monitorOption.dataset.product);
            let monitorPrice = monitorProduct.price;
            let optionPrice = monitorOption.querySelector('.option-price');
            // update cart
            cart.set(monitorProduct.type,monitorProduct);
            // clear price display
            optionPrice.innerHTML = "";

            // Iterate over each unselected radio button
            unselectedMonitors.forEach(button => {
                // find the parent option
                let monitorOptionUnselected = button.closest('.config-option');
                // get unselected price
                let monitorProductUnselected = JSON.parse(monitorOptionUnselected.dataset.product);
                let monitorPriceUnselected = monitorProductUnselected.price;
                // get price difference
                let priceDiff = monitorPriceUnselected - monitorPrice;
                // update display price difference
                let optionPriceUnselected = monitorOptionUnselected.querySelector('.option-price');
                let priceDisplay = formatPrice(priceDiff);
                if (priceDiff > 0){
                    priceDisplay = "+" + priceDisplay;
                }
                else if (priceDiff === 0){
                    priceDisplay = "";
                }
                optionPriceUnselected.innerHTML = priceDisplay;
            });
        }
        
        // Get all case buttons
        const allCaseButtons = document.querySelectorAll('input[name="case"]');
        // Lấy giá từ Case được chọn
        const selectedCase = document.querySelector('input[name="case"]:checked');
        // Filter out the selected radio button to get the unselected ones
        const unselectedCases = Array.from(allCaseButtons).filter(button => button !== selectedCase);
        if (selectedCase) {
            const caseOption = selectedCase.closest('.config-option');
            let caseProduct = JSON.parse(caseOption.dataset.product);
            let casePrice = caseProduct.price;
            let optionPrice = caseOption.querySelector('.option-price');
            // update cart
            cart.set(caseProduct.type,caseProduct);
            // clear price display
            optionPrice.innerHTML = "";

            // Iterate over each unselected radio button
            unselectedCases.forEach(button => {
                // find the parent option
                let caseOptionUnselected = button.closest('.config-option');
                // get unselected price
                let caseProductUnselected = JSON.parse(caseOptionUnselected.dataset.product);
                let casePriceUnselected = caseProductUnselected.price;
                // get price difference
                let priceDiff = casePriceUnselected - casePrice;
                // update display price difference
                let optionPriceUnselected = caseOptionUnselected.querySelector('.option-price');
                let priceDisplay = formatPrice(priceDiff);
                if (priceDiff > 0){
                    priceDisplay = "+" + priceDisplay;
                }
                else if (priceDiff === 0){
                    priceDisplay = "";
                }
                optionPriceUnselected.innerHTML = priceDisplay;
            });
        }
        
        // Get all keymouse buttons
        const allKeymouseButtons = document.querySelectorAll('input[name="key_mouse"]');
        // Lấy giá từ Keyboard Mouse được chọn
        const selectedKeymouse = document.querySelector('input[name="key_mouse"]:checked');
        // Filter out the selected radio button to get the unselected ones
        const unselectedKeymouses = Array.from(allKeymouseButtons).filter(button => button !== selectedKeymouse);
        if (selectedKeymouse) {
            const keymouseOption = selectedKeymouse.closest('.config-option');
            let keymouseProduct = JSON.parse(keymouseOption.dataset.product);
            let keymousePrice = keymouseProduct.price;
            let optionPrice = keymouseOption.querySelector('.option-price');
            // update cart
            cart.set(keymouseProduct.type,keymouseProduct);
            // clear price display
            optionPrice.innerHTML = "";

            // Iterate over each unselected radio button
            unselectedKeymouses.forEach(button => {
                // find the parent option
                let keymouseOptionUnselected = button.closest('.config-option');
                // get unselected price
                let keymouseProductUnselected = JSON.parse(keymouseOptionUnselected.dataset.product);
                let keymousePriceUnselected = keymouseProductUnselected.price;
                // get price difference
                let priceDiff = keymousePriceUnselected - keymousePrice;
                // update display price difference
                let optionPriceUnselected = keymouseOptionUnselected.querySelector('.option-price');
                let priceDisplay = formatPrice(priceDiff);
                if (priceDiff > 0){
                    priceDisplay = "+" + priceDisplay;
                }
                else if (priceDiff === 0){
                    priceDisplay = "";
                }
                optionPriceUnselected.innerHTML = priceDisplay;
            });
        }
        
    }


    // Hàm cập nhật hiển thị
    function updateDisplay(){
        // ---- Cập Nhật Giá ----
        // Tính giá
        let pcPrice = calculatePrice(cart,pcComponents);
        let monitorPrice = calculatePrice(cart,['monitor']);
        let totalPrice = pcPrice+monitorPrice;

        // Giá đầu trang
        document.querySelector('.current-price').textContent = formatPrice(totalPrice);
        // Giá cuối trang
        document.getElementById('totalPrice').textContent = formatPrice(totalPrice);
        // Giá trong phần mua 
        n_pc = parseInt(document.getElementById('quantity').value);
        document.getElementById('totalPricePayment').innerHTML = formatPrice(totalPrice) + " x " + n_pc + "<br>= " + formatPrice(totalPrice*n_pc);

        // ---- Cập Nhật Spec ----
        if (cart.has('cpu')){
            document.getElementById('table_cpu').innerHTML = cart.get('cpu').name;
            document.getElementById('payment-cpu').innerHTML = "CPU: " + cart.get('cpu').name + "<br>";
        }
        else{
            document.getElementById('table_cpu').parentElement.style.display = 'none';
            document.getElementById('payment-cpu').style.display = "none";
        }

        if (cart.has('main')){
            document.getElementById('table_main').innerHTML = cart.get('main').name;
            document.getElementById('table_port_rear').innerHTML = cart.get('main').note.port;
            document.getElementById('table_display').innerHTML = cart.get('main').note.display;
            document.getElementById('payment-main').innerHTML = "MAIN: " + cart.get('main').name + "<br>";
        }
        else{
            document.getElementById('table_main').parentElement.style.display = 'none';
            document.getElementById('table_port_rear').parentElement.style.display = 'none';
            document.getElementById('table_display').parentElement.style.display = 'none';
            document.getElementById('payment-main').style.display = "none";
        }

        if (cart.has('vga')){
            document.getElementById('table_vga').innerHTML = cart.get('vga').name;
            document.getElementById('payment-vga').innerHTML = "VGA: " + cart.get('vga').name + "<br>";
        }
        else{
            document.getElementById('table_vga').parentElement.style.display = 'none';
            document.getElementById('payment-vga').style.display = "none";
        }

        if (cart.has('ram')){
            document.getElementById('table_ram').innerHTML = cart.get('ram').name;
            document.getElementById('payment-ram').innerHTML = "RAM: " + cart.get('ram').name + "<br>";
        }
        else{
            document.getElementById('table_ram').parentElement.style.display = 'none';
            document.getElementById('payment-ram').style.display = "none";
        }

        if (cart.has('ssd')){
            document.getElementById('table_ssd').innerHTML = cart.get('ssd').name;
            document.getElementById('payment-ssd').innerHTML = "SSD: " + cart.get('ssd').name + "<br>";
        }
        else{
            document.getElementById('table_ssd').parentElement.style.display = 'none';
            document.getElementById('payment-ssd').style.display = "none";
        }

        if (cart.has('case')){
            document.getElementById('table_case').innerHTML = cart.get('case').name;
            document.getElementById('payment-case').innerHTML = "CASE: " + cart.get('case').name + "<br>";
            document.getElementById('table_port_front').innerHTML = cart.get('case').note.port;
        }
        else{
            document.getElementById('table_case').parentElement.style.display = 'none';
            document.getElementById('payment-case').style.display = "none";
            document.getElementById('table_port_front').parentElement.style.display = 'none';
        }

        if (cart.has('psu')){
            document.getElementById('table_psu').innerHTML = cart.get('psu').name;
            document.getElementById('payment-psu').innerHTML = "PSU: " + cart.get('psu').name + "<br>";
        }
        else{
            document.getElementById('table_psu').parentElement.style.display = 'none';
            document.getElementById('payment-psu').style.display = "none";
        }

        if (cart.has('cooler')){
            document.getElementById('table_cooler').innerHTML = cart.get('cooler').name;
            document.getElementById('payment-cooler').innerHTML = "Tản Nhiệt: " + cart.get('cooler').name + "<br>";
        }
        else{
            document.getElementById('table_cooler').parentElement.style.display = 'none';
            document.getElementById('payment-cooler').style.display = "none";
        }

        if (cart.has('os')){
            document.getElementById('table_os').innerHTML = cart.get('os').name;
            document.getElementById('payment-os').innerHTML = "OS: " + cart.get('os').name + "<br>";
            // document.getElementById('option-os').innerHTML = cart.get('os').name;
            // document.getElementById('option-os-subnote').textContent = cart.get('os').sub_note;
        }
        else{
            document.getElementById('table_os').parentElement.style.display = 'none';
            document.getElementById('payment-os').style.display = "none";
        }

        if (cart.has('key_mouse')){
            document.getElementById('payment-addon').innerHTML = "Phụ Kiện: " + cart.get('key_mouse').name + "<br>";
            // document.getElementById('option-keymouse').innerHTML = cart.get('key_mouse').name;
            // document.getElementById('option-keymouse-subnote').textContent = cart.get('key_mouse').sub_note;
        }
        else{
            document.getElementById('payment-addon').style.display = "none";
        }

        if (cart.has('extra')){
            document.getElementById('payment-extra').innerHTML = cart.get('extra').name + "<br>";
        }
        else{
            document.getElementById('payment-extra').style.display = "none";
        }
        

        if (cart.has("monitor")){
            if (cart.get("monitor").display){
                // display
                document.getElementById('payment-monitor').style.display = "";
                document.getElementById('monitor-name').innerHTML = cart.get("monitor").name;
                document.getElementById('monitor-img').src = cart.get("monitor").img_path;
                document.getElementById('monitor-quantity').textContent = n_pc;
            }
            else{
                // hide
                document.getElementById('payment-monitor').style.display = "none";
            }
        }
        
        if (cart.has("voucher")){
            if (cart.get("voucher").display){
                // display
                document.getElementById('payment-voucher').style.display = "";
                document.getElementById('voucher-name').innerHTML = cart.get("voucher").name;
                document.getElementById('voucher-img').src = cart.get("voucher").img_path;
                document.getElementById('voucher-quantity').textContent = n_pc;
            }
            else{
                // hide
                document.getElementById('payment-voucher').style.display = "none";
            }
        }

        // ---- Cập Nhật Giá Bottom Bar ----
        document.querySelector('.price-bottom').textContent = formatPrice(totalPrice);
    }


    document.addEventListener('DOMContentLoaded', function () {
        // Thêm sự kiện click cho các config options
        document.querySelectorAll('.config-option').forEach(option => {
            option.addEventListener('click', function () {
                // Bỏ chọn các options khác trong cùng nhóm
                const configSection = this.closest('.config-options');
                configSection.querySelectorAll('.config-option').forEach(opt => {
                    opt.classList.remove('selected');
                });

                // Chọn option hiện tại
                this.classList.add('selected');

                // Chọn radio button
                const radio = this.querySelector('input[type="radio"]');
                if (radio) radio.checked = true;

                // Cập nhật giỏ hàng
                updateCart();
                // Cập nhật hiển thị
                updateDisplay();
            });
        });
        

        // Cập nhật giỏ hàng
        updateCart();
        // Cập nhật delivery option (NOTE: updateDisplay is already included)
        toggleDeliveryInfo()
        // // Cập nhật hiển thị
        // updateDisplay();
    });
    </script>

        <!-- Main Content -->
        <div class="container mt-5">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/./">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="../product.php">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $pcName; ?></li>
                </ol>
            </nav>
            <!-- Product Main Content -->
            <div class="product-main-content">
                <div class="row">
                    <!-- Left Column - Product Images & Performance -->
                    <div class="col-lg-6">
                         <!-- Product Gallery -->
                         <div class="product-gallery">
                            <div class="main-image-container">
                                <button class="nav-btn prev-btn" onclick="navigateSlider(-1)">❮</button>
                                <img src="<?php echo $thumbnail_list[0]; ?>" class="main-image" id="mainImage" alt="Main Image">
                                <button class="nav-btn next-btn" onclick="navigateSlider(1)">❯</button>
                            </div>
                            <div class="thumbnail-slider">
                                <?php
                                foreach ($thumbnail_list as $index => $thumbnail) {
                                    $activeClass = $index === 0 ? 'active' : '';
                                    echo "
                                    <div class=\"thumbnail $activeClass\">
                                        <img src=\"$thumbnail\" alt=\"Thumbnail $index\" onclick=\"changeImage(this)\">
                                    </div>";
                                }
                                ?>
                            </div>
                        </div>
                    <!-- Performance Charts -->
                    <div class="specs-table">
                    <h3>Cấu Hình</h3>
                    <table>
                        <tr>
                            <td class="spec-name">CPU</td>
                            <td class="spec-value" id="table_cpu"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">Mainboard</td>
                            <td class="spec-value" id="table_main"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">VGA</td>
                            <td class="spec-value" id="table_vga"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">RAM</td>
                            <td class="spec-value" id="table_ram"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">SSD</td>
                            <td class="spec-value" id="table_ssd"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">Thùng máy</td>
                            <td class="spec-value" id="table_case"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">Cổng kết nối trước</td>
                            <td class="spec-value" id="table_port_front"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">Cổng kết nối sau</td>
                            <td class="spec-value" id="table_port_rear"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">Cổng xuất hình</td>
                            <td class="spec-value" id="table_display"></td>
                            <!-- <td class="spec-value" id="table_display"><?php echo $mainboard_display; ?></td> -->
                        </tr>
                        <tr>
                            <td class="spec-name">Nguồn</td>
                            <td class="spec-value" id="table_psu"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">Tản Nhiệt</td>
                            <td class="spec-value" id="table_cooler"></td>
                        </tr>
                        <tr>
                            <td class="spec-name">Hệ điều hành</td>
                            <td class="spec-value" id="table_os"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <style>
            .performance {
                width: 430px;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                padding: 16px;
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
            }

            .performance h3 {
                font-size: 18px;
                margin-bottom: 8px;
            }

            .performance p {
                font-size: 14px;
                margin: 4px 0;
                color: #666;
            }

            .game-list {
                list-style: none;
                padding: 0;
                margin: 16px 0;
            }

            .game-list li {
                display: flex;
                justify-content: space-between;
                margin-bottom: 8px;
                font-size: 14px;
                color: #333;
            }

            .fps {
                font-weight: bold;
                color: #4CAF50;
            }

            .resolution {
                display: flex;
                justify-content: space-between;
                margin: 16px 0;
            }

            .resolution button {
                border: 1px solid #ccc;
                background-color: #fff;
                padding: 8px 12px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
            }

            .resolution button.active {
                background-color: #4CAF50;
                color: #fff;
                border: none;
            }

            .note {
                font-size: 12px;
                color: #999;
                text-align: center;
            }

            .specs-table {
                margin: 20px 0;
            }

            .specs-table h3 {
                font-size: 1.5rem;
                color: #333;
                margin-bottom: 20px;
            }

            .specs-table table {
                width: 100%;
                border-collapse: collapse;
            }

            .specs-table tr:nth-child(odd) {
                background-color: #f8f9fa;
            }

            .specs-table td {
                padding: 12px 15px;
                border: 1px solid #dee2e6;
            }

            .spec-name {
                width: 200px;
                font-weight: 600;
                color: #333;
            }

            .spec-value {
                color: #666;
            }

            @media (max-width: 768px) {
                .specs-table td {
                    display: block;
                }
                
                .spec-name {
                    width: 100%;
                    background: #f1f3f5;
                }
            }
            </style>

                    <div class="product-column product-config">
                        <div class="product-header">
                            <!-- CPU Options -->

                            <h2 class="product-title"><b><?php echo $pcName;?></b></h2>
                            <div class="price-container">
                                <span class="current-price"></span>
                                <!-- <span class="original-price">$999.000</span>
                                <span class="discount-badge">-17%</span> -->
                            </div>
                            <div>
                            <strong>Hiệu suất mạnh mẽ và tốc độ vượt trội, hoàn hảo cho môi trường làm việc chuyên nghiệp!</strong>
                            <br>
                            Với cấu hình vượt trội, PC văn phòng sử dụng CPU Intel Core i5-14400 mang lại hiệu suất mạnh mẽ nhờ 10 lõi và 16 luồng, xử lý nhanh chóng các tác vụ đa nhiệm và phần mềm văn phòng phức tạp. Mainboard B760 Wifi tích hợp đảm bảo kết nối mạng không dây ổn định và hiện đại, hỗ trợ tốt cho công việc trực tuyến. RAM DDR5 thế hệ mới cung cấp băng thông cao và tốc độ xử lý nhanh, tối ưu hóa hiệu năng tổng thể của hệ thống. SSD 500GB M.2 PCIe với tốc độ đọc/ghi vượt trội giúp khởi động máy, mở ứng dụng và lưu trữ dữ liệu quan trọng một cách nhanh chóng, đảm bảo công việc luôn liền mạch và hiệu quả. Đây là giải pháp hoàn hảo cho môi trường làm việc hiện đại, đáp ứng nhu cầu từ cơ bản đến nâng cao.
                            <br>
                            </div>
                        </div>
                        <!--<h3>Hệ Điều Hành</h3>-->
                        <!--<a href="#" data-toggle="modal" data-target="#osModal" class="config-help">-->
                        <!--    Xem thêm về Win11 Pro-->
                        <!--</a>-->
                        <!--<div class="config-option selected" data-price="0">-->
                        <!--    <div class="option-info">-->
                        <!--        <span class="option-name" id="option-os"></span>-->
                        <!--        <span class="option-desc" id="option-os-subnote"></span>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<br>-->

                        <!-- Configuration Options -->
                        <div class="config-sections">
                            
                            <!-- OS Selection -->
                            <div class="config-section">
                                <h3>Hệ Điều Hành</h3>
                                <div class="config-options">
                                    <?php
                                    foreach ($os_list as $index => $product) {
                                        if ($index === 0){
                                            echo "<div class=\"config-option selected\" data-product=\"" . htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') . "\">
                                                <input type=\"radio\" name=\"{$product->type}\" value=\"\" checked hidden>
                                                <div class=\"option-info\">
                                                    <span class=\"option-name\">{$product->name}</span>
                                                    <span class=\"option-desc\">{$product->sub_note}</span>
                                                </div>
                                                <span class=\"option-price\">{$product->side_note}</span>
                                            </div>";
                                        }
                                        else{
                                            echo "<div class=\"config-option\" data-product=\"" . htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') . "\">
                                                <input type=\"radio\" name=\"{$product->type}\" value=\"\" hidden>
                                                <div class=\"option-info\">
                                                    <span class=\"option-name\">{$product->name}</span>
                                                    <span class=\"option-desc\">{$product->sub_note}</span>
                                                </div>
                                                <span class=\"option-price\">{$product->side_note}</span>
                                            </div>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <!-- CPU Selection -->
                            
                            <div class="config-section">
                                <h3>CPU</h3>
                                <div class="config-options">
                                    <?php foreach ($cpu_list as $index => $product): ?>
                                        <?php if (!empty($product->popup)): ?>
                                            <div class="modal fade" id="popup-cpu-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"><?= $product->popup ?></div>
                                                </div>
                                            </div>
                                            <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-cpu-{$index}'>Chi Tiết</a></div>"; ?>
                                        <?php else: ?>
                                            <?php $detailButton = ''; ?>
                                        <?php endif; ?>
                                       
                                        <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                                            data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                                            <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                                            <div class="option-info">
                                                <span class="option-name"><?= $product->name ?></span>
                                                <span class="option-desc"><?= $product->sub_note ?></span>
                                                <?= $detailButton ?>
                                            </div>
                                            <span class="option-price"><?= $product->side_note ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <!-- MAINBOARD Selection -->
                            <div class="config-section">
                                <h3>MAINBOARD</h3>
                                <div class="config-options">
                                    <?php foreach ($main_list as $index => $product): ?>
                                        <?php if (!empty($product->popup)): ?>
                                            <div class="modal fade" id="popup-main-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"><?= $product->popup ?></div>
                                                </div>
                                            </div>
                                            <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-main-{$index}'>Chi Tiết</a></div>"; ?>
                                        <?php else: ?>
                                            <?php $detailButton = ''; ?>
                                        <?php endif; ?>
                                       
                                        <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                                            data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                                            <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                                            <div class="option-info">
                                                <span class="option-name"><?= $product->name ?></span>
                                                <span class="option-desc"><?= $product->sub_note ?></span>
                                                <?= $detailButton ?>
                                            </div>
                                            <span class="option-price"><?= $product->side_note ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <!-- RAM Selection -->
                            <div class="config-section">
                                <h3>Ram</h3>
                                <div class="config-options">
                                    <?php foreach ($ram_list as $index => $product): ?>
                                        <?php if (!empty($product->popup)): ?>
                                            <div class="modal fade" id="popup-ram-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"><?= $product->popup ?></div>
                                                </div>
                                            </div>
                                            <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-ram-{$index}'>Chi Tiết</a></div>"; ?>
                                        <?php else: ?>
                                            <?php $detailButton = ''; ?>
                                        <?php endif; ?>
    
                                        <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                                            data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                                            <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                                            <div class="option-info">
                                                <span class="option-name"><?= $product->name ?></span>
                                                <span class="option-desc"><?= $product->sub_note ?></span>
                                                <?= $detailButton ?>
                                            </div>
                                            <span class="option-price"><?= $product->side_note ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- SSD Selection -->
                            <div class="config-section">
                                <h3>SSD</h3>
                                <div class="config-options">
                                    <?php foreach ($ssd_list as $index => $product): ?>
                                        <?php if (!empty($product->popup)): ?>
                                            <div class="modal fade" id="popup-ssd-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"><?= $product->popup ?></div>
                                                </div>
                                            </div>
                                            <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-ssd-{$index}'>Chi Tiết</a></div>"; ?>
                                        <?php else: ?>
                                            <?php $detailButton = ''; ?>
                                        <?php endif; ?>
                                    
                                        <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                                            data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                                            <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                                            <div class="option-info">
                                                <span class="option-name"><?= $product->name ?></span>
                                                <span class="option-desc"><?= $product->sub_note ?></span>
                                                <?= $detailButton ?>
                                            </div>
                                            <span class="option-price"><?= $product->side_note ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <!-- CASE Selection -->
                            <div class="config-section">
                                <h3>Thùng Máy </h3>
                                <div class="config-options">
                                    <?php foreach ($case_list as $index => $product): ?>
                                        <?php if (!empty($product->popup)): ?>
                                            <div class="modal fade" id="popup-case-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"><?= $product->popup ?></div>
                                                </div>
                                            </div>
                                            <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-case-{$index}'>Chi Tiết</a></div>"; ?>
                                        <?php else: ?>
                                            <?php $detailButton = ''; ?>
                                        <?php endif; ?>
                                    
                                        <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                                            data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                                            <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                                            <div class="option-info">
                                                <span class="option-name"><?= $product->name ?></span>
                                                <span class="option-desc"><?= $product->sub_note ?></span>
                                                <?= $detailButton ?>
                                            </div>
                                            <span class="option-price"><?= $product->side_note ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            
                            
                            <div class="config-section">
                                <h3>Phụ Kiện</h3>
                               <div class="config-sections">
                               <h3>Màn Hình</h3>
                                    <div class="config-options">
                                        <?php foreach ($monitor_list as $index => $product): ?>
                                            <?php if (!empty($product->popup)): ?>
                                                <div class="modal fade" id="popup-monitor-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content"><?= $product->popup ?></div>
                                                    </div>
                                                </div>
                                                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-monitor-{$index}'>Chi Tiết</a></div>"; ?>
                                            <?php else: ?>
                                                <?php $detailButton = ''; ?>
                                            <?php endif; ?>
                                        
                                            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                                                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                                                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                                                <div class="option-info">
                                                    <span class="option-name"><?= $product->name ?></span>
                                                    <span class="option-desc"><?= $product->sub_note ?></span>
                                                    <?= $detailButton ?>
                                                </div>
                                                <span class="option-price"><?= $product->side_note ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            <div class="config-section">
                                <h5>Phím & Chuột</h5>
                                <div class="config-options">
                                    <?php foreach ($key_mouse_list as $index => $product): ?>
                                        <?php if (!empty($product->popup)): ?>
                                            <div class="modal fade" id="popup-key_mouse-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"><?= $product->popup ?></div>
                                                </div>
                                            </div>
                                            <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-key_mouse-{$index}'>Chi Tiết</a></div>"; ?>
                                        <?php else: ?>
                                            <?php $detailButton = ''; ?>
                                        <?php endif; ?>
                                    
                                        <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                                            data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                                            <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                                            <div class="option-info">
                                                <span class="option-name"><?= $product->name ?></span>
                                                <span class="option-desc"><?= $product->sub_note ?></span>
                                                <?= $detailButton ?>
                                            </div>
                                            <span class="option-price"><?= $product->side_note ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="summary-total">
                                <span>Tổng Cộng</span>
                            <span id="totalPrice"></span>
                        </div>
                          <button onclick="openPopup()" class="btn-add-cart">Mua Hàng</button>

                 
                <script>
                function closePopup() {
                    document.getElementById("simplePopup").style.display = "none";
                }
                    
                // Thêm function để mở popup khi click vào nút mua hàng
                function openPopup() {
                    document.getElementById('simplePopup').style.display = 'block';
                }

                // Thêm function để đóng popup
                function closePopup() {
                    document.getElementById('simplePopup').style.display = 'none';
                }

                // Xử lý số lượng
                function decreaseQuantity() {
                    let input = document.getElementById('quantity');
                    let currentValue = parseInt(input.value);
                    if (currentValue > 1) {
                        input.value = currentValue - 1;
                        updateDisplay();
                    }
                }

                function increaseQuantity() {
                    let input = document.getElementById('quantity');
                    let currentValue = parseInt(input.value);
                    if (currentValue < 20) {
                        input.value = currentValue + 1;
                        updateDisplay();
                    }
                }

                // Đóng popup khi click bên ngoài
                window.onclick = function(event) {
                    const popup = document.getElementById('simplePopup');
                    if (event.target == popup) {
                        closePopup();
                    }
                }
                

                // Xử lý form submit
                document.getElementById('orderForm').onsubmit = function(e) {
                    e.preventDefault(); // Ngăn chặn hành vi mặc định của form

                    // Lấy thông tin từ form
                    const customerName = document.querySelector('input[placeholder="Họ và Tên"]').value;
                    const customerPhone = document.querySelector('input[placeholder="Số điện thoại"]').value;
                    const customerEmail = document.querySelector('input[placeholder="Email"]').value;
                    const shippingMethod = document.querySelector('input[name="delivery"]:checked').value;
                    let deliveryAddress = "";
                    const customerNote = document.querySelector('textarea').value;

                    const selectedStore = document.querySelector('input[name="store"]:checked');
     
                    if (shippingMethod === 'home'){
                        deliveryAddress = document.querySelector('input[name="address"]').value
                    }
                    else {
                        if (!selectedStore){
                            alert('Xin vui lòng chọn đại lý đại hiện');
                            return;
                        }
                        else {
                            deliveryAddress = selectedStore.value;
                        }
                    }

                    // const order = "Hello World";
                    let pcName = <?php echo json_encode($pcName);?>;
                    const order_text = bill(pcName,cart,n_pc);


                    // Send the data to the PHP API
                    const orderData = {
                    order: order_text,
                    customerName: customerName,
                    customerPhone: customerPhone,
                    customerEmail: customerEmail,
                    shippingMethod: shippingMethod,
                    deliveryAddress: deliveryAddress,
                    customerNote: customerNote
                    };

                    // Make the POST request
                    fetch(order_url, {
                        method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(orderData),
                    })
                    .then(response => response.json())
                    .then(data => {
                    console.log('success:', data);
                    // You can show a success message or redirect the user after sending the order
                    orderId = data['order_id'];

                    // Tạo URL cho trang mới
                    const url = `success.php?orderId=${encodeURIComponent(orderId)}`;

                    // Chuyển hướng đến trang mới
                    // Clear cookies
                    document.cookie.split(";").forEach(function(cookie) {
                        const name = cookie.split("=")[0].trim();
                        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
                    });

                    // Clear localStorage and sessionStorage
                    localStorage.clear();
                    sessionStorage.clear();

                    // Navigate to the new page without adding the current page to history
                    window.location.href = url;
                    })
                    .catch((error) => {
                    alert(error)
                    console.error('Error:', error);
                    });

                    // Đóng popup
                    closePopup();
                }

                // Thêm function toggleDeliveryInfo vào script hiện có
                function toggleDeliveryInfo() {
                    const deliveryInfo = document.getElementById('delivery-info');
                    const deliveryType = document.querySelector('input[name="delivery"]:checked').value;
                    
                    if (deliveryType === 'home') {
                        deliveryInfo.innerHTML = `
                            <input type="text" name="address" placeholder="Địa chỉ giao hàng" style="width: 550px; height: 40px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; font-size: 14px;" required>
                            <div class="shipping-note">
                                <p>Lưu ý giao hàng:</p>
                                <ul>
                                    <li>* Quý khách phải chuyển khoản trước khi nhận hàng</li>
                                </ul>
                            </div>
                        `;
                        
                        // update voucher display
                        const voucher = cart.get("voucher");
                        voucher.display = true;
                        cart.set("voucher",voucher);
                        
                    } else {
                        let htmlText =`<label>Chọn Đại Lý Đại Diện ROSA:</label>
                                        <div class="store-info">
                                        <div id="shipping-note">
                                            <form method="post">
                                                <select id="province" onchange="updateDistricts()">
                                                    <option value="">Tỉnh/Thành phố</option>`;
                        
                        for (const city in dealersROSA){
                            htmlText += `<option value="` + city + `">` + city + `</option>`;
                        }

                        htmlText += `</select>
                                            
                                            <select id="districts" onchange="displayStores(document.getElementById('province').value, this.value)">
                                                <option value="">Quận/Huyện</option>
                                            </select>
                                            <div id="stores"></div>
                                        </form>
                                    </div>
                                </div>`;
                        
                        deliveryInfo.innerHTML = htmlText;  
                        
                        // update voucher display
                        const voucher = cart.get("voucher");
                        voucher.display = true;
                        cart.set("voucher",voucher);
                    }

                    updateDisplay();
                }
                
               // Hàm cập nhật danh sách quận/huyện khi tỉnh thay đổi
                function updateDistricts() {
                    const province = document.getElementById('province').value;
                    const districtSelect = document.getElementById('districts');
                
                    // Xóa các quận/huyện hiện tại
                    districtSelect.innerHTML = '';  
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Quận/Huyện';
                    districtSelect.appendChild(defaultOption);
                
                    // Kiểm tra nếu tỉnh đã chọn có quận/huyện để thêm
                    if (province) {
                        // Kiểm tra và thêm các quận/huyện thuộc tỉnh đã chọn vào danh sách
                        for (const district in dealersROSA[province]) {
                            const option = document.createElement('option');
                            option.value = district;
                            option.textContent = district;
                            districtSelect.appendChild(option);
                        }
                
                        // Hiển thị tất cả đại lý trong tỉnh
                        displayStores(province, null);  // Khi chọn tỉnh, không chọn quận => null
                    } else {
                        // Nếu không chọn tỉnh, xóa danh sách đại lý
                        document.getElementById('stores').innerHTML = '';
                    }
                }
                
                // Hàm hiển thị danh sách đại lý
                function displayStores(province, district) {
                    const storesDiv = document.getElementById('stores');
                    storesDiv.innerHTML = ''; // Xóa danh sách đại lý cũ
                
                    // Kiểm tra dữ liệu của tỉnh và quận/huyện
                    if (province && dealersROSA[province]) {
                        let hasStores = false;
                
                        if (district) {
                            // Nếu chọn quận/huyện, hiển thị đại lý trong quận đó
                            const stores = dealersROSA[province][district];
                            if (stores && stores.length > 0) {
                                hasStores = true;
                                appendStoresToDiv(storesDiv, stores, ` ${district}`);
                            }
                        } else {
                            // Nếu không chọn quận, hiển thị toàn bộ đại lý trong tỉnh
                            for (const districtName in dealersROSA[province]) {
                                const stores = dealersROSA[province][districtName];
                                if (stores && stores.length > 0) {
                                    hasStores = true;
                                    appendStoresToDiv(storesDiv, stores, ` ${districtName}`);
                                }
                            }
                        }
                
                        // Nếu không có đại lý, hiển thị thông báo
                        if (!hasStores) {
                            storesDiv.textContent = 'Không có đại lý nào trong khu vực này.';
                        } else {
                        // mặt định chọn đại lý đầu tiên 
                        const  firstStoreRadio = storesDiv.querySelector('input[type="radio"]');
                        if (firstStoreRadio) {
                            firstStoreRadio.checked = true; // chọn button đầu tiên
                        } 
                    }
                
                    } else {
                        // Không có dữ liệu đại lý cho tỉnh
                        storesDiv.textContent = 'Không có đại lý nào.';
                    }
                }
                
                // Hàm phụ để thêm danh sách đại lý vào div
                function appendStoresToDiv(storesDiv, stores, headerText) {
                    const districtHeader = document.createElement('h5');
                    districtHeader.textContent = headerText;
                    districtHeader.style.marginTop = '15px';
                    districtHeader.style.marginBottom = '10px';
                    // storesDiv.appendChild(districtHeader);
                
                    stores.forEach((store, index) => {
                        const storeContainer = document.createElement('div');
                        storeContainer.style.display = 'flex';
                        storeContainer.style.marginBottom = '5px';
                        storeContainer.style.alignItems = 'center';
                
                        // Tạo một nút radio cho đại lý
                        const radioButton = document.createElement('input');
                        radioButton.type = 'radio';
                        radioButton.name = 'store';
                        radioButton.value = store[0] + '<br>' + store[1];
                        radioButton.id = `store-${store[0]}-${index}`;
                
                        // Tạo một thẻ <span> chứa tên và địa chỉ đại lý
                        const storeLabel = document.createElement('span');
                        storeLabel.style.cursor = 'pointer';  // Thêm cursor pointer để người dùng biết có thể nhấp vào
                        storeLabel.innerHTML = store[0] + '<br>' + store[1];
                        storeLabel.style.marginLeft = '5px';
                
                        // Thêm sự kiện click vào tên đại lý để chọn radio button tương ứng
                        storeLabel.addEventListener('click', () => {
                            radioButton.checked = true;  // Chọn radio button khi nhấp vào tên đại lý
                        });
                
                        storeContainer.appendChild(radioButton);
                        storeContainer.appendChild(storeLabel);
                        storesDiv.appendChild(storeContainer);
                    });
                }
                
                // Sự kiện khi thay đổi tỉnh/thành phố
                document.getElementById('province').addEventListener('change', () => {
                    updateDistricts();
                });
                
                // Sự kiện khi thay đổi quận/huyện
                document.getElementById('districts').addEventListener('change', () => {
                    const province = document.getElementById('province').value;
                    const district = document.getElementById('districts').value;
                    displayStores(province, district);
                });


                  </script>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
                // Xử lý gallery ảnh
                function changeImage(element) {
                    document.getElementById('mainImage').src = element.src;
                    document.querySelectorAll('.thumbnail').forEach(thumb => {
                        thumb.classList.remove('active');
                    });
                    element.parentElement.classList.add('active');
                }

                // Xử lý nút prev/next
                document.querySelector('.prev-btn').addEventListener('click', function () {
                    const active = document.querySelector('.thumbnail.active');
                    const prev = active.previousElementSibling ||
                        document.querySelector('.thumbnail-slider .thumbnail:last-child');
                    changeImage(prev.querySelector('img'));
                });

                document.querySelector('.next-btn').addEventListener('click', function () {
                    const active = document.querySelector('.thumbnail.active');
                    const next = active.nextElementSibling ||
                        document.querySelector('.thumbnail-slider .thumbnail:first-child');
                    changeImage(next.querySelector('img'));
                });
            </script>
            <style>
                #agent-list {
                    display: none;
                    margin-top: 10px;
                    list-style-type: none;
                    padding-left: 20px;
                }

                #toggle-button:hover {
                    color: #FF0000; /* Màu khi hover */
                
                }

                .agent-option {
                    cursor: pointer;
                    color: #007bff;
                }

                /* .agent-option:hover {
                    color: #FF6600;
                    text-decoration: underline;
                } */

                /* Product Layout Styles */
                .product-layout {
                    display: flex;
                    gap: 30px;
                    margin-top: 20px;
                }

                .product-column {
                    flex: 1;
                }

                /* Product Gallery Styles */
                .product-gallery {
                    margin-bottom: 30px;
                    
                    display: flex;
                    flex-direction: column; /* Arrange the gallery vertically */
                    align-items: center; /* Center all content horizontally */
                    justify-content: center; /* Center content vertically */
                }

                .main-image-container {
                    /*position: relative;*/
                    margin-bottom: 15px;
                    
                    display: flex;
                    align-items: center; /* Align the image and buttons vertically */
                    justify-content: center; /* Center the image and buttons horizontally */
                    gap: 10px; /* Add spacing between the buttons and the image */
                    position: relative; /* Enable precise button positioning if needed */
                }

                .main-image {
                    width: 350px;
                    height: auto;
                    border-radius: 8px;
                }
                

                .nav-btn {
                    position: relative;
                    top: 50%;
                    transform: translateY(-50%);
                    background: rgba(255, 255, 255, 0.8);
                    border: none;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    cursor: pointer;
                    font-size: 20px;
                }

                .prev-btn {
                    left: 10px;
                }

                .next-btn {
                    right: 10px;
                }

                .thumbnail-slider {
                    display: flex;
                    gap: 10px;
                }

                .thumbnail {
                    flex: 1;
                    cursor: pointer;
                    opacity: 0.6;
                    transition: opacity 0.3s;
                }

                .thumbnail.active {
                    opacity: 1;
                    border: 2px solid #007bff;
                    border-radius: 4px;
                }

                .thumbnail img {
                    width: 100%;
                    height: auto;
                    border-radius: 4px;
                }

                /* Performance Section Styles */
                .performance-section {
                    background: #f8f9fa;
                    padding: 20px;
                    border-radius: 8px;
                }

                .game-benchmarks {
                    margin: 20px 0;
                }

                .game-item {
                    margin-bottom: 15px;
                }

                .game-info {
                    display: flex;
                    align-items: center;
                    margin-bottom: 8px;
                }

                .game-info img {
                    width: 40px;
                    height: 40px;
                    border-radius: 4px;
                    margin-right: 10px;
                }

                .fps-bar .progress {
                    height: 25px;
                    background-color: #e9ecef;
                }

                .fps-bar .progress-bar {
                    background-color: #007bff;
                    color: white;
                    text-align: left;
                    padding-left: 10px;
                }

                .quality {
                    font-size: 0.9em;
                    color: #6c757d;
                }

                /* Configuration Styles */
                .config-section {
                    margin-bottom: 30px;
                }

                .config-help {
                    font-size: 0.9em;
                    color: #007bff;
                    text-decoration: none;
                    margin-bottom: 10px;
                    display: inline-block;
                }

                .config-options {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                }

                .config-option {
                    display: flex; /* Sử dụng flexbox để bố cục các phần tử bên trong */
                    align-items: center; /* Canh giữa theo trục dọc */
                    justify-content: space-between; /* Đẩy các phần tử sang hai bên */
                    padding: 10px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    margin-bottom: 10px;
                    background-color: #f9f9f9;
                    transition: background-color 0.3s ease;
                }

                .config-option:hover {
                    border-color: #007bff;
                    background-color: #f8f9fa;
                }

                .config-option.selected {
                    border-color: #007bff;
                    background-color: #f0f7ff;
                }

                .option-info {
                    flex: 1;
                }

                .option-name {
                    font-weight: bold;
                    display: block;
                }

                .option-desc {
                    font-size: 0.9em;
                    color: #6c757d;
                }

                .option-price {
                    font-weight: bold;
                    color: black;
                    margin-left: auto; /* Đẩy sang phải */
                }

                /* Price Container Styles */
                .price-container {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    margin: 20px 0;
                }

                .current-price {
                    font-size: 2em;
                    font-weight: bold;
                    color: #dc3545;
                }

                .original-price {
                    text-decoration: line-through;
                    color: #6c757d;
                }

                .discount-badge {
                    background-color: #dc3545;
                    color: white;
                    padding: 5px 10px;
                    border-radius: 4px;
                }

                /* Product Benefits Styles */
                .product-benefits {
                    margin: 20px 0;
                }

                .benefit-item {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    margin-bottom: 10px;
                }

                .benefit-item i {
                    color: #28a745;
                }

                /* Price Summary Styles */
                .price-summary {
                    background-color: #f8f9fa;
                    padding: 20px;
                    border-radius: 8px;
                    margin-top: 30px;
                }

                .summary-item {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 10px;
                }

                .summary-total {
                    display: flex;
                    justify-content: space-between;
                    font-weight: bold;
                    font-size: 1.2em;
                    margin-top: 15px;
                    padding-top: 15px;
                    border-top: 1px solid #dee2e6;
                }

                .btn-add-cart {
                    width: 100%;
                    background-color: #6666FF;
                    color: white;
                    border: none;
                    padding: 15px;
                    border-radius: 4px;
                    margin-top: 15px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                }

                .btn-add-cart:hover {
                    background-color: #218838;
                }

                .estimated-shipping {
                    text-align: center;
                    margin-top: 15px;
                    font-size: 0.9em;
                    color: #6c757d;
                }

                /* Resolution Settings Styles */
                .resolution-settings {
                    display: flex;
                    gap: 10px;
                    margin-top: 15px;
                }

                .btn-resolution {
                    flex: 1;
                    padding: 8px;
                    border: 1px solid #dee2e6;
                    border-radius: 4px;
                    background: white;
                    cursor: pointer;
                    transition: all 0.3s;
                }

                .btn-resolution.active {
                    background-color: #007bff;
                    color: white;
                    border-color: #007bff;
                }

                /* Modal Styles */
                .modal-content {
                    border-radius: 8px;
                }

                .modal-header {
                    border-bottom: 1px solid #dee2e6;
                    padding: 15px 20px;
                }

                .modal-body {
                    padding: 20px;
                }

                .modal-body h6 {
                    color: #007bff;
                    margin-top: 15px;
                }

                .modal-body ul {
                    padding-left: 20px;
                    margin-bottom: 15px;
                }

                /* Responsive Styles */
                @media (max-width: 992px) {
                    .product-layout {
                        flex-direction: column;
                    }
                }

                @media (max-width: 768px) {
                    .price-container {
                        flex-wrap: wrap;
                    }

                    .nav-btn {
                        width: 30px;
                        height: 30px;
                        font-size: 16px;
                    }
                }

                .specs-container {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 20px;
                }

                .specs-row {
                    display: flex;
                    gap: 40px;
                }

                .specs-column {
                    flex: 1;
                }

                .spec-section {
                    margin-bottom: 30px;
                }

                .spec-section h3 {
                    color: #666;
                    font-size: 14px;
                    font-weight: 600;
                    margin-bottom: 15px;
                    text-transform: uppercase;
                }

                .spec-details {
                    border-top: 1px solid #eee;
                }

                .spec-item {
                    display: flex;
                    padding: 12px 0;
                    border-bottom: 1px solid #eee;
                }

                .spec-label {
                    flex: 0 0 250px;
                    color: #333;
                    font-weight: 600;
                }

                .spec-value {
                    flex: 1;
                    color: #666;
                }

                @media (max-width: 992px) {
                    .specs-row {
                        flex-direction: column;
                    }

                    .specs-column {
                        width: 100%;
                    }
                }

                @media (max-width: 768px) {
                    .spec-item {
                        flex-direction: column;
                    }

                    .spec-label {
                        margin-bottom: 5px;
                    }
                }

                .modal-title {
                    font-size: 24px;
                    font-weight: bold;
                    color: #333;
                }

                .modal-body p {
                    font-size: 16px;
                    line-height: 1.6;
                    color: #555;
                }

                .ram-options {
                    margin-top: 30px;
                }

                .ram-option {
                    margin-bottom: 25px;
                    display: flex;
                    align-items: flex-start;
                }

                .ram-size {
                    font-weight: bold;
                    color: #333;
                    width: 80px;
                    font-size: 16px;
                }

                .ram-desc {
                    flex: 1;
                    color: #555;
                    line-height: 1.5;
                }

                .modal-header {
                    border-bottom: none;
                    padding: 20px 30px;
                }

                .modal-body {
                    padding: 20px 30px;
                }

                .close {
                    font-size: 28px;
                    opacity: 0.7;
                }

                .close:hover {
                    opacity: 1;
                }

                @media (max-width: 768px) {
                    .ram-option {
                        flex-direction: column;
                    }

                    .ram-size {
                        margin-bottom: 5px;
                    } 
                }
            </style>

            
            <style>
                .modal-title {
                    font-size: 24px;
                    font-weight: bold;
                    color: #333;
                }

                .modal-body p {
                    font-size: 16px;
                    line-height: 1.6;
                    color: #555;
                }

                .ram-options {
                    margin-top: 30px;
                }

                .ram-option {
                    margin-bottom: 25px;
                    display: flex;
                    align-items: flex-start;
                }

                .ram-size {
                    font-weight: bold;
                    color: #333;
                    width: 80px;
                    font-size: 16px;
                }

                .ram-desc {
                    flex: 1;
                    color: #555;
                    line-height: 1.5;
                    font-size: 16px;
                }

                .modal-header {
                    border-bottom: none;
                    padding: 20px 30px;
                }

                .modal-body {
                    padding: 20px 30px;
                }

                .close {
                    font-size: 28px;
                    opacity: 0.7;
                }

                .close:hover {
                    opacity: 1;
                }

                @media (max-width: 768px) {
                    .ram-option {
                        flex-direction: column;
                    }

                    .ram-size {
                        margin-bottom: 5px;
                    }
                }
            </style>

    <div class="specs-container">
        <div class="technical-specs mt-5">
        <h2>Tổng Quan Sản Phẩm</h2>
            <p style="color:black;">Intel Core i5-14400 là một lựa chọn xuất sắc cho PC văn phòng, mang lại hiệu suất mạnh mẽ với 10 lõi (6 Performance Cores và 4 Efficient Cores) và 16 luồng, lý tưởng cho việc xử lý các tác vụ đa nhiệm phức tạp như chạy phần mềm văn phòng, ứng dụng quản lý dữ liệu, và trình duyệt nhiều tab. Với tốc độ xung nhịp cao, CPU này đảm bảo thời gian phản hồi nhanh, giúp tăng hiệu quả làm việc. Ngoài ra, khả năng tối ưu hóa năng lượng giúp hệ thống vận hành ổn định, tiết kiệm chi phí và phù hợp với môi trường làm việc hiện đại.
            </p>
        </div>
    </div>

                    <style>
                        .specs-container {
                            max-width: 1200px;
                            margin: 0 auto;
                            padding: 20px;
                        }

                        .specs-row {
                            display: flex;
                            gap: 40px;
                        }

                        .specs-column {
                            flex: 1;
                        }

                        .spec-section {
                            margin-bottom: 30px;
                        }

                        .spec-section h3 {
                            color: #666;
                            font-size: 14px;
                            font-weight: 600;
                            margin-bottom: 15px;
                            text-transform: uppercase;
                        }

                        .spec-details {
                            border-top: 1px solid #eee;
                        }

                        .spec-item {
                            display: flex;
                            padding: 12px 0;
                            border-bottom: 1px solid #eee;
                        }

                        .spec-label {
                            flex: 0 0 250px;
                            color: #333;
                            font-weight: 600;
                        }

                        .spec-value {
                            flex: 1;
                            color: #666;
                        }

                        @media (max-width: 992px) {
                            .specs-row {
                                flex-direction: column;
                            }

                            .specs-column {
                                width: 100%;
                            }
                        }

                        @media (max-width: 768px) {
                            .spec-item {
                                flex-direction: column;
                            }

                            .spec-label {
                                margin-bottom: 5px;
                            }
                        }
                    </style>
    <div class="product-to">
    <div class="product-info-bottom">
        <div class="product-bottom"><?php echo $pcName; ?></div>
    </div>
    <div class="product-actions">
        <div class="product-pricing">
            <div class="price-bottom"></div>
        </div>
        <button onclick="openPopup()" class="btn-add-cart">Mua Hàng</button>
    </div>
</div>


<style>
     body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        /* display: flex; */
        flex-direction: row;
    }
    .product-to {
    display: flex;
    justify-content: space-between; /* Spread elements across available space */
    text-align: center; /* Center align content horizontally */
    padding: 10px 20px;
    background-color: #F5F5FA;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);

    max-width: 1200px; /* Constrain the width of the content */
    margin: 0 auto; /* Center the container horizontally */
    border-radius: 8px; /* Optional: Rounded corners for a polished look */
}

    .product-info-bottom {
        flex: 1; /* Chiếm không gian bên trái */
        display: flex;
        text-align: left;
        align-items: center;
        margin-left: 30px;
    }

    .product-bottom {
        font-weight: bold;
        font-size: 16px;
        color: #000;
    }


    .product-actions {
        display: flex;
        /* flex-direction: column; Xếp giá và nút theo chiều dọc */
        align-items: center; /* Căn nút bên phải */
    }


    .product-pricing {
        text-align: right;
    }

    .original-price {
        text-decoration: bold;
        color: #666;
        font-size: 12px;
    }

    .price-bottom {
        font-weight: bold;
        font-size: 16px;
        color: #000;
        margin-right: 20px; /* Adds space between the price and the button */
    }


    .btn-add-cart {
        background-color: #FF0000;
        color: #fff;
        border: none;
        border-radius: 5px;
       
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;

        margin-right: 30px;
    }

    .btn-add-cart:hover {
        background-color: #FF0000;
    }
</style>
<?php

// session_start(); // Bắt đầu session

// Nhập tệp common.php
include '../data/common_test.php';

// Lấy tên tệp hiện tại (loại bỏ đường dẫn)
$current_page = basename($_SERVER['PHP_SELF']); // VD: "ROSA-OFFICE.php"

// Danh sách sản phẩm đã được chọn (lưu trong session nếu có)
$selected_products = isset($_SESSION['random_products']) ? $_SESSION['random_products'] : [];

// Mảng sản phẩm sau khi lọc
$filtered_list_sp= array_filter($list_sp, function ($product) use ($current_page, $selected_products) {
    // Lấy tên file từ đường dẫn của sản phẩm
    $product_page = basename($product->page);

    // Loại bỏ sản phẩm thuộc trang hiện tại
    if (strcasecmp($product_page, $current_page) === 0) {
        return false;
    }

    // Loại bỏ sản phẩm đã được chọn trước đó
    foreach ($selected_products as $selected) {
        if ($selected->title === $product->title) {
            return false;
        }
    }

    return true; // Giữ lại sản phẩm không bị loại
});

// Nếu danh sách không đủ sản phẩm, dừng hiển thị
if (count($filtered_list_sp) < $num_products_to_display) {
    echo "<p>Không có đủ sản phẩm để hiển thị.</p>";
    return;
}

// Chọn ngẫu nhiên số sản phẩm cần hiển thị từ danh sách đã lọc
$random_products = [];
$used_indexes = [];

while (count($random_products) < $num_products_to_display) {
    $random_index = rand(0, count($filtered_list_sp) - 1);
    if (!in_array($random_index, $used_indexes)) {
        $random_products[] = $filtered_list_sp[$random_index];
        $used_indexes[] = $random_index;
    }
}

// Lưu danh sách sản phẩm đã chọn vào session
$_SESSION['random_products'] = $random_products;

// Hiển thị các sản phẩm
echo "<div style='display: flex; justify-content: center; align-items: center; text-align: center; height:30px;'>
    <h3><b style='color:red'>Các sản phẩm khác.</b> Khám phá các máy bộ tương tự</h3></div>";

echo "<div class='product-container'>"; // Container Flexbox
foreach ($random_products as $product) {
        $product_link = "/{$product->page}";
    echo "<div class='product-item'>"; // Thêm class cho mỗi sản phẩm
    echo "<img src='../$product->image' alt='{$product->title}'>";
    echo "<h3 class='product-title'>{$product->title}</h3>";
    echo "<p>{$product->subtitle}</p>";
    echo "<ul>";
    foreach (explode("\n", $product->content) as $line) {
        echo "<li>$line</li>";
    }
    echo "</ul>";
    echo "<b class='product-price'> {$product->price}</b>";
    echo "<a href='{$product_link}'>Mua ngay</a>";
    echo "</div>";
}
echo "</div>";
?>

<style>

    .product-container {
        display: flex;
        flex-wrap: wrap; /* Cho phép xuống hàng nếu không đủ không gian */
        justify-content: space-between; /* Khoảng cách đều giữa các sản phẩm */
        gap: 20px; /* Khoảng cách giữa các sản phẩm */
        margin: 20px 0; /* Khoảng cách trên và dưới cho container */
        width: 100%; /* Chiều rộng toàn bộ container */
        text-align: left; /* Căn chỉnh các nội dung về phía trái */
    }

    .product-item {
        flex: 1 1 calc(25% - 20px); /* 4 sản phẩm trên 1 hàng */
        /* flex: 1 1 calc(16.66% - 20px); */ /* Nếu muốn 6 sản phẩm trên 1 hàng */
        border: 1px solid #ccc; /* Viền cho sản phẩm */
        border-radius: 10px; /* Bo góc cho sản phẩm */
        padding: 16px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: left;
        height: auto;
    }


    .product-price {
        align-self: flex-start; /* Đặt giá bên trái */
        margin-top: 10px; /* Tạo khoảng cách giữa giá và các phần tử khác */
        color:#000;
    }

    .product-title {
        color: #000;
        font-size: 25px;
        align-self: flex-start; /* Đẩy giá về phía bên trái */
        margin-top: 16px; /* Khoảng cách phía trên giá */
        text-align: left; /* Căn chỉnh nội dung bên trong sang trái */
        width: 100%; /* Đảm bảo giá chiếm toàn bộ chiều rộng */
    }

    .product-item img {
        width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng của khung */
        height: 195px; /* Chiều cao cố định của khung chứa ảnh */
        object-fit: contain; /* Giữ nguyên tỷ lệ ảnh, không cắt */
        object-position: center; /* Căn giữa ảnh trong khung */
        border-radius: 10px; /* Bo góc cho hình ảnh */
    }

    .product-item h3 {
        font-size: 16px;
        margin: 10px 0;
        color: red;
    }

    .product-item p {
        font-size: 16px;
        color: #000000;
        margin: 5px 0;
        align-self: flex-start; /* Đẩy giá về phía bên trái */
        text-align: left; /* Căn chỉnh các nội dung về phía trái */
    }

    .product-item ul {
        list-style-type: none; /* Bỏ dấu chấm ở đầu dòng */
        padding: 0; /* Bỏ khoảng cách bên trái */
        margin: 0; /* Bỏ khoảng cách bên ngoài */
    }

    .product-item li {
        margin-bottom: 4px; /* Khoảng cách giữa các dòng */
    }

    .product-item a {
        display: inline-block;
        width: 100%; /* Nút mua sẽ rộng toàn bộ thẻ */
        text-align: center;
        background-color: #ff0000;
        color: white;
        padding: 10px 0;
        text-decoration: none;
        border-radius: 5px;
        font-size: 15px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .product-item a:hover {
        background-color: #cc0000; /* Màu khi hover */
    }

    @media (max-width: 768px) {
        .product-item {
            flex: 1 1 calc(50% - 20px); /* 2 sản phẩm trên 1 hàng khi màn hình nhỏ */
        }
    }

    @media (max-width: 480px) {
        .product-item {
            flex: 1 1 100%; /* 1 sản phẩm trên 1 hàng khi màn hình rất nhỏ */
        }
    }


</style>

<?php require "../footer.php";?>

 