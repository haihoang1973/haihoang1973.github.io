
<form action="" method="post">
    Email: <input type="email" name="email" value="">
    <button type="submit">Gửi</button>
</form>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        echo "<span style='color:red;'>Error: Email bắt buộc phải nhập.</span>";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<span style='color:red;'>Error: Email nhập chưa đúng.</span>";
        } else {
            echo $email;
        }
    }
}
?>
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
<?php 
// Khai báo giá trị ban đầu, nếu không form sẽ báo lỗi.
$fullname = $email = $path = "";
$error_fullname = $error_email = $error_path = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fullname"])) {
        $error_fullname = "<span style='color:red;'>Error: Họ tên bắt buộc phải nhập.</span>";
    } else {
        $fullname = $_POST["fullname"];
        if(!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
        $error_fullname = "<span style='color:red;'>Error: Họ tên chỉ chấp nhận chữ và khoảng trắng.</span>";
        } else {
            echo $fullname;
        }
    }

    if (empty($_POST["email"])) {
        $error_email = "<span style='color:red;'>Error: Email bắt buộc phải nhập.</span>";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_email = "<span style='color:red;'>Error: Email nhập chưa đúng.</span>";
        } else {
            echo $email;
        }
    }

    if (empty($_POST["path"])) {
        $error_path = "<span style='color:red;'>Error: URL bắt buộc phải nhập.</span>";
    } else {
        $path = $_POST["path"];
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$path)) {
            $error_path = "<span style='color:red;'>Error: URL nhập chưa đúng.</span>";
        } else {
            echo $path;
        }
    }
}
?>

<form action="" method="post">
    <p>Họ tên: <input type="text" name="fullname" value=""> <?php echo $error_fullname; ?></p>
    <p>Email: <input type="email" name="email" value=""> <?php echo $error_email; ?></p>
    <p>URL: <input type="text" name="path" value=""> <?php echo $error_path; ?></p>
    <button type="submit">Gửi</button>
</form>
//////////////////////////////////////////////////////////////////////////////////////////////////////
<?php
$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}
?>
/////////////////////////////////////////////////////////////
<?php

if ($new_pass != $re_new_pass)
{
    echo $show_alert.'Nhập lại mật khẩu mới không khớp';
}
?>
////////////////////////////////////////////////////////////
<form action="" method="post">
    Đăng ký học:<br>
    HTML <input type="checkbox" name="check_html" value="HTML">, CSS <input type="checkbox" name="check_css" value="CSS"><br>
    <button type="submit">Gửi</button>
</form>
<?php if(isset($_POST["check_html"])) { echo $_POST["check_html"]; } ?>
<?php if(isset($_POST["check_css"])) { echo $_POST["check_css"]; } ?>
////////////////////////////////////////////////////////////////////////
 Kiểm tra định dạng mât khẩu bằng preg_match trong php

 

<?php
$partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
$subject = "Cuongsb$";
if(!preg_match($partten ,$subject, $matchs))
   echo  "Mật khẩu bạn vừa nhập không đúng định dạng ";
?>
/////////////////////////////////////////////////////////////

Xây dựng biểu thức chính quy của Email


Email chúng ta có đặc điểm sau:
- Chứa các ký tự từ A đến Z, a đến z
- Các ký tự số
- Ký tự gạch dưới
- Ký tự @
- Các ký tự trước @ có 6-32 ký tự
- Chuổi ký ký tự sau @ chia thành hai phần của domain mỗi phần có 2-12 ký tự


Ta có chuổi biểu thức chính quy theo yêu cầu trên
 

^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$

Bước 2
Kiểm tra bằng hàm preg_match()

 

<?php
$partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
$subject = "phancuong.qt@gmail.com";
if(!preg_match($partten ,$subject, $matchs))
   echo  "Mail bạn vừa nhập không đúng định dạng ";

?>
/////////////////////////////////////////////////////////////////////////////