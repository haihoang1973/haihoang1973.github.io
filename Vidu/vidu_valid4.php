<?php
// khai báo biến và gán giá trị rỗng
$ten_loi = $email_loi = $gioi_tinh_loi = $website_loi = "";
$ten = $email = $gioi_tinh = $binh_luan = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $ten_loi = "Tên không được để trống";
  } else {
    $ten = kiemTra_input($_POST["ten"]);
    // Kiểm tra liệu tên chỉ bao gồm các chữ cái và khoảng trắng hay không.
    if (!preg_match("/^[a-zA-Z ]*$/",$ten)) {
      $ten_loi = "Tên chỉ chứa các chữ cái và khoảng trắng."; 
    }
  }

  if (empty($_POST["email"])) {
    $email_loi = "Email không được để trống";
  } else {
    $email = kiemTra_input($_POST["email"]);
    //Kiểm tra xem địa chỉ email có hợp lệ không.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_loi = "Email không hợp lệ"; 
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = kiemTra_input($_POST["website"]);
    // Kiểm tra xem URL có hợp lệ hay không.
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "URL không hợp lệ"; 
    }
  }

  if (empty($_POST["binh_luan"])) {
    $binh_luan = "";
  } else {
    $binh_luan = kiemTra_input($_POST["binh_luan"]);
  }

  if (empty($_POST["gioi_tinh"])) {
    $gioi_tinh_loi = "Giới tính không được để trống";
  } else {
    $gioi_tinh = kiemTra_input($_POST["gioi_tinh"]);
  }
}
?>
/////////////////////////////////////////////////////
PHP input type="checkbox"
Cách xử lý tương tự như input type="text"
PHP viết:
<form action="" method="post">
    Đăng ký học:<br>
    HTML <input type="checkbox" name="check_html" value="HTML">, CSS <input type="checkbox" name="check_css" value="CSS"><br>
    <button type="submit">Gửi</button>
</form>
<?php if(isset($_POST["check_html"])) { echo $_POST["check_html"]; } ?>
<?php if(isset($_POST["check_css"])) { echo $_POST["check_css"]; } ?>
Đăng ký học:
HTML , CSS 
Gửi
///////////////////////////////////////////////
<?php
$email = "khacntt@gmail.com";
 
// Xóa tất cả ký tự lạ từ địa chỉ email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
 
// kiểm tra xác thực giá trị email
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo("$email là giá trị hợp lệ");
} else {
    echo("$email là giá trị không hợp lệ");
}
?>
///////////////////////////////////////////////////