<?php
// Dealers
$dealers = ["Viết Sơn - 150ter Bùi Thị Xuân",
            "Long Binh - 50 Đ. Nguyễn Cư Trinh",
            "Thành Nhân - 180 Đ. Bùi Thị Xuân"];

// Products 
class Product
{   
    public $name;  // tên sản phẩm
    public $type;  // loại sản phẩm e.g. cpu,ram,...
    public $group; // nhóm sản phẩm e.g. pc hay phụ kiện
    public $price; // giá 
    public $note; // ghi chú
    public $sub_note;  // ghi chú dưới
    public $side_note;  // ghi chú ngang
    public $img_path;
    public $display;
    public $popup;

    public function __construct($name="", $type = "", $price = 0, $note = "", $sub_note = "", $side_note = "", $img_path = "", $display = True, $popup = ""){
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->note = $note;
        $this->sub_note = $sub_note;
        $this->side_note = $side_note;
        $this->img_path = $img_path;
        $this->display = $display;
        $this->popup = $popup;
    }
}

// ---- CPU ----
$amd_ryzen3_4350g = new Product(name:"AMD Ryzen 3 Pro 4350G", type:"cpu", price:2149, note:"", sub_note:"4 Cores/8 Threads, 4M Cache"); 
$amd_ryzen5_4650g = new Product(name:"AMD Ryzen 5 PRO 4650G", type:"cpu", price:3286, note:"", sub_note:"6 Cores/12 Threads, 8M Cache"); 
$amd_ryzen7_5700g = new Product(name:"AMD Ryzen 7 5700G", type:"cpu", price:5142, note:"", sub_note:"8 Cores/16 Threads, 16M Cache"); 
$amd_ryzen5_5600x = new Product(name:"AMD Ryzen 5 5600X", type:"cpu", price:3303, note:"", sub_note:"6 Cores/12 Threads, 32M Cache"); 
$amd_ryzen7_7800x3d = new Product(name:"AMD Ryzen 7 7800X3D", type:"cpu", price: 9680, note:"", sub_note:"8 Cores/16 Threads, 96M Cache"); 

$intel_i5_13400 = new Product(name:"Intel Core I5 13400", type:"cpu", price:5579, note:"", sub_note:"10 Cores/16 Threads, 20M Cache");
$intel_i7_14700F = new Product(name:"Intel Core I7 14700F", type:"cpu", price:9008, note:"", sub_note:"20 Cores/28 Threads, 33M Cache");
$intel_i5_14400 = new Product(name:"Intel Core I5 14400", type:"cpu", price:5739, note:"", sub_note:"10 Cores/16 Threads, 20M Cache");  

$intel_n100 = new Product(name:"Intel N100", type:"cpu", price:0, note:"", sub_note:"4 Cores/4 Threads, 6M Cache");

// ---- Mini PC ----
$minipc_nuc12i3 = new Product(name:"I3-1220P <br>ASUS NUC12 PRO Tall RNUC12WSHI300000I", type:"minipc", price: 7451, note:["port_front" => "2 x USB 3.2, 1 x 3.5mm Headset Jack",
                                                                                                                           "port_rear" => "1 x USB 3.2, 1 x USB 2.0, 2 x Thunderbolt, 1 x LAN 1Gb/s Ethernet",
                                                                                                                           "display" => "2 x HDMI"], sub_note:"10 Cores/12 Threads, 12M Cache"); 
$minipc_nuc12i5 = new Product(name:"I5-1240P <br>ASUS NUC12 PRO Tall RNUC12WSHI500000I", type:"minipc", price: 9992, note:["port_front" => "2 x USB 3.2, 1 x 3.5mm Headset Jack",
                                                                                                                           "port_rear" => "1 x USB 3.2, 1 x USB 2.0, 2 x Thunderbolt, 1 x LAN 1Gb/s Ethernet",
                                                                                                                           "display" => "2 x HDMI"], sub_note:"12 Cores/16 Threads, 12M Cache"); 
$minipc_nuc12i7 = new Product(name:"I7-1260P <br>ASUS NUC12 PRO Tall RNUC12WSHI700000I", type:"minipc", price: 14564, note:["port_front" => "2 x USB 3.2, 1 x 3.5mm Headset Jack",
                                                                                                                           "port_rear" => "1 x USB 3.2, 1 x USB 2.0, 2 x Thunderbolt, 1 x LAN 1Gb/s Ethernet",
                                                                                                                           "display" => "2 x HDMI"], sub_note:"12 Cores/16 Threads, 18M Cache"); 

$minipc_nuc13i3 = new Product(name:"I3-1315U <br>Asus NUC13 PRO Tall RNUC13ANHI300001I", type:"minipc", price: 9231, note:["port_front" => "2 x USB 3.2, 1 x 3.5mm Headset Jack",
                                                                                                                           "port_rear" => "1 x USB 3.2, 1 x USB 2.0, 2 x Thunderbolt, 1 x LAN 1Gb/s Ethernet",
                                                                                                                           "display" => "2 x HDMI"], sub_note:"6 Cores/8 Threads, 10M Cache, IPU"); 
