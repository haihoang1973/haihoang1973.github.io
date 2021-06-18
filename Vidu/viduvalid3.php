<html>
   
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   
   <body>
      <?php
         // định nghĩa các biến và gán giá trị rỗng cho biến
         $nameErr = $emailErr = $genderErr = $websiteErr = "";
         $name = $email = $gender = $comment = $website = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Bạn phải nhập họ tên";
            }
            else
            {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Bạn phải nhập địa chỉ Email";
            }
            else
            {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Định dạng Email không hợp lệ"; 
               }
            }
            
            if (empty($_POST["website"])) {
               $website = "";
            }
            else
            {
               $website = test_input($_POST["website"]);
            }
            
            if (empty($_POST["comment"])) {
               $comment = "";
            }
            else
            {
               $comment = test_input($_POST["comment"]);
            }
            
            if (empty($_POST["gender"])) {
               $genderErr = "Bạn phải nhập giới tính";
            }
            else
            {
               $gender = test_input($_POST["gender"]);
            }
         }
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
     
      <h2>Mẫu đăng ký lớp luyện thi TOEIC</h2>
     
      <p><span class="error">* các trường bắt buộc.</span></p>
     
      <form method="post" action=">?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
         <table>
            <tr>
               <td>Họ tên:</td>
               <td><input type="text" name="name">
                  <span class="error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>E-mail: </td>
               <td><input type="text" name="email">
                  <span class="error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>Thời gian học:</td>
               <td> <input type="text" name="website">
                  <span class="error"><?php echo $websiteErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Tên lớp:</td>
               <td> <textarea name="comment" rows="5" cols="40"></textarea></td>
            </tr>
            
            <tr>
               <td>Giới tính:</td>
               <td>
                  <input type="radio" name="gender" value="female">Nữ
                  <input type="radio" name="gender" value="male">Nam
                  <span class="error">* <?php echo $genderErr;?></span>
               </td>
            </tr>
				
            <td>
               <input type="submit" name="submit" value="Submit"> 
            </td>
				
         </table>
			
      </form>
      
      <?php
         echo "<h2>Thông tin bạn đã cung cấp:</h2>";
         echo $name;
         echo "<br>";
         
         echo $email;
         echo "<br>";
         
         echo $website;
         echo "<br>";
         
         echo $comment;
         echo "<br>";
         
         echo $gender;
      ?>
   
   </body>
</html>