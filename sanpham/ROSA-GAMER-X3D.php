<title>ROSA-GAMING-X3D</title>

<?php
require '../data/products.php';
require '../data/dealers.php';
require '../data/api_urls.php';
require '../header.php';

$pcName = "ROSA GAMING X3D";

$image_sp = "/assets/images/case_morax_right.jpg";
$thumbnail_list= [  "../assets/images/Morax_x3d.jpg",
                   "../assets/images/Morax_x3d_2.jpg",
                   "../assets/images/morax_x3d_3.jpg"
                    
                ];


// Create CPU list
$amd_ryzen7_7800x3d->price = 10784;
$cpu_list = [$amd_ryzen7_7800x3d];

// Create VGA list
$asus_4070->price = 20336;
$asus_4070ti->price = 30944;
$vga_list = [$asus_4070,$asus_4070ti];

// Create MAINBOARD list (new)
$asus_prime_b650_ayw_wifi_d5->price = 3506;
$asus_prime_b650_wifi_d5->price = 4781;
$main_list = [$asus_prime_b650_ayw_wifi_d5,$asus_prime_b650_wifi_d5];

// Create RAM list
$gskill_16gx2_5600_d5->price = 2773;
$gskill_16gx2_6400_d5->price = 3315;
$ram_list = [$gskill_16gx2_5600_d5,$gskill_16gx2_6400_d5];

// Create SSD list
$lexar_512g_m2->price = 1058;
$lexar_1t_m2->price = 1849;
$lexar_2t_m2->price = 4590;
$ssd_list = [$lexar_512g_m2,$lexar_1t_m2,$lexar_2t_m2];

// Create CASE list (new)
$case_list = [$morax_3fa];

// Create monitor list
$monitor_list =[$no_monitor,$aoc_21,$aoc_24];

// Create keyboard & mouse list (new)
$key_mouse_list = [$coolerplus_key_mouse];

// Create OS list (new)
$os_list = [$free_dos];

// Update other expenses
$others->price += 66; // extra



// Default cart (Giỏ hàng mặc định)
$cart_list = [$amd_ryzen7_7800x3d, // CPU
              $asus_prime_b650_wifi_d5,  // MAIN
              $gskill_16gx2_5600_d5,    // RAM
              $lexar_512g_m2,  // SSD
              $no_key_mouse,   // KEYBOARD MOUSE
              $morax_3fa,        // CASE
              $asus_lc360,        //COOLER
              $asus_850w,        // PSU
              $free_dos,        // OS
              $no_monitor,       // MONITOR
              $others,
              $voucher_400k];    