$minipc_nuc13i5 = new Product(name:"I5-1340P <br>Asus NUC13 PRO Tall RNUC13ANHI500001I", type:"minipc", price: 11966, note:["port_front" => "2 x USB 3.2, 1 x 3.5mm Headset Jack",
                                                                                                                           "port_rear" => "1 x USB 3.2, 1 x USB 2.0, 2 x Thunderbolt, 1 x LAN 1Gb/s Ethernet",
                                                                                                                           "display" => "2 x HDMI"], sub_note:"12 Cores/16 Threads, 12M Cache"); 
$minipc_nuc13i7 = new Product(name:"I7-1360P <br>ASUS NUC13 PRO Tall RNUC13ANHI700000I", type:"minipc", price: 16069, note:["port_front" => "2 x USB 3.2, 1 x 3.5mm Headset Jack",
                                                                                                                           "port_rear" => "1 x USB 3.2, 1 x USB 2.0, 2 x Thunderbolt, 1 x LAN 1Gb/s Ethernet",
                                                                                                                           "display" => "2 x HDMI"], sub_note:"12 Cores/16 Threads, 18M Cache"); 


// ---- VGA ----
$asus_3050 = new Product(name:"ASUS DUAL RTX3050 O6G", type:"vga", price:4817, note:[97,47,108,365,127], sub_note:"");
$asus_4060 = new Product(name:"ASUS DUAL RTX4060 O8G V2", type:"vga", price:8026, note:[97,47,108,365,127], sub_note:""); 
$asus_4060ti = new Product(name:"ASUS DUAL RTX4060TI O16G EVO", type:"vga", price:13940, note:"", sub_note:""); 
$asus_4070 = new Product(name:"ASUS DUAL RTX4070 012G EVO", type:"vga", price:18077, note:[152,78,171,405,148], sub_note:""); 
$asus_4070ti = new Product(name:"ASUS TUF RTX4070TI SUPER O16G", type:"vga", price:27506, note:[204,99,214,350,161], sub_note:"");

$powercolor_7600xt = new Product(name:"POWERCOLOR FIGHTER RX7600XT 16G", type:"vga", price:10041, note:[129,56,150,462,121], sub_note:"");

$asus_4070_hinh = new Product(name:"ASUS DUAL RTX4070 012G EVO", type:"vga", price: 16366, note:[152,78,171,405,148], sub_note:""); 
$asus_4070ti_hinh = new Product(name:"ASUS TUF RTX4070TI SUPER O16G", type:"vga", price: 25750, note:[204,99,214,350,161], sub_note:"");

// ---- MAINBOARD ----
$asus_prime_a520 = new Product(name:"ASUS PRIME A520M-K D4", type:"main", price:1303, note:["port" => "4 x USB 3.1, 2 x USB 2.0, 3 x Audio jack(s), 1 x PS/2 keyboard/mouse combo port(s), 1 x LAN 1Gb/s Ethernet",
                                                                                     "display" => "1 x HDMI, 1 x DisplayPort"], sub_note:"");
$asus_prime_a520 -> popup= '
<div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        <div class="modal-body">
             <h4>ASUS PRIME A520M-K D4</h4>
            <img src="../assets/images/MAINBOARD_520.png" alt="a520" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">

            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
           
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Chipset</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">A520</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Socket</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">AM4</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kích thước </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Micro-ATX.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe RAM tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2 khe.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu RAM hỗ trợ</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">DDR4.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Hỗ trợ bộ nhớ tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">64GB</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Bus RAM hỗ trợ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4866(OC), 4600(O.C.), 4466(OC), 4333(OC), 4133(O.C.), 4400(OC), 4266(O.C.), 4200(OC), 4133(OC), 4400(O.C.)</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lưu trữ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x SATA 3 6Gb/s, 1 x M.2 SATA/NVMe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu khe M.2 hỗ trợ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">M.2 SATA/NVMe</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Cổng xuất hình</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">1 x VGA/D-sub, 1 x HDMI</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe PCI</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1x PCIe 3.0 x16; 2 x PCIe 3.0 x1</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Số cổng USB</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x USB 3.2 (tối đa 6); 2 x USB 2.0 (tối đa 6)</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lan</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1 x LAN 1 Gb/s</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Âm thanh</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Realtek ALC887/897 7.1 Surround Sound CODEC Âm thanh HD</td>
                </tr>
                
            </tbody>
        </table>
        <br></br>
            <a href="https://www.asus.com/vn/motherboards-components/motherboards/prime/prime-a520m-k/" target="_blank">Xem thêm ></a>
        </div>
';

$asus_prime_b550 = new Product(name:"ASUS PRIME B550M-A D4", type:"main", price:2471, note:["port" => "2 x USB 3.2 Gen 2, 4 x USB 3.2 Gen 1, 3 x Audio jack(s), 1 x PS/2 keyboard/mouse combo port(s), 1 x LAN 1Gb/s Ethernet",
                                                                                     "display" => "1 x HDMI, 1 x D-Sub, 1 x DVI"], sub_note:"");
