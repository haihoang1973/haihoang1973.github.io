
<html>
    <head>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/user-detail.css">
        <?php
            session_start();
            $user_login = $_SESSION['username'];

            // START: Kiểm tra điều kiện tồn tại username trước khi gọi vào database-------
            $url = $_SERVER["REQUEST_URI"];
            $username_arr = explode("?username=", $url); // ["phantu1", "phantu2"]
            if(isset($username_arr[1])) {
                $username = $username_arr[1];
                if(isset($username)) {
                    $user_login = $username;
                }
            }
            
            // END: Kiểm tra điều kiện tồn tại username trước khi gọi vào database--------

            $connection = mysqli_connect("localhost", "root", "", "brse_training");
            $sql = "SELECT * FROM user WHERE username = '$user_login'";
            $result = mysqli_query($connection, $sql);

            if(mysqli_num_rows($result) > 0) {
                while($user = mysqli_fetch_array($result)) {
                    $username = $user["username"];
                    $password = $user["password"];
                    $realName = $user["fullname"];
                    $email = $user["email"];
                    $gender = $user["gender"];
                    $language = $user["language"];
                    $country = $user["country"];
                    $avatar = $user["avatar"];
                    $avatar = "images/".$avatar;
                }
            }
            else {
                $acc_error = "Tài khoản không tồn tại";
            }

        ?>
    </head>
<body>
    <div class="header">
        <div class="login-info">
            <div class="dropdown">
                <button class="dropbtn"><?php if(isset($user_login)) echo $user_login ?></button>
                <div class="dropdown-content">
                    <a href="ProfileDetail.php">Trang cá nhân</a>
                    <a href="Logout.php">Đăng Xuất</a>
                </div>
            </div>
        </div>
    </div>

    <div id="nav">
        <div id="left">
            <p><b style="margin-top: 10px;">Ảnh đại diện</b></p>
            <img src="<?php if(isset($avatar)) echo $avatar ?>">
        </div>

        <div id="right">
            <div id="title">
                <h3>Thông tin cá nhân</h3>
            </div>

            <div> 
                <p>Tên tài khoản:</p>
                <div class="error"><?php if(isset($username_err)) echo $username_err; ?></div>
                <input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>">
            </div>

            <div>
                <p>Tên thật:</p>
                <div class="error"><?php if(isset($realName_err)) echo $realName_err ?></div>
                <input type="text" name="realName"  value="<?php if(isset($realName)) echo $realName ?>">
            </div>

            <div>
                <p>Email:</p>
                <div class="error"><?php if(isset($email_err)) echo $email_err ?></div>
                <input type="email" name="email" value="<?php if(isset($email)) echo $email ?>">
            </div>

            <div>
                <p>Giới tính</p>
                <div class="error"><?php if(isset($gender_err)) echo $gender_err ?></div>
                <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender == "male") echo "checked" ?>> Nam
                <input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender == "female") echo "checked"?>> Nữ
            </div>

            <div>
                <p>Ngôn ngữ lập trình</p>
                <div class="error"><?php if(isset($lang_err)) echo $lang_err ?></div>
                <input type="checkbox" name="lang[]" value="Php" <?php if(isset($language) && strstr($language, "Php")) echo "checked"?> > PHP
                <input type="checkbox" name="lang[]" value="java" <?php if(isset($language) && (strstr($language, "java,") || strstr($language, "java") )) echo "checked"?>> Java
                <input type="checkbox" name="lang[]" value="Javascript" <?php if(isset($language) && strstr($language, "Javascript")) echo "checked"?>> Javascript
                <input type="checkbox" name="lang[]" value="C" <?php if(isset($language) && strstr($language, "C")) echo "checked"?>> C
                <input type="checkbox" name="lang[]" value="Python" <?php if(isset($language) && strstr($language, "Python")) echo "checked"?>> Python
            </div>

            <div>
                <p>Quốc tịch</p>
                <div class="error"><?php if(isset($country_err)) echo $country_err ?></div>
                <select name="country">
                    <option value="">--Lựa chọn quốc tịch--</option>
                    <option value="Vietnamese" <?php if(isset($country) && $country == "Vietnamese")  echo "selected"?>>Vietnamese</option>
                    <option value="Japanese" <?php if(isset($country) && $country == "Japanese")  echo "selected"?>>Japanese</option>
                    <option value="Chinese" <?php if(isset($country) && $country == "Chinese")  echo "selected"?>>Chinese</option>
                    <option value="American" <?php if(isset($country) && $country == "American")  echo "selected"?>>American</option>
                </select>
            </div>

            <br/> 

            <input style="background-color: cadetblue; margin-left: 10px; border: 1px solid cadetblue;" 
            type="submit" value="Chỉnh sửa">
        </div>
        <div class="spacer" style="clear: both;"></div>
    </div>

</body>    
</html>