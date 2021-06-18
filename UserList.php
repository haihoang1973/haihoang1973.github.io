<html>
    <head>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/user-list.css">
        <?php 
            session_start();
            $user_login = $_SESSION["username"];

            $connection = mysqli_connect( "localhost" ,"root", "" , "brse_training");
            $sql = "SELECT * FROM user ORDER BY username ASC";

            $result = mysqli_query($connection, $sql);

            if(mysqli_num_rows($result) <= 0)  {
                $listUserNull = "Không tồn tại user trong danh sách";
            }

            // Phan phan trang

            $sql_sum_user = "SELECT COUNT(id) AS total FROM user";
            $result1 = mysqli_query($connection, $sql_sum_user);
            $row = mysqli_fetch_assoc($result1);

            $total_records = $row["total"];
            if(isset($_GET['page'])) {
                $current_page = $_GET['page'];
            } else {
                $current_page = 1;
            }

            if(isset($_GET['limit'])) {
                $limit = $_GET['limit'];
            } else {
                $limit = 5;
            }

            $total_page = ceil($total_records / $limit);


            // Tim vi tri start
            $start = ($current_page - 1) * $limit;

            $sql_page = "SELECT * FROM user LIMIT $start, $limit";

            $result = mysqli_query($connection, $sql_page);

            
            // PHAN SEARCH
            if(isset($_POST["search"])) {
                $username = $_POST["username"];
                $realName = $_POST["realName"];
                $email = $_POST["email"];

                if(isset($_POST['gender'])) {
                    $gender = $_POST["gender"];
                }
                else {
                    $gender = "";
                }

                // Set input language
                if(isset($_POST["lang"]))
                {
                    $language = "";
                    foreach($_POST["lang"] as $value) {
                        $language =  $language.",".$value;
                    }
                    $language = trim($language, ","); //xóa dấu  ',' ở đầu và cuối chuỗi  
                } else {
                    $language = "";
                }

                if(isset($_POST["country"])) {
                    $country = $_POST["country"];
                }

                $sql = "SELECT * FROM user where username LIKE '%$username%'
                                            AND fullname LIKE '%$realName%'
                                            AND email LIKE '%$email%'
                                            AND gender LIKE '%$gender%'
                                            AND language LIKE '%$language%'
                                            AND country LIKE '%$country%'";

                $result = mysqli_query($connection, $sql);

            }

        ?>
        
    </head>
    <body>
        <div class="header">
            <div class="login-info">
                <div class="dropdown">
                    <button class="dropbtn"><?php if(isset($user_login)) echo $user_login?></button>
                    <div class="dropdown-content">
                        <a href="ProfileDetail.php">Trang cá nhân</a>
                        <a href="Logout.php">Đăng Xuất</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="nav">
            <div id="left">
                <h4>Quản lý người dùng</h4>
                <a href="UserList.php">Danh sách</a>
                <a href="UserADD.php">Thêm mới</a>
            </div>

            <div id="right">
                <form action="UserList.php" method="POST">
                    <div id="search">
                        <div class="titlesearch">
                            <h4>Tìm kiếm người dùng</h4>
                        </div>

                        <table>
                            <tr>
                                <td>Tài khoản</td>
                                <td><input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>"></td>
                                <td>Giới tính</td>
                                <td>
                                    <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender == 'male')  echo 'checked'?>>Nam
                                    <input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender == 'female')  echo 'checked'?>>Nữ
                                </td>
                            </tr>
                            <tr>
                                <td>Tên thật</td>
                                <td><input type="text" name="realName" value="<?php if(isset($realName)) echo $realName; ?>"></td>
                                <td>Ngôn ngữ lập trình</td>
                                <td>
                                    <input type="checkbox" name="lang[]" value="Php" <?php if(isset($language) && strstr($language, "Php")) echo "checked"?> > PHP
                                    <input type="checkbox" name="lang[]" value="java" <?php if(isset($language) && (strstr($language, "java,") || strstr($language, "java") )) echo "checked"?>> Java
                                    <input type="checkbox" name="lang[]" value="Javascript" <?php if(isset($language) && strstr($language, "Javascript")) echo "checked"?>> Javascript
                                    <input type="checkbox" name="lang[]" value="C" <?php if(isset($language) && strstr($language, "C")) echo "checked"?>> C
                                    <input type="checkbox" name="lang[]" value="Python" <?php if(isset($language) && strstr($language, "Python")) echo "checked"?>> Python
                                </td>
                            </tr>

                            <tr>
                                <td>Emai</td>
                                <td><input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>"></td>
                                <td>Quốc tịch</td>
                                
                                <td>
                                    <select name="country">
                                        <option value="">--Lựa chọn quốc tịch--</option>
                                        <option value="Vietnamese" <?php if(isset($country) && $country == "Vietnamese")  echo "selected"?>>Vietnamese</option>
                                        <option value="Japanese" <?php if(isset($country) && $country == "Japanese")  echo "selected"?>>Japanese</option>
                                        <option value="Chinese" <?php if(isset($country) && $country == "Chinese")  echo "selected"?>>Chinese</option>
                                        <option value="American" <?php if(isset($country) && $country == "American")  echo "selected"?>>American</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="btn-search"> 
                            <input style= "margin-left: 100px; " type="submit" value="Reset">
                            <input style="background-color: seagreen; border: 1px solid seagreen;" type="submit" value="Tìm kiếm" name="search"> 
                        </div>
                        
                    </div>
                </form>


                <div id="list">
                    <div class="titlesearch">
                        <h4>Danh sách người dùng</h4>
                    </div>
                    <table class="table-user">
                        <tr>
                            <th>Tên tài khoản</th>
                            <th>Tên thật</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Ngôn ngữ lập trình</th>
                            <th>Quốc tịch</th>
                            <th>Action</th>
                        </tr>

                        <?php 
                            while($user = mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td><a href='ProfileDetail.php?username=".$user["username"]."'>".$user["username"]."</a></td>";
                                echo "<td>".$user["fullname"]."</td>";
                                echo "<td>".$user["email"]."</td>";
                                echo "<td>".$user["gender"]."</td>";
                                echo "<td>".$user["language"]."</td>";
                                echo "<td>".$user["country"]."</td>";
                                echo "<td class='delete' onclick=\"myDelete('".$user["username"]."')\">Delete</td>";
                                echo "</tr>";
                            }
                        ?>   
                        
                    </table>

                    <div id="pagecenter">
                        <div id="pagination">
                            <a href="UserList.php?page=1">Đầu</a>
                            <a href="UserList.php?page=<?php 
                                if($current_page == 1) {
                                    echo 1;
                                } else {
                                    echo $current_page - 1;
                                }
                            ?>">Trước</a>
                            <?php
                                for($i = 1; $i <= $total_page; $i++) {
                                    if($current_page == $i) {
                                        echo '<a style="color: red"  href="UserList.php?page='.$i.'">'.$i.' | </a>';
                                    } else {
                                        echo '<a  href="UserList.php?page='.$i.'">'.$i.' | </a>';
                                    }
                                    
                                }
                            ?>
                            <a href="UserList.php?page=<?php 
                                if($current_page == $total_page) {
                                    echo $total_page;
                                } else {
                                    echo $current_page + 1;
                                }
                            ?>">Sau</a>
                            <a href="UserList.php?page=<?php echo $total_page ?>">Cuối</a>
                        </div>
                    </div>
                
                </div>
            </div>

            <div class="spacer" style="clear: both;"></div>
        </div>


        <script>
            function myDelete(username) {
                var result = confirm("Bạn có muốn xóa user: " + username);
                if(result) {
                    var url = "http://localhost/website/Delete.php?username=" + username
                    window.location = url;
                }
            }
        </script>
    </body>
</html>