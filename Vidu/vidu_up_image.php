
<html>
<head>
</head>
<body>
<form action="xl_upload.php" method=POST enctype="multipart/form-data" >
chon file: <input type="file" name="file"/><br>
<input type="submit" value="Tai len" name="ok"/>
</form>
</body>
</html>

file xl_upload.php

<?php
if(isset($_POST["ok"])) //kiem tra xem nguoi xu dung da bam vao nut "tai len" hay chua
{
if($_FILES["file"]["name"]!=NULL)
{

if($_FILES["file"]["type"]=="image/jpeg"
||$_FILES["file"]["type"]=="image/png"
||$_FILES["file"]["type"]=="image/gif"
)
{
if($_FILES["file"]["size"]>1048576)
{
echo "file quá nang";
}

// kiem tra su ton tai cua file
elseif (file_exists("" . $_FILES["file"]["name"])) 
{
echo $_FILES["file"]["name"]." file da ton tai. ";
}

else{

$path = ""; // file luu vào thu muc chua file upload
$tmp_name = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$type = $_FILES['file']['type']; 
$size = $_FILES['file']['size']; 
// Upload file
move_uploaded_file($tmp_name,$path.$name);
echo "File uploaded! <br />";
echo "Tên file : ".$name."<br />";
echo "Kieu file : ".$type."<br />";
echo "File size : ".$size;
}
}
else {
echo "file duoc chon khong hop le";
}
}
else 
{
echo "vui long chon file";
}
}

?>
/////////////////////////////////////////////
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Hướng dẫn upload ảnh - Lập Trình Việt Nhật</title>
</head>
<body>
	<form action="xuly.php" enctype="multipart/form-data" method="POST">
		Chọn file ảnh: <input type="file" name="uploadFile"><br> <input
			type="submit" name="submit" value="Upload">
	</form>
</body>
</html>
/////////////////////////////////////////////////////////////////
<?php
include_once ('connect.php');
if (isset($_POST['submit'])) {
    if ($_FILES['uploadFile']['name'] != NULL) {
        // Kiểm tra file up lên có phải là ảnh không
        if ($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif") {
            
            // Nếu là ảnh tiến hành code upload
            $path = "images/"; // Ảnh sẽ lưu vào thư mục images
            $tmp_name = $_FILES['uploadFile']['tmp_name'];
            $name = $_FILES['uploadFile']['name'];
            // Upload ảnh vào thư mục images
            move_uploaded_file($tmp_name, $path . $name);
            $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                      // Insert ảnh vào cơ sở dữ liệu
            $sql = "INSERT INTO `image` (`image_url`, `created`) VALUES ('$image_url','" . date('Y-m-d H:i:s') . "')";
            $smt = mysqli_prepare($connect, $sql);
            if (mysqli_stmt_execute($smt)) {
                echo 'Thêm thành công ảnh';
            } else {
                echo 'Không thể thêm được ảnh';
            }
        } else {
            // Không phải file ảnh
            echo "Kiểu file không phải là ảnh";
        }
    } else {
        echo "Bạn chưa chọn ảnh upload";
    }
}
?>
//////////////////////////////////////////////////////////
<?php
$host = 'localhost'; // 127.0.0.1
$user = 'root'; // User đăng nhập MySQL
$password = '12345678'; // Password đăng nhập MySQL
$database = 'gallery'; // Tên cơ sở dữ liệu
$connect = mysqli_connect($host, $user, $password, $database) or die('Not connect');
date_default_timezone_set("Asia/Bangkok"); // Thiết lập múi giờ chuẩn
?>
///////////////////////////////////////////////////////////////