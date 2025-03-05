const pcComponents = ['cpu','main','minipc','vga','ram','ssd','case','psu','cooler','os','key_mouse','others'];

// Hàm format giá
function formatPrice(price) {
    // Multiply the input integer by 1000
    const multipliedValue = price * 1000;
    const formattedString = multipliedValue.toLocaleString();
    return formattedString + 'đ';
}

// Hàm tính giá
function calculatePrice(cartIn, type_list=[]){
    let price = 0;

    if (type_list.length === 0){
        // list trống => tính giá tổng của nguyển giỏ hàng
        cartIn.forEach((value, key) => {
            price += value.price;
        });
    }
    else{
        // list không trống => tính giá tổng của các loại trong list
        type_list.forEach(type => {
        if (cartIn.has(type)){
            price += cartIn.get(type).price;
        }
        });
    }
    
    return price;
}

// Tóm tắt hoá đơn
function bill(pcName,cartIn,n){
    let pcPrice = calculatePrice(cartIn,pcComponents);
    let monitorPrice = calculatePrice(cartIn,['monitor']);
    let totalPrice = pcPrice + monitorPrice;

    let text = "<table style=\"width: 100%;border-collapse: separate;border-spacing: 0 20px;\">";
    // PC row
    text += "<tr>";
    text += "<td style=\"text-align: left;width: 50%;\">";
    text += "<big><b>" + pcName + "</b></big><br>";
    if (cartIn.has("cpu")){ 
        text += "CPU: " + cartIn.get("cpu").name + "<br>";
    }
    if (cartIn.has("main")){ 
        text += "MAIN: " + cartIn.get("main").name + "<br>";
    }
    if (cartIn.has("minipc")){ 
        text += "MINIPC: " + cartIn.get("minipc").name + "<br>";
    }
    if (cartIn.has("vga")){ 
        text += "VGA: " + cartIn.get("vga").name + "<br>";
    }
    if (cartIn.has("ram")){ 
        text += "RAM: " + cartIn.get("ram").name + "<br>";
    }
    if (cartIn.has("ssd")){ 
        text += "SSD: " + cartIn.get("ssd").name + "<br>";
    }
    if (cartIn.has("case")){ 
        text += "CASE: " + cartIn.get("case").name + "<br>";
    }
    if (cartIn.has("psu")){ 
        text += "PSU: " + cartIn.get("psu").name + "<br>";
    }
    if (cartIn.has("cooler")){ 
        text += "Tản Nhiệt: " + cartIn.get("cooler").name + "<br>";
    }
    if (cartIn.has("os")){ 
        text += "Hệ Điều Hành: " + cartIn.get("os").name + "<br>";
    }
    if (cartIn.has("key_mouse")){ 
        text += "Phụ Kiện: " + cartIn.get("key_mouse").name + "<br>";
    }
    if (cartIn.has("extra")){ 
        text += cartIn.get("extra").name + "<br>";
    }
    text += "</td>";

    text += "<td style=\"text-align: right;width: 50%;\">";
    text += "<font color=\"red\">";
    // text += "<b>" + formatPrice(pcPrice) + " x " + n + "</b>";
    text += "<b><big>" + "x " + n + "</big></b>";
    text += "</font>";
    text += "</td>";

    text += "</tr>";

    
    // monitor
    if (cartIn.has("monitor") && cartIn.get('monitor').display){ 
        text += "<tr>";


        text += "<td style=\"text-align: left;width: 50%;\">";
        text += "<big><b>" + cartIn.get('monitor').name + "</b></big>";
        text += "</td>";


        text += "<td style=\"text-align: right;width: 50%;\">";
        text += "<font color=\"red\">";
        // text += "<b>" + formatPrice(monitorPrice) + " x " + n + "</b>";
        text += "<b><big>" + "x " + n + "</big></b>";
        text += "</font>";
        text += "</td>";

        text += "</tr>";
    }
    
    // voucher
    if (cartIn.has("voucher") && cartIn.get('voucher').display){ 
        text += "<tr>";


        text += "<td style=\"text-align: left;width: 50%;\">";
        text += "<big><b>" + cartIn.get('voucher').name + "</b></big>";
        text += "</td>";


        text += "<td style=\"text-align: right;width: 50%;\">";
        text += "<font color=\"red\">";
        // text += "<b>" + formatPrice(monitorPrice) + " x " + n + "</b>";
        text += "<b><big>" + "x " + n + "</big></b>";
        text += "</font>";
        text += "</td>";

        text += "</tr>";
    }

    text += "</table>";

    // Tính tổng tiền
    text += "<div style=\"text-align: right;\">";
    // text += "<span style=\"color: red;\"><big><b>Tổng Cộng: " + formatPrice(totalPrice*n) + "</b></big></span>";
    text += "<span style=\"color: red;\"><big><b>Tổng Cộng: " + formatPrice(totalPrice) + " x " + n + "<br>= " + formatPrice(totalPrice*n) + "</b></big></span>";
    text += "</div>";

    return text;
}