$asus_prime_b550 -> popup ='
<div class="modal-header">
        <h5 class="modal-title">ASUS PRIME B550M-A D4</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
    <div class="modal-body">
        <img src="../assets/images/MAINBOARD_B550M-A.png" alt="B550M-A" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f1f1f1;">
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Tính năng</th>
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Mô tả</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Chipset</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">AMD B550</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Socket</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">AM4</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kích thước </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">24.4 cm x 24.4  cm </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe RAM tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 khe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu RAM hỗ trợ</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">DDR4</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Hỗ trợ bộ nhớ tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">128GB</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Bus RAM hỗ trợ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4866(O.C)/4800(O.C.)/4400(O.C)/4200(O.C.)/4000(O.C.)/3600(O.C.)/3400(O.C.)
                                                                        /3200/3000/2933/2800/2666/2400/2133 MHz</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lưu trữ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x SATA 3 6Gb/s, 1 x M.2 SATA/NVMe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu khe M.2 hỗ trợ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">M.2 SATA/NVMe</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Cổng xuất hình</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">1  x HDMI 2.1, 1  x DVI-D, 1  x VGA</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe PCI</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1x PCIe 3.0 x16; 2 x PCIe 3.0 x1</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Số cổng USB</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x USB 3.2 Gen 1, 2 x USB 3.2 Gen 2 </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lan</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1 x LAN 1 Gb/s</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Âm thanh</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Realtek ALC887 7.1 Surround Sound High Definition Audio CODEC</td>
                </tr>
                
            </tbody>
        </table>
         <br></br>
            <a href="https://www.asus.com/vn/motherboards-components/motherboards/prime/prime-b550m-a/" target="_blank">Xem thêm ></a>
        </div>
    ';

$asus_prime_b650_wifi_d5 = new Product(name:"ASUS TUF GAMING B650M-E WIFI", type:"main", price: 4292, note:["port" => "2 x USB 3.2 Gen 2, 2 x USB 3.2 Gen 1, 4 x USB 2.0 ports, 1 x Wi-Fi Module, 3 x Audio jacks, 1 x PS/2 Keyboard/Mouse combo port, 1 x LAN 1Gb/s Ethernet",
                                                                                     "display" => "2 x DisplayPort, 1 x HDMI"], sub_note:"");
$asus_prime_b650_wifi_d5 -> popup ='
<div class="modal-header">
        <h5 class="modal-title">ASUS TUF GAMING B650M-E WIFI</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
    <div class="modal-body">
        <img src="../assets/images/MAINBOARD_B650M-E.jpg" alt="B550M-A" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f1f1f1;">
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Tính năng</th>
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Mô tả</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Chipset</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">AMD B650 Chipset</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Socket</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">LGA AM5</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kích thước </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">24.4 cm x 24.4  cm </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe RAM tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 khe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu RAM hỗ trợ</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">DDR4</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Hỗ trợ bộ nhớ tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">128GB</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Bus RAM hỗ trợ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4866(O.C)/4800(O.C.)/4400(O.C)/4200(O.C.)/4000(O.C.)/3600(O.C.)/3400(O.C.)
                                                                        /3200/3000/2933/2800/2666/2400/2133 MHz</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lưu trữ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x SATA 3 6Gb/s, 1 x M.2 SATA/NVMe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu khe M.2 hỗ trợ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">M.2 SATA/NVMe</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Cổng xuất hình</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">1  x HDMI 2.1, 1  x DVI-D, 1  x VGA</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe PCI</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1x PCIe 3.0 x16; 2 x PCIe 3.0 x1</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Số cổng USB</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x USB 3.2 Gen 1, 2 x USB 3.2 Gen 2 </td>
                </tr>
               
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Wifi</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">Realtek® RTL8125BG 2.5Gbps LAN</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Âm thanh</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Realtek® ALC897 Codec, 7.1-Channel High Definition Audio</td>
                </tr>
                
            </tbody>
        </table>
         <br></br>
            <a href="https://www.asus.com/vn/motherboards-components/motherboards/tuf-gaming/tuf-gaming-b650m-e-wifi/" target="_blank">Xem thêm ></a>
        </div>
    ';
                                                                                 
                                                                                     
$asus_prime_b650_ayw_wifi_d5 = new Product(name:"ASUS B650M-AYW WIFI", type:"main", price: 3147, note:["port" => "2 x USB 10Gbps,2 x USB 5Gbps, 4 x USB 2.0, 1 x Wi-Fi Module, 3 x Audio jacks, 1 x LAN 1Gb/s Ethernet",
                                                                                     "display" => "1 x HDMI"], sub_note:"");