?>


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
        // Get all OS buttons (new)
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
        
        // Get all VGA buttons
        const allVgaButtons = document.querySelectorAll('input[name="vga"]');
        // Lấy giá từ VGA được chọn
        const selectedVga = document.querySelector('input[name="vga"]:checked');
        // Filter out the selected radio button to get the unselected ones
        const unselectedVgas = Array.from(allVgaButtons).filter(button => button !== selectedVga);
        if (selectedVga) {
            const vgaOption = selectedVga.closest('.config-option');
            let vgaProduct = JSON.parse(vgaOption.dataset.product);
            let vgaPrice = vgaProduct.price;
            let optionPrice = vgaOption.querySelector('.option-price');
            // update cart
            cart.set(vgaProduct.type,vgaProduct);
            // clear price display
            optionPrice.innerHTML = "";

            // Update FPS
            for (let i = 0; i < vgaProduct.note.length; i++) {
                document.getElementById("fps"+(i+1)).textContent = vgaProduct.note[i];
            }

            // Iterate over each unselected radio button
            unselectedVgas.forEach(button => {
                // find the parent option
                let vgaOptionUnselected = button.closest('.config-option');
                // get unselected price
                let vgaProductUnselected = JSON.parse(vgaOptionUnselected.dataset.product);
                let vgaPriceUnselected = vgaProductUnselected.price;
                // get price difference
                let priceDiff = vgaPriceUnselected - vgaPrice;
                // update display price difference
                let optionPriceUnselected = vgaOptionUnselected.querySelector('.option-price');
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
        
        // Get all MAIN buttons (new)
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
                        
                     <!-- Performance Charts Gaming -->
                    <div class="performance">
                        <h3>Hiệu Suất</h3>
                        <p>Frames Per Second (FPS)</p>
                        <ul class="game-list">
                            <li>
                                <span>Call of Duty Modern Warfare 2</span>
                                <span class="fps" id="fps1"></span>
                            </li>
                            <li>
                                <span>Starfield</span>
                                <span class="fps" id="fps2"></span>
                            </li>
                            <li>
                                <span>Fortnite</span>
                                <span class="fps" id="fps3"></span>
                            </li>
                            <li>
                                <span>League of Legends</span>
                                <span class="fps" id="fps4"></span>
                                
                            </li>
                            <li>
                                <span>GTA V</span>
                                <span class="fps" id="fps5"></span>
                            </li>
                        </ul>
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
                            <p style="font-weight: bold ">Chinh phục mọi giới hạn của gaming!</b>
                            <p>
                            ROSA Gaming PC được trang bị vi xử lý AMD Ryzen 7 7800X3D, mang đến hiệu năng đỉnh cao nhờ công nghệ 3D V-Cache tiên tiến, giúp tăng cường tốc độ xử lý và giảm độ trễ trong các tựa game nặng. Với khả năng tối ưu hóa hiệu suất đáng kinh ngạc, PC này cho phép bạn tận hưởng những trải nghiệm mượt mà ở độ phân giải cao, từ các trận đấu FPS kịch tính đến những tựa game thế giới mở đồ họa đẹp mắt. Đây là lựa chọn hoàn hảo cho các game thủ muốn đạt được sự cân bằng giữa sức mạnh, hiệu suất và hiệu quả nhiệt trong mọi trận chiến.
                            <br><br>
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
                                        <?php foreach ($os_list as $index => $product): ?>
                                            <?php if (!empty($product->popup)): ?>
                                                <div class="modal fade" id="popup-os-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content"><?= $product->popup ?></div>
                                                    </div>
                                                </div>
                                                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-os-{$index}'>Chi Tiết</a></div>"; ?>
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
                            
                            <!-- VGA Selection -->
                           <div class="config-section">
                                <h3>VGA</h3>
                                <div class="config-options">
                                    <?php foreach ($vga_list as $index => $product): ?>
                                        <?php if (!empty($product->popup)): ?>
                                            <div class="modal fade" id="popup-vga-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"><?= $product->popup ?></div>
                                                </div>
                                            </div>
                                            <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-vga-{$index}'>Chi Tiết</a></div>"; ?>
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
                                 <div class="config-section">
                                    <h5>Màn Hình</h5>
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

                    <!-- Thêm popup đơn giản -->
                <div id="simplePopup" class="popup">
                    <div class="popup-content">
                        <span class="close-btn" onclick="closePopup()">×</span>
                        <h2>THÔNG TIN ĐẶT HÀNG</h2>
                        <div class="product-info">
                            <table style="border-spacing: 10px 0; border-collapse: separate;">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <!-- <th>Giá tiền</th> -->
                                    <th>Số lượng</th>
                                    
                                </tr>
                                <tr>
                                    <td class="product-details">
                                        <img src=<?= $image_sp  ?> alt="Product">
                                        <div>
                                            <span class="product-name" id="payment-title"><?php echo $pcName;?></span>
                                            <span class="prodcut-name" id="payment-cpu"></span>
                                            <span class="prodcut-name" id="payment-main"></span>
                                            <span class="prodcut-name" id="payment-vga"></span>
                                            <span class="prodcut-name" id="payment-ram"></span>
                                            <span class="prodcut-name" id="payment-ssd"></span>
                                            <span class="prodcut-name" id="payment-case"></span>
                                            <span class="prodcut-name" id="payment-psu"></span>
                                            <span class="prodcut-name" id="payment-cooler"></span>
                                            <span class="prodcut-name" id="payment-os"></span>
                                            <span class="prodcut-name" id="payment-addon"></span>
                                            <span class="prodcut-name" id="payment-extra"></span>
                                            

                                        </div>
                                    </td>
                                    <!-- <td class="product-unit-price">
                                        <div>
                                            <span id="unit-price">0</span>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div class="quantity-control">
                                            <button onclick="decreaseQuantity()">-</button>
                                            <input type="number" id="quantity" value="1" min="1" readonly>
                                            <button onclick="increaseQuantity()">+</button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- manhinh -->
                                <tr id="payment-monitor">
                                    <td class="product-details">
                                        <img src="" alt="Product" id="monitor-img">
                                        <div>
                                            <span class="product-name" id="monitor-name"></span>
                                        </div>
                                    </td>
                                    <!-- <td class="product-unit-price">
                                        <div>
                                            <span id="monitor-unit-price">0</span>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div class="quantity-control">
                                            <button id="monitor-quantity" onlick="increaseQuantity">1</button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- voucher -->
                                <tr id="payment-voucher">
                                    <td class="product-details">
                                        <img src="" alt="Product" id="voucher-img">
                                        <div>
                                            <span class="product-name" id="voucher-name"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="quantity-control">
                                            <button id="voucher-quantity" onlick="increaseQuantity">1</button>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                            <div class="summary-total" style="display: flex; justify-content:  flex-end;"> 
                                <span style="margin-right: 10px;">Tổng Cộng:</span>
                                <span id="totalPricePayment">0</span>
                            </div>

                        </div>

                        <form id="orderForm">
                        <label style='font-weight: bold;font-size: 16px;'>Thông tin khách hàng</label>
                         <!-- Sử dụng type="tel" và pattern để yêu cầu nhập đúng định dạng số điện thoại -->
                            <input type="text" placeholder="Họ và Tên" required>
                            <div class="form-row">
                                <input type="tel" placeholder="Số điện thoại" required title="Số điện thoại phải có 10 chữ số">
                                <!-- Sử dụng type="email" để đảm bảo định dạng email hợp lệ -->
                                <input type="email" placeholder="Email">
                            </div>
                             <!-- Thông tin chuyển khoản -->
                        <label style='font-weight: bold;font-size: 16px;'>Phương thức thanh toán</label>  

                        <div class="bank-info">
                            <p>Tên tài khoản: CÔNG TY TNHH ĐIỆN TỬ VÀ TIN HỌC TOÀN VIỆT<p>
                            <p>Số tài khoản: 0381000415803</p>
                            <p>Ngân hàng: VIETCOMBANK-CHI NHÁNH THỦ ĐỨC</p>
                        </div>    
                            
                        <!-- Trong phần delivery-method của form -->
                        <div class="delivery-method">
                            <label style='font-weight: bold;font-size: 16px;'>Phương thức nhận hàng</label>
                            <div class="delivery-options">
                                <label>
                                    <input type="radio" name="delivery" value="store" checked onchange="toggleDeliveryInfo()">
                                    <img src="https://img.icons8.com/?size=48&id=117508&format=png&color=000000"/>
                                    <span>Nhận Tại Shop</span>
                                </label>
                                <label>
                                    <input type="radio" name="delivery" value="home" onchange="toggleDeliveryInfo()">
                                    <img src="https://img.icons8.com/?size=48&id=wFfu6zXx15Yk&format=png&color=000000"/>
                                    <span>Nhận Tại Nhà</span>
                                </label>
                            </div>
                        </div>

                            <!-- Thêm div để chứa thông tin giao hàng động -->
                            <div id="delivery-info">
                            </div>
                            <textarea placeholder="Lưu ý của khách hàng"></textarea>
                            
                            <button type="submit" class="order-button">Đặt hàng</button>
                        </form>
                    </div>
                </div>
                <style>
                 /* cuộn product */
                body {
                    margin: 0;
                    font-family: Arial, sans-serif;
                }

                .container {
                    display: flex;
                    flex-direction: column;
                }

                .specs-table {
                    position: sticky; /* Đặt vị trí cố định */
                    top: 120; /* Đặt vị trí cố định ở trên cùng */
                    z-index: 0; /* Đảm bảo nó nằm trên các phần tử khác */
                    padding: 16px;
                }

                .scroll-area {
                    max-height: calc(110vh - 150px); /* Chiều cao tối đa cho khu vực cuộn */
                    overflow-y: auto; /* Cho phép cuộn dọc */
                    padding: 16px;
                    margin-top: 16px; /* Khoảng cách giữa bảng và khu vực cuộn */
                }

                .config-section {
                    margin-bottom: 20px; /* Khoảng cách giữa các phần cấu hình */
                }

                .summary-total {
                    margin-top: 20px; /* Khoảng cách trên cho tổng cộng */
                }
                .popup {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    z-index: 2000;
                    overflow: hidden; /* Ngừng hiển thị thanh cuộn */

                }
                     .bank-info {
                    border: 1px solid #d3d4d6;
                    border-radius: 8px;
                    padding: 15px;
                    font-family: 'Arial', sans-serif;
                }

                .bank-info label {
                    font-size: 20px;
                    font-weight: bold;
                    color: #333;
                    margin-bottom: 15px;
                    display: block;
                    
                    
                }

                .bank-info .bank-row {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                }

                .bank-info p {
                    margin: 5px 0;
                    color: #555;
                }

                .bank-info strong {
                    color: #000;
                }
                /* Dấu nhân ở góc trên bên phải */
                .close-btn {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    font-size: 24px;
                    font-weight: bold;
                    color: #000;
                    cursor: pointer;
                }

                .close-btn:hover {
                    color: #ff0000;
                }

                .popup-content {
                    position: relative;
                    background-color: white;
                    width: 90%;
                    max-width: 800px;
                    margin: 20px auto;
                    padding: 20px;
                    border-radius: 8px;
                    max-height: 90vh;
                    overflow-y: auto;
                  
                }
                .popup h2 {
                    color: #ff0000;
                    margin-bottom: 20px;
                    text-align: center;
                }

                .product-info table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 15px;
                }

                .product-info th {
                    text-align: left;
                    padding: 10px;
                    border-bottom: 1px solid #ddd;
                }

                .product-details {
                    display: flex;
                    align-items: center;
                    gap: 30px;
                }

                .product-details img {
                    width: 200px;
                    height: auto;
                }

                .product-name {
                    display: block;
                    font-weight: bold;
                }

                .product-price {
                    display: center;
                    color: #666;
                }

                .quantity-control {
                    display: flex;
                    align-items: center;
                    gap: 5px;
                    justify-content: center;
                }

                .quantity-control button {
                    width: 30px;
                    height: 30px;
                    border: 1px solid #ddd;
                    background: white;
                    cursor: pointer;
                }

                .quantity-control input {
                    width: 50px;
                    text-align: center;
                    border: 1px solid #ddd;
                }

                .grand-total {
                    text-align: right;
                    font-size: 1.2em;
                    font-weight: bold;
                    margin: 15px 0;
                    padding-top: 10px;
                    border-top: 1px solid #ddd;
                }

                #orderForm {
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
                }

                .form-row {
                    display: flex;
                    gap: 15px;
                }

                .form-row input {
                    flex: 1;
                }
                
                input, textarea {
                    padding: 8px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                }

                .delivery-method {
                    margin: 15px 0;
                }

                .delivery-options {
                    display: flex;
                    gap: 20px;
                    margin-top: 5px;
                }

                .shipping-note {
                    background-color: #f8f9fa;
                    padding: 10px;
                    border-radius: 4px;
                    margin: 15px 0;
                }

                .shipping-note ul {
                    padding-left: 20px;
                    margin: 5px 0;
                }

                .order-button {
                    background-color: #ff0000;
                    color: white;
                    padding: 10px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    font-weight: bold;
                }

                .order-button:hover {
                    background-color: #cc0000;
                }
                .store-info {
                    background-color: #f8f9fa;
                    padding: 10px;
                    border-radius: 4px;
                    margin: 15px 0;
                }

                .store-info p {
                    margin: 0;
                    color: #333;
                }
                .delivery-options {
                display: flex;
                gap: 20px;
                margin: 10px 0;
            }

                .delivery-options label {
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    padding: 10px 15px;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }

                .delivery-options label:hover {
                    background-color: #f8f9fa;
                }

                .delivery-options i {
                    color: #0d6efd;
                    font-size: 1.2em;
                }

                .delivery-options input[type="radio"]:checked + i + span {
                    font-weight: bold;
                }

                .delivery-options label:has(input[type="radio"]:checked) {
                    border-color: #0d6efd;
                    background-color: #e7f1ff;
                }
            /* Trên điện thoại (màn hình có chiều rộng <= 768px) */
            @media (max-width: 768px) {
                /* Sửa kiểu hiển thị của phần .product-details */
                .product-details {
                    flex-direction: column; /* Đặt các phần tử nằm dưới nhau thay vì ngang */
                    align-items: center; /* Căn giữa các phần tử */
                    gap: 15px; /* Khoảng cách giữa các phần tử */
                }

                .product-details img {
                    width: 100%; /* Điều chỉnh ảnh để nó chiếm toàn bộ chiều rộng */
                    height: auto;
                }

                .product-name {
                    font-size: 1em; /* Giảm kích thước chữ tên sản phẩm */
                }

                .product-price {
                    font-size: 0.9em; /* Giảm kích thước chữ giá sản phẩm */
                }

                .quantity-control {
                    flex-direction: row; /* Đặt các phần tử điều khiển số lượng nằm ngang */
                    justify-content: center; /* Căn giữa các phần tử */
                }

                .quantity-control input {
                    width: 40px; /* Điều chỉnh chiều rộng cho số lượng */
                }

                /* Giảm kích thước tổng cộng */
                .grand-total {
                    font-size: 1em; /* Giảm kích thước chữ tổng cộng */
                }

                /* Điều chỉnh kích thước chữ trong các form */
                input, textarea {
                    font-size: 0.9em; /* Giảm kích thước chữ trong input và textarea */
                }

                .store-info p {
                    font-size: 0.9em; /* Giảm kích thước chữ thông tin cửa hàng */
                }
                
                
            }
                </style>

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
                        voucher.display = false;
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
                        voucher.display = false;
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
                // document.getElementById('province').addEventListener('change', () => {
                //     updateDistricts();
                // });
                
                // // Sự kiện khi thay đổi quận/huyện
                // document.getElementById('districts').addEventListener('change', () => {
                //     const province = document.getElementById('province').value;
                //     const district = document.getElementById('districts').value;
                //     displayStores(province, district);
                // });


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
                    width: 90%;
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

            <!-- Modals -->
            <!-- OS Modal -->
            <div class="modal fade" id="osModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tính năng nổi bật của Windows 11 Pro</h5>
                            <button type="button" class="close" data-dismiss="modal">x</button>
                        </div>
                        <div class="modal-body">
                        <!--<img src="../assets/images/win11pro.jpg" alt="Windows 11 Pro" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">-->
                        <ul>
                            <li><b>Bảo mật nâng cao: </b>Tích hợp BitLocker, bảo vệ dữ liệu an toàn.</li>
                            <li><b>Quản lý thiết bị từ xa: </b>Hỗ trợ Azure Active Directory và Group Policy.</li>
                            <li><b>Ảo hóa: </b>Cung cấp Hyper-V và Windows Sandbox cho môi trường thử nghiệm.</li>
                            <li><b>Tối ưu đa nhiệm: </b>Snap Layouts, Snap Groups giúp sắp xếp cửa sổ dễ dàng.</li>
                            <li><b>Tích hợp Microsoft Teams: </b>Kết nối nhanh chóng và tiện lợi cho công việc.</li>
                            <li><b>Windows Copilot: </b>Trợ lý AI tích hợp hỗ trợ tìm kiếm, quản lý và tăng hiệu suất làm việc.</li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CPU Modal -->
            <div class="modal fade" id="cpuModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Giới thiệu về Ryzen 3 Pro 4350G</h5>
                            <button type="button" class="close" data-dismiss="modal">x</button>
                        </div>
                        <div class="modal-body">
                        <img src="../assets/images/ryzen3-4350g.jpg" alt="Ryzen 3 Pro 4350G" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
                            <p class="mb-4">
                            AMD Ryzen 3 Pro 4350G là lựa chọn tuyệt vời cho máy tính văn phòng nhờ hiệu năng mạnh mẽ với 4 nhân, 8 luồng và đồ họa tích hợp Radeon Vega. 
                            Bộ vi xử lý này đáp ứng tốt các tác vụ như soạn thảo, bảng tính, họp trực tuyến và xem video, đồng thời tiết kiệm chi phí khi không cần card đồ họa rời. 
                            Với TDP 65W, 4350G hoạt động mát mẻ, tiết kiệm điện, lý tưởng cho hệ thống văn phòng hiện đại.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RAM Modal -->
            <div class="modal fade" id="ramModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">RAM nào phù hợp với bạn?</h5>
                            <button type="button" class="close" data-dismiss="modal">x</button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-4">RAM rất quan trọng để chạy các ứng dụng trên PC của bạn. Nó lưu
                                trữ dữ liệu tạm thời để giúp PC của bạn quản lý nhiều tác vụ cùng một lúc. Nhiều RAM hơn
                                cho phép đa nhiệm và phản hồi tốt hơn.</p>

                            <div class="ram-options">
                                <div class="ram-option">
                                    <div class="ram-size">8GB</div>
                                    <div class="ram-desc">Đáp ứng hiệu quả các tác vụ văn phòng thường ngày như soạn thảo, xử lý bảng tính và họp trực tuyến. 
                                        Đây là mức dung lượng phù hợp để đảm bảo hệ thống vận hành ổn định trong các công việc cơ bản.</div>
                                </div>

                                <div class="ram-option">
                                    <div class="ram-size">16GB</div>
                                    <div class="ram-desc">Lựa chọn lý tưởng cho những tác vụ đòi hỏi hiệu năng cao như chỉnh sửa hình ảnh, 
                                        chạy đa nhiệm nặng hoặc sử dụng nhiều ứng dụng đồng thời. 
                                        Dung lượng này giúp hệ thống hoạt động mượt mà, ổn định và sẵn sàng đáp ứng các nhu cầu mở rộng trong tương lai.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SSD Modal -->
            <div class="modal fade" id="SSDModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">SSD nào phù hợp với bạn?</h5>
                            <button type="button" class="close" data-dismiss="modal">x</button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-4">SSD quyết định số lượng tệp và tài liệu bạn có thể lưu trữ trên máy tính. Dung lượng càng nhiều, máy sẽ chứa được nhiều dữ liệu hơn.</p>

                            <div class="component-options">
                                <div class="option-item">
                                    <h4>256G SATA3 SSD:</h4>
                                    Lựa chọn phù hợp cho máy tính văn phòng dùng cho các tác vụ cơ bản như lướt web, làm việc với tài liệu và email. 
                                    Với dung lượng này, bạn sẽ có đủ không gian cho hệ điều hành và các phần mềm cần thiết, đảm bảo hiệu suất mượt mà trong công việc hàng ngày.
                                </div>

                                <br>

                                <div class="option-item">
                                    <h4>512G SATA3 SSD:</h4>
                                    Lý tưởng cho những ai cần không gian lưu trữ lớn hơn cho dữ liệu công việc, tài liệu, và phần mềm chuyên dụng. 
                                    Dung lượng này mang lại sự linh hoạt, giúp bạn lưu trữ nhiều tệp và ứng dụng mà không lo thiếu không gian, đồng thời duy trì hiệu suất ổn định trong công việc đa nhiệm.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- LCD Modal -->
            <div class="modal fade" id="LCDModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Màn Hình AOC</h5>
                            <button type="button" class="close" data-dismiss="modal">x</button>
                        </div>
                        <div class="modal-body">
                            
                            <div class="component-options">
                                <div class="option-item">
                                    <h4>22B30HM23/74</h4>
                                    <h5>22" Phẳng - FHD - VA - 120Hz - 1ms - 1xDsub - 1x HDMI</h5>
                                    <img src="/assets/images/aoc22.png" alt="Ryzen 3 Pro 4350G" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
                                    Sắc nét, siêu mỏng, mượt mà ! VA góc nhìn rộng, công nghệ khử nhấp nháy, chế độ ánh sáng xanh, FULL HD, không viền 3 cạnh. 22B30HM23 là màn hình có tính năng đồng bộ hóa thích ứng, Công nghệ chống xé hình, tần số quét 120Hz và thời gian phản hồi MPRT
                                    <br><br>
                                    <a href="https://vn.aoc.com/product/22B30HM23-74" target="_blank">Xem thêm ></a>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
            <p style="color:black;">ROSA Gaming PC sử dụng vi xử lý AMD Ryzen 7 7800X3D, nổi bật với công nghệ 3D V-Cache tiên tiến, mang lại khả năng xử lý vượt trội và giảm độ trễ, đặc biệt trong các tựa game đòi hỏi hiệu suất cao. Với hiệu năng tối ưu đáng kinh ngạc, hệ thống này đảm bảo trải nghiệm mượt mà ở độ phân giải cao, từ những trận chiến FPS kịch tính đến những tựa game thế giới mở sống động. Đây chính là sự lựa chọn lý tưởng cho game thủ đam mê hiệu suất mạnh mẽ, ổn định và khả năng tản nhiệt hiệu quả.
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
                            color: #000;
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
        font-family: Arial, sans-serif;
        background-color: #FFF;
        margin: 0;
        padding: 65px 16px ;
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
// Khởi động session
session_start();

// Nhập tệp common.php
include '../data/common.php';

// Lấy tên tệp hiện tại (loại bỏ đường dẫn)
$current_page = basename($_SERVER['PHP_SELF']); // Ví dụ: "ROSA-OFFICE.php"

// Danh sách sản phẩm đã được chọn (lưu trong session nếu có)
$selected_products = isset($_SESSION['random_products']) ? $_SESSION['random_products'] : [];

// Lọc danh sách sản phẩm
$filtered_list_sp = array_filter($list_sp, function ($product) use ($current_page, $selected_products) {
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

// Kiểm tra số lượng sản phẩm có thể hiển thị
$num_products_to_display = 3; // Số sản phẩm muốn hiển thị
if (count($filtered_list_sp) < $num_products_to_display) {
    echo "<p>Không có đủ sản phẩm để hiển thị.</p>";
    return;
}

// Chọn ngẫu nhiên số sản phẩm cần hiển thị từ danh sách đã lọc
$random_products = [];
$used_indexes = [];
$filtered_list_array = array_values($filtered_list_sp); // Chuyển danh sách về mảng có chỉ mục

while (count($random_products) < $num_products_to_display) {
    $random_index = rand(0, count($filtered_list_array) - 1);
    if (!in_array($random_index, $used_indexes)) {
        $random_products[] = $filtered_list_array[$random_index];
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
    // Sửa đường dẫn đúng cách
    $product_page = ltrim($product->page, '/'); // Loại bỏ ký tự `/` thừa ở đầu nếu có
    $product_page = preg_replace('/^(sanpham\/)+/', 'sanpham/', $product_page); // Loại bỏ dư "sanpham/"
    $product_url = "/{$product_page}";

    // Hiển thị sản phẩm
    echo "<div class='product-item'>"; // Thêm class cho mỗi sản phẩm
    echo "<a href='$product_url'>"; // Đưa link bao quanh hình ảnh
    echo "<img src='../$product->image' alt='{$product->title}' onerror=\"this.src='default-image.png';\">";
    echo "</a>";
    echo "<h3 class='product-title'>{$product->title}</h3>";
    echo "<p>{$product->subtitle}</p>";
    echo "<ul>";
    foreach (explode("\n", $product->content) as $line) {
        echo "<li>$line</li>";
    }
    echo "</ul>";
    echo "<b class='product-price'> {$product->price}</b>";
    echo "<a href='$product_url'style='margin-top: 5%;'>Mua ngay</a>";
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
    /*display: flex;*/
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    height: auto;
    margin-top: 5%;
}


.product-price {
    align-self: flex-start; /* Đặt giá bên trái */
    margin-top: 10px; /* Tạo khoảng cách giữa giá và các phần tử khác */
    font-size: 18px;
    color:#FF0000;
}

.product-title {
    color: #000;
    font-size: 25px;
    align-self: flex-start; /* Đẩy giá về phía bên trái */
    margin-top: 16px; /* Khoảng cách phía trên giá */
    text-align: left; /* Căn chỉnh nội dung bên trong sang trái */
    width: 100%; /* Đảm bảo giá chiếm toàn bộ chiều rộng */
    font-weight: bold;
    /*text-align: center;*/
}

.product-item img {
    width: 100% !important;
    max-width: 290px !important;
    height: 250px !important;
    object-fit: cover !important;
    object-position: center !important;
    border-radius: 10px !important;
}


.product-item h3 {
    font-size: 16px;
    margin: 10px 0;
    color: red;
}

.product-item p {
    font-size: 16px;
    color: #000000;
    margin: 23px 0;
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

/* Chỉ áp dụng CSS cho nút "Mua ngay" */
.product-item a:last-of-type {
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

.product-item a:last-of-type:hover {
    background-color: #cc0000; /* Màu khi hover */
}

/* Không áp dụng kiểu cho thẻ a bọc hình ảnh */
.product-item a img {
    display: block; /* Giữ nguyên hiển thị của hình ảnh */
    width: 100%; /* Giữ kích thước hình ảnh */
    height: auto;
    border: none;
    background: none;
    padding: 0;
}

/* .product-item a:hover {
    background-color: #cc0000; /* Màu khi hover */
} */

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

