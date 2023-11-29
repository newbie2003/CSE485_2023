<?php include 'adheader.php';?>
<main>
    <form method="POST" action="process.php">
        <label for="ten_tloai">Tên thể loại</label>
        <input type="text" id="" name="ten_tloai" required>
        <input type="submit" value="Thêm">
    </form>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "btth01_cse485";

        try {
            // Tạo kết nối đến cơ sở dữ liệu
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                throw new Exception("Kết nối thất bại: " . $conn->connect_error);
            }

            // Lấy dữ liệu từ form
            $name = $_POST['ten_tloai'];

            // Câu lệnh SQL để thêm dữ liệu
            $sql = "INSERT INTO theloai (ten_tloai) VALUES ('$name')";

            if ($conn->query($sql) === TRUE) {
                echo "Thêm dữ liệu thành công";
            } else {
                throw new Exception("Lỗi: " . $conn->error);
            }

            // Đóng kết nối
            $conn->close();
        } catch (Exception $e) {
            echo "Đã xảy ra lỗi: " . $e->getMessage();
        }
    ?>
</main>
<?php include 'adfooter.php';?>