$asus_prime_b650_ayw_wifi_d5 -> popup ='
<div class="modal-header">
        <h5 class="modal-title">ASUS B650M-AYW WIFI</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
    <div class="modal-body">
        <img src="../assets/images/MAINBOARD_B650M_AYW_WIFI.png" alt="B550M-AYW" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f1f1f1;">
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Tính năng</th>
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Mô tả</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Chipset</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">B650</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Socket</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1700</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kích thước </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Micro-ATX: 24.4 cm x 22.1 cm.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe RAM tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2 khe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu RAM hỗ trợ</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">DDR5</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Hỗ trợ bộ nhớ tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">96GB</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Bus RAM hỗ trợ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">8000+ MT/s (OC)</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lưu trữ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        - 2 khe M.2 hỗ trợ PCIe 4.0 x4<br>
                        - 4 cổng SATA 6Gb/s
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu khe M.2 hỗ trợ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2242/2260/2280</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Cổng xuất hình</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">1 x HDMI</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe PCI</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1 x PCIe 4.0 x16 </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Số cổng USB</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        - 2 x USB 3.2 
                        - 4 x USB 2.0 (Tối đa 6)
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>WIFI</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">WiFi 6 (802.11ax)</td>
                </tr>
                
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Âm thanh</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Realtek 7.1 Surround Sound High Definition Audio CODEC.</td>
                </tr>
                
            </tbody>
        </table>
         <br></br>
            <a href="https://www.asus.com/motherboards-components/motherboards/others/b650m-ayw-wifi/" target="_blank">Xem thêm ></a>
        </div>

';


                                                                                     

$asus_prime_h610 = new Product(name:"ASUS PRIME H610M-K D4", type:"main", price:1706, note:["port" => "2 x USB 3.2, 4 x USB 2.0, 3 x Audio jacks, 1 x PS/2 Keyboard/Mouse combo port, 1 x LAN 1Gb/s Ethernet",
                                                                                     "display" => "1 x HDMI, 1 x D-Sub"], sub_note:"");
$asus_prime_h610 -> popup = '
<div class="modal-header">
        <h5 class="modal-title">ASUS PRIME H610M-K D4</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
    <div class="modal-body">
        <img src="../assets/images/MAINBOARD_H610M-K D4.png" alt="B550M-A" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f1f1f1;">
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Tính năng</th>
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Mô tả</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Chipset</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">H610 Chipset</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Socket</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1700</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kích thước </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Micro-ATX</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe RAM tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2 khe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu RAM hỗ trợ</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">DDR4</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Hỗ trợ bộ nhớ tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">64GB</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Bus RAM hỗ trợ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2800MHz, 2400MHz, 2666MHz, 3000MHz, 3200MHz, 2933MHz, 2133MHz</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lưu trữ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x SATA 3 6Gb/s, 1 x M.2 SATA/NVMe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu khe M.2 hỗ trợ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">M.2 SATA/NVMe</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Cổng xuất hình</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">1 x HDMI, 1 x VGA/D-sub</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe PCI</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1 x PCIe 4.0 x16, 1 x PCIe 3.0 x1</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Số cổng USB</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;"> 2 x USB 3.2 (Tối đa 4)</td>
                    <td style="padding: 10px; border: 1px solid #ddd;"> 4 x USB 2.0 (Tối đa 6)</td>

                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lan</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1 x LAN 1 Gb/s</td>
                </tr>
                
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Âm thanh</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Realtek 7.1 Surround Sound High Definition Audio CODEC*</td>
                </tr>
                
            </tbody>
        </table>
         <br></br>
            <a href="https://www.asus.com/vn/motherboards-components/motherboards/prime/prime-h610m-k-d4/" target="_blank">Xem thêm ></a>
        </div>
    ';
$asus_prime_b760 = new Product(name:"ASUS PRIME B760M-K", type:"main", price:2346 , note:["port" => "4 x USB 3.2, 2 x USB 2.0, 3 x Audio jacks, 1 x PS/2 Keyboard/Mouse combo port, 1 x LAN 2.5Gb/s Ethernet",
                                                                                     "display" => "1 x HDMI, 1 x D-Sub"], sub_note:"");
$asus_prime_b760 ->popup ='
<div class="modal-header">
        <h5 class="modal-title">ASUS PRIME B760M-K</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
    <div class="modal-body">
        <img src="../assets/images/MAINBOARD_H610M-K D4.png" alt="B550M-A" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f1f1f1;">
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Tính năng</th>
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Mô tả</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Chipset</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">B760</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Socket</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1700</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kích thước </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Micro-ATX</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe RAM tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2 khe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu RAM hỗ trợ</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">DDR4</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Hỗ trợ bộ nhớ tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">64GB</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Bus RAM hỗ trợ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2 x DIMM, Max. 64GB, DDR4</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">5333(OC)/5066(OC)/5000(OC)/4800(OC)/4600(OC)/4400(OC)/4266(OC)/4000(OC)/3733(OC)/3600(OC)/3466(OC)/3400(OC)/3333(OC)
                                                                     /3200/3000/2933/2800/2666/2400/2133 Non-ECC, Un-buffered Memory</td>

                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lưu trữ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x SATA 3 6Gb/s, 1 x M.2 SATA/NVMe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu khe M.2 hỗ trợ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">M.2 SATA/NVMe</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Cổng xuất hình</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">1 x HDMI, 1 x VGA/D-sub</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe PCI</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1 x PCIe 4.0 x16, 1 x PCIe 3.0 x1</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Số cổng USB</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;"> 2 x USB 3.2 (Tối đa 4)</td>
                    <td style="padding: 10px; border: 1px solid #ddd;"> 4 x USB 2.0 (Tối đa 6)</td>

                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lan</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1 x Realtek 2.5Gb Ethernet</td>
                </tr>
                
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Âm thanh</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Realtek 7.1 Surround Sound High Definition Audio CODEC</td>
                </tr>
                
            </tbody>
        </table>
         <br></br>
            <a href="https://www.asus.com/vn/motherboards-components/motherboards/prime/prime-h610m-k-d4/" target="_blank">Xem thêm ></a>
        </div>
    ';


