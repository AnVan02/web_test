<?php
        if (isset($_POST['search'])) {
            $serial_sp = $_POST['search'];
            $conn = dbconnect();

            // Lấy SOSERI_PC từ SOSERI_SP
            $stmt = $conn->prepare("SELECT SOSERI_PC FROM baohanh WHERE SOSERI_SP = ?");
            $stmt->bind_param("s", $serial_sp);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $soseri_pc = $row['SOSERI_PC'];
                $stmt->close();

                // Truy vấn dữ liệu theo SOSERI_PC
                $stmt = $conn->prepare("
                    SELECT SOSERI_SP, SOSERI_PC, LOAI, TENSP, MASP, NGAYXUAT, THOIHANBH
                    FROM baohanh
                    WHERE SOSERI_PC = ?
                    ORDER BY NGAYXUAT ASC
                ");
                
                $stmt->bind_param("s", $soseri_pc);
                $stmt->execute();
                $result = $stmt->get_result();

                echo '<h3 style="text-align: center;">Thông Tin Bảo Hành</h3>';
                echo '<table>';
                echo '<tr>
                        <th>Số Serial SP</th>
                        <th>Số Serial PC</th>
                        <th>Loại</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Ngày Xuất</th>
                        <th>Thời Hạn Bảo Hành</th>
                    </tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td style="font-weight: bold; color:red">' . htmlspecialchars($row["SOSERI_SP"]) . '</td>';
                    echo '<td style="font-weight:bold">' . htmlspecialchars($row["SOSERI_PC"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["LOAI"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["TENSP"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["MASP"]) . '</td>';
                    echo '<td>' . date("d-m-Y", strtotime($row["NGAYXUAT"])) . '</td>';
                    echo '<td>' . htmlspecialchars($row["THOIHANBH"]) . ' tháng</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p class="no-result">Không có thông tin bảo hành cho mã <span>' . htmlspecialchars($serial_sp) . '</span>.</p>';
            }

            $stmt->close();
        }
        ?>
    </div>