$asus_prime_b760_d5 = new Product(name:"ASUS TUF GAMING B760M-PLUS II", type:"main", price:3491 , note:["port" => "1 x USB 20Gbps, 1 x USB 10Gbps , 2 x USB 5Gbps, 4 x USB 2.0 , 5 x Audio jacks, 1 x Optical S/PDIF, 1 x LAN 2.5Gb/s Ethernet",
                                                                                     "display" => "1 x HDMI, 1 x DisplayPort"], sub_note:"");
$asus_prime_b760_d5 ->popup = '
<div class="modal-header">
        <h5 class="modal-title">ASUS TUF GAMING B760M-PLUS II</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
    <div class="modal-body">
        <img src="../assets/images/MAINBOARD-B760M-PLUS-ll.png" alt="B550M-A" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f1f1f1;">
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Tính năng</th>
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Mô tả</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Chipset</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">B760</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Socket</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1700</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kích thước </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Micro-ATX</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe RAM tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2 khe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu RAM hỗ trợ</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">DDR5</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Hỗ trợ bộ nhớ tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">64GB</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Bus RAM hỗ trợ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">7800+(OC), 7000(OC), 6800(OC), 6600(OC), 6400(OC), 6200(OC), 6000(OC), 5800(OC), 5600(OC), 5400(OC)</td>

                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lưu trữ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x SATA 3 6Gb/s, 3 x M.2 NVMe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu khe M.2 hỗ trợ *</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">M.2 SATA/NVMe</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Cổng xuất hình</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">1 x HDMI, 1 x DisplayPort</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe PCI</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1 x PCIe 5.0 x16; 1 x PCIe 4.0 x4 slot; 1 x PCIe 3.0 x1 slot</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Số cổng USB</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                    -  1 x USB Type-C(Tối đa 2)
                    -  1 x USB 10Gbps
                    -  2 x USB 5Gbps
                    -  4 x USB 2.0(Tối đa 7)
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lan</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">1 x LAN 2.5Gb/s</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kết nối không dây</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">WiFi 802.11 ax</td>
                </tr>
                
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Âm thanh</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Realtek 7.1 Surround Sound High Definition Audio CODEC</td>
                </tr>
                
            </tbody>
        </table>
         <br></br>
            <a href="https://www.asus.com/motherboards-components/motherboards/tuf-gaming/tuf-gaming-b760m-plus-ii/" target="_blank">Xem thêm ></a>
        </div>


';

$asus_prime_b760_wifi_d5 = new Product(name:"ASUS PRIME B760M-A WIFI", type:"main", price:3700 , note:["port" => "2 x USB 3.2, 4 x USB 2.0, 3 x Audio jacks, 1 x PS/2 Keyboard/Mouse combo port, 1 x LAN 2.5Gb/s Ethernet, 1 x Wi-Fi Module",
                                                                                     "display" => "2 x HDMI, 1 x DisplayPort"], sub_note:"");
$asus_prime_b760_wifi_d5 -> popup ='
<div class="modal-header">
        <h5 class="modal-title">ASUS PRIME B760M-A WIFI</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
    <div class="modal-body">
        <img src="../assets/images/MAINBOARD-PRIME-B760M-AWIFI" alt="B550M-A" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f1f1f1;">
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Tính năng</th>
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Mô tả</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Chipset</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Intel B760</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Socket</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">LGA 1700</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kích thước </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">24.4 cm x 24.4 cm (Micro ATX)</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe RAM tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 khe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu RAM hỗ trợ</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">DDR5</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Hỗ trợ bộ nhớ tối đa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">128 GB</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Bus RAM hỗ trợ</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        -  DDR4 
                        -  5333(OC)/5066(OC)/5000(OC)/4800(OC)/4600(OC)/4400(OC)/4266(OC)/4000(OC)/3733(OC)/
                           3600( OC)/3466(OC)/3400(OC)/3333(OC)/3200/3000/2933/2800/2666/2400/2133 Non-ECC, Un-buffered Memory
                    </td>

                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Lưu trữ </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">4 x SATA 3 6Gb/s, 3 x M.2 NVMe</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Kiểu khe M.2 hỗ trợ </b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">M.2 SATA/NVMe</td>
                </tr>
                 <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Cổng xuất hình</b></td>
                        <td style="padding: 10px; border: 1px solid #ddd;">
                           1 x DisplayPort, 2 x HDMI
                        </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Khe PCI</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        1 x PCIe 5.0 x16; 1 x PCIe 4.0 x4 slot; 1 x PCIe 3.0 x1 slot
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Số cổng USB</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                      2 x USB 3.2 Gen 2 Type-A, 4 x USB 2.0 Type-A
                    </td>
                </tr>
                
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>WIFI</b></td>*
                    <td style="padding: 10px; border: 1px solid #ddd;">Wi-Fi 6 2x2 Wi-Fi 6 (802.11 a/b/g/n/ac/ax)</td>
                </tr>
                
               
                
            </tbody>
        </table>
         <br></br>
            <a href="https://www.asus.com/motherboards-components/motherboards/prime/prime-b760m-a-wifi/" target="_blank">Xem thêm ></a>
        </div>


';
                                                                                   
$asus_prime_n100 = new Product(name:"ASUS PRIME N100I-D D4", type:"main", price: 2725, note:["port" => "2 x USB 3.2 Gen 2, 2 x USB 3.2 Gen 1, 2 x USB 2.0, 3 x Audio jacks, 1 x PS/2 Keyboard/Mouse combo port, 1 x LAN 1Gb/s Ethernet",
                                                                                     "display" => "1 x HDMI, 1 x DisplayPort, 1 x VGA, 1 x COM"], sub_note:"");

// ---- RAM ----
$lexar_8g_3200 = new Product(name:"LEXAR 8G 3200MHz DDR4", type:"ram", price:340, note:"", sub_note:""); // LD4AU008G-B3200GSST
$lexar_16g_3200 = new Product(name:"LEXAR 16G 3200MHz DDR4", type:"ram", price:657, note:"", sub_note:""); // LD4AU016G-B3200GSST
$kingston_32g_3200 =  new Product(name:"KINGSTON 32G 3200MHz DDR4", type:"ram", price:1405, note:"", sub_note:""); // KF432C16BB/32

$kingston_8gx2_3200 = new Product(name:"KINGSTON 16G(2x8G) 3200MHz DDR4 RGB", type:"ram", price:1315, note:"", sub_note:""); // KF432C16BB2AK2/16
$kingston_16gx2_3200 = new Product(name:"KINGSTON 32G(2x16G) 3200MHz DDR4 RGB", type:"ram", price:2063, note:"", sub_note:""); // KF432C16BB2AK2/32
$gskill_32gx2_3600 = new Product(name:"GSKILLS 64G(2x32G) 3600MHz DDR4 RGB", type:"ram", price:3876 , note:"", sub_note:""); // F4-3600C18D-64GTZN

$kingston_8gx2_5600_d5 = new Product(name:"KINGSTON 16G(2x8G) 5600MHz DDR5 RGB", type:"ram", price:1723, note:"", sub_note:""); // KF556C40BBAK2-16
$kingston_16gx2_5600_d5 = new Product(name:"KINGSTON 32G(2x16G) 5600MHz DDR5 RGB", type:"ram", price:2890, note:"", sub_note:""); // KF556C40BBAK2-32

$kingston_8g_5600_d5 = new Product(name:"KINGSTON 8G 5600MHz DDR5", type:"ram", price:867, note:"", sub_note:""); // KF556C40BB-8
$kingston_16g_5600_d5 = new Product(name:"KINGSTON 16G 5600MHz DDR5", type:"ram", price:1179, note:"", sub_note:""); // KF556C40BB-16

$lexar_8g_3200_laptop = new Product(name:"LEXAR 8G 3200MHz DDR4", type:"ram", price:340, note:"", sub_note:""); // LD4AS008G-B3200GSST
$lexar_16g_3200_laptop = new Product(name:"LEXAR 16G 3200MHz DDR4", type:"ram", price:680, note:"", sub_note:""); // LD4AS016G-B3200GSST

$gskill_16gx2_5600_d5 = new Product(name:"GSKILLS 32G(2x16G) 5600MHz DDR5", type:"ram", price:2489, note:"", sub_note:""); // F5-5600J4645A16GX2-RS5K
$gskill_16gx2_6400_d5 = new Product(name:"GSKILLS 32G(2x16G) 6400MHz DDR5", type:"ram", price:2976, note:"", sub_note:""); // F5-6400J3648F16GX2-RM5RK

// ---- SSD ----
$lexar_256g_sata = new Product(name:"LEXAR 256G SATA", type:"ssd", price:453, note:"", sub_note:""); // LNS100-256RB
$lexar_512g_sata = new Product(name:"LEXAR 512G SATA", type:"ssd", price:850, note:"", sub_note:""); // LNS100-512RB

$lexar_256g_m2 = new Product(name:"LEXAR 256G M.2 NVMe PCIe", type:"ssd", price:538, note:"", sub_note:""); // LNM620X256G-RNNNG
$lexar_512g_m2 = new Product(name:"LEXAR 512G M.2 NVMe PCIe", type:"ssd", price:941, note:"", sub_note:""); // LNM620X512G-RNNNG
$kingston_500g_m2 = new Product(name:"KINGSTON 500G M.2 NVMe PCIe", type:"ssd", price:1037, note:"", sub_note:""); // SNV3S/500G
$kingston_1t_m2 = new Product(name:"KINGSTON 1T M.2 NVMe PCIe", type:"ssd", price:1417, note:"", sub_note:""); // SNV2S/1000G
$kingston_2t_m2 = new Product(name:"KINGSTON 2T M.2 NVMe PCIe", type:"ssd", price:3695, note:"", sub_note:""); // SNV3S/2000G

$lexar_512g_m2_hinh = new Product(name:"LEXAR 512G M.2 NVMe PCIe", type:"ssd", price:950, note:"", sub_note:""); // LNM620X512G-RNNNG
$lexar_1t_m2 = new Product(name:"LEXAR 1T M.2 NVMe PCIe", type:"ssd", price: 1659, note:"", sub_note:""); // LNM620X001T-RNNNG
$lexar_2t_m2 = new Product(name:"LEXAR 2T M.2 NVMe PCIe", type:"ssd", price: 4120, note:"", sub_note:""); // LNM790X002T-RNNNG

// ---- PSU ----
$rosa_450w = new Product(name:"ROSA ATX650 (450W)", type:"psu", price:222, note:"", sub_note:""); 
$inwin_450w = new Product(name:"450W", type:"psu", price:0, note:"", sub_note:"");  // nguồn đi kèm theo case InWin
$mik_600w = new Product(name:"MIK SPOWER 600 (600W)", type:"psu", price:672, note:"", sub_note:"");
$asus_850w = new Product(name:"ASUS TUF GAMING-850G (850W)", type:"psu", price: 3777, note:"", sub_note:"");

// ---- CASE ----
$rosa_r101 = new Product(name:"ROSA R101 MATX", type:"case", price:133, note:["port" => "2 x USB 2.0, 1 x SD port, 1 x microphone jack, 1 x headphone jack"], sub_note:""); 
$inwin_efs063 = new Product(name:"InWin EFS063 MATX", type:"case", price:1536, note:["port" => "2 x USB 3.0, 2 x USB 2.0, 1 x microphone jack, 1 x headphone jack"], sub_note:""); 
$morax_3fa = new Product(name:"MORAX 3FA MATX", type:"case", price: 667, note:["port" => "1 x USB 3.0, 2 x USB 2.0, 1 x microphone jack, 1 x headphone jack"], sub_note:"");
$coolerplus_cpcc09 = new Product(name:"ROSA CPC-C09 MATX", type:"case", price:153, note:["port" => "2 x USB 2.0, 1 x HD Audio"], sub_note:"");
$coolermaster_cmp510 = new Product(name:"ROSA CMP-510", type:"case", price:1833, note:["port" => "1 x USB 3.2 , 1 x USB 2.0, 1 x HD Audio"], sub_note:"");

$morax_3fa_hinh = new Product(name:"MORAX 3FA MATX", type:"case", price:687, note:["port" => "1 x USB 3.0, 2 x USB 2.0, 1 x microphone jack, 1 x headphone jack"], sub_note:"");

// ---- COOLER ----
$hyper_air = new Product(name:"HYPER 212 SPECTRUM V3 ARGB", type:"cooler", price:422, note:"", sub_note:""); 
$asus_lc360 = new Product(name:"Prime LC 360 ARGB", type:"cooler", price: 2998, note:"", sub_note:""); 

// ---- Keyboard Mouse ----
$no_key_mouse = new Product(name:"Không kèm Phím & Chuột", type:"key_mouse", price:0, note:"", sub_note:"");
$rosa_key_mouse = new Product(name:"ROSA V100 Phím & Chuột", type:"key_mouse", price:167, note:"", sub_note:"");
$coolerplus_key_mouse = new Product(name:"Coolerplus Phím Cơ HERO G88 & Chuột Gaming G63", type:"key_mouse", price: 856, note:"", sub_note:"");

// ---- OS ----
$win11_pro = new Product(name:"Windows 11 Pro", type:"os", price: 1000, note:"", sub_note:""); // AN
$win11_pro -> popup='
<div class="modal-header">
        <h5 class="modal-title">Tính năng nổi bật của Windows 11 Pro</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
    <div class="modal-body">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f1f1f1;">
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Tính năng</th>
                    <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Mô tả</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Bảo mật nâng cao</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Tích hợp BitLocker, bảo vệ dữ liệu an toàn.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Quản lý thiết bị từ xa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Hỗ trợ Azure Active Directory và Group Policy.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Ảo hóa</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Cung cấp Hyper-V và Windows Sandbox cho môi trường thử nghiệm.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Tối ưu đa nhiệm</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Snap Layouts, Snap Groups giúp sắp xếp cửa sổ dễ dàng.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Tích hợp Microsoft Teams</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Kết nối nhanh chóng và tiện lợi cho công việc.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Windows Copilot</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Trợ lý AI tích hợp hỗ trợ tìm kiếm, quản lý và tăng hiệu suất làm việc.</td>
                </tr>
            </tbody>
        </table>
        <br><br>
    </div>
';

$free_dos = new Product(name:"Free DOS", type:"os", price: 0, note:"", sub_note:""); 

// ---- LCD ----
$no_monitor = new Product (name:"Không màn hình", type:"monitor", price:0, note:"", sub_note:"", img_path:"", display:False); // nếu được chọn là sẽ không hiển thị trên bill
$aoc_21 = new Product(name:"AOC 22” (22B30HM23/74)<br>Phẳng - FHD - VA - 120Hz - 1ms - 1xDsub - 1x HDMI ", type:"monitor", price:1476, note:"", sub_note:"", img_path:"../assets/images/aoc22.png");  // AN
$aoc_21 -> popup ='
<div class="modal-header">
            <h5 class="modal-title">Màn hình AOC 22</h5>
            <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        <div class="modal-body">
             <h4>22B30HM23/74 </h4>
             <h5>21.5" VA Panel Monitor</h5>
            <img src="../assets/images/aoc22.png" alt="AOC 22" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">

            <p class="mb-4" style="color: #000">
                Sắc nét, siêu mỏng, mượt mà ! VA góc nhìn rộng, công nghệ khử nhấp nháy, chế độ ánh sáng xanh, FULL HD, không viền 3 cạnh. 22B30HM23 là màn hình có tính năng đồng bộ hóa thích ứng, Công nghệ chống xé hình, tần số quét 120Hz và thời gian phản hồi MPRT            </p>
            <br><br>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
           
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Độ phân giải tối ưu</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1920 × 1080 (FHD)</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Tốc độ phản hồi</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1ms</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Tấm nền</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">21.5” / VA.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Low Blue Mode</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">Sẽ giúp bảo vệ mắt người dùng khi giảm ánh sáng xanh có bước sóng ngắn. Ánh sáng xanh có bước sóng ngắn là tác nhân chính dẫn đến mỏi mắt, đau mắt khi sử dụng màn hình.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>AdaptiveSync</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">Công nghệ Adaptive Sync loại bỏ vấn đề bằng cách đảm bảo tốc độ làm mới màn hình của bạn luôn được đồng bộ hóa với bộ xử lý.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>3-Sided Frameless</b></td>
                     <td style="padding: 10px; border: 1px solid #ddd;">Với thiết kế màn hình 3 cạnh tràn viền, người dùng sẽ sở hữu một không gian rộng lớn để thỏa sức giải trí, sáng tạo và làm việc.</td>
                </tr>
            </tbody>
        </table>
        <br></br>
            <a href="https://vn.aoc.com/product/22B30HM23-74" target="_blank">Xem thêm ></a>
        </div>
        
    ';

$aoc_24 = new Product(name:"AOC 24” (24B20JH2/74)<br>Phẳng - FHD - IPS - 100Hz - 1xDsub - 1x HDMI", type:"monitor", price:1961, note:"", sub_note:"", img_path:"../assets/images/aoc24.png");    // AN
$aoc_24 -> popup ='
<div class="modal-header">
            <h5 class="modal-title">Màn hình AOC 24</h5>
            <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        <div class="modal-body">
             <h4>24B20JH2/74</h4>
             <h5>23.8" IPS Panel Monitor</h5>
            <img src="../assets/images/aoc24.png" alt="AOC 24" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">

            <p class="mb-4" style="color: #000">
                Hiệu quả mượt mà, AOC 24B20JH2 là màn hình Full HD với góc nhìn rộng IPS, tần số quét 100Hz. Là sự lựa chọn tối ưu để khung hình không bị giật lắc,            <br><br>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
           
            <tbody>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Độ phân giải tối ưu</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1920 × 1080 (FHD)</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Tốc độ phản hồi</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">1ms</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Tấm nền</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">IPS</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>Tối ưu đa nhiệm</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">100Hz</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>3-Sided Frameless</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Với thiết kế màn hình 3 cạnh tràn viền, người dùng sẽ sở hữu một không gian rộng lớn để thỏa sức giải trí, sáng tạo và làm việc.</td>

                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><b>AdaptiveSync</b></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Công nghệ Adaptive Sync loại bỏ vấn đề bằng cách đảm bảo tốc độ làm mới màn hình của bạn luôn được đồng bộ hóa với bộ xử lý.</td>

                </tr>
            </tbody>
        </table>
        <br></br>
            <a href="https://vn.aoc.com/product/24B20JH2-74" target="_blank">Xem thêm ></a>
        </div>
        
    ';


// ---- Voucher ----
// $voucher_400k = new Product (name:"Voucher GOT IT trị giá 300K!", type:"voucher", price:0, note:"", sub_note:"", img_path:"../assets/images/gotit.jpg");
// $voucher = new Product (name:"Voucher GOT IT trị giá 300K!", type:"voucher", price:0, note:"", sub_note:"", img_path:"../assets/images/gotit.jpg");

// ---- Chi Phí Khác ----
$others = new Product(name:"Chi Phí Khác", type:"others", price:56, note:"", sub_note:""); // Phí lắp ráp


// ---- Chu Hinh ----


?>