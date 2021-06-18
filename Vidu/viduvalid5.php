
<?php 
$regex_user = '/^[a-z0-9_A-z]{3,6}$/' ;
$regex_passw = '/^[a-z0-9_A-z]{6,10}$/';
if (isset($_POST['add_member'])) {
	$count_error = 0 ; 
	$username = $_POST['username'];
	$passw = $_POST['passw'] ; 
	$confirm_passw = $_POST['confirm-passw'];

	$_SESSION['add_user']['user_name'] = $username ; 
	$_SESSION['add_user']['passw'] = $passw ;
	$_SESSION['add_user']['confirm_passw'] = $confirm_passw ; 
	$_SESSION['add_user']['name']  = $_POST['name'] ;
	$_SESSION['add_user']['email'] = $_POST['email'];

	if (!preg_match($regex_user,$username)){
		$error_r_user = 'Tài khoản không hợp lệ';//////
		$count_error ++ ;
	}else{
		$sql_check_user = "SELECT user From tbl_user WHERE user LIKE '$username'";
		$query_check_user = mysqli_query($conn , $sql_check_user) ; 
		$num_check_user = mysqli_num_rows($query_check_user) ;
		if( $num_check_user  > 0 ){
			$error_user = 'Tên tài khoản này đã tồn tại ' ; 
			$count_error ++ ;
		}
	}
	
	if($passw != $confirm_passw ) {
		$confirm_error = 'Xác nhận mật khẩu không chính xác';
		$count_error ++ ;
	}elseif (!preg_match($regex_passw, $passw)) {
		$error_r_passw = 'Mật khẩu không hợp lệ';//////
		$count_error ++ ;
	} 
		//
	if(isset($_POST['radio-gender'])){
		$_SESSION['add_user']['gender']  = $_POST['radio-gender'];
	}  else {
		$error_gender = "Bạn chưa chọn giới tính";/////
		$count_error ++ ;
	}
	if(isset($_POST['lang_add'])){
		$language = '' ;
		foreach ($_POST['lang_add'] as $key => $value) {
			$language = $language.','.$value;
		}
	    	$language = trim($language , ','); //xóa dấu  ',' ở đầu và cuối chuỗi
	    	$_SESSION['add_user']['language'] = $language ;
	    }
	  	else {
	    	$error_language = 'Bạn chưa chon ngôn ngữ'; //////
	    	$count_error ++ ;
	    }
	    if (isset($_POST['nationality']) & $_POST['nationality'] != '' ) {
	    	$_SESSION['add_user']['nationality'] = $_POST['nationality'];

	    }else{
	    	$error_national = "Bạn chưa chon quốc gia" ; //////////////
	    	$count_error ++ ;
	    }
	    // upload file image ; ------------------------------
	if (isset( $_FILES['avatar'])) {
			$type_image =  $_FILES['avatar']["type"]  ;
		 	$type_image = explode('/', $type_image);
		 if (isset($type_image[1])) {
		 	
		 
		if ($type_image[1] == "jpeg" | $type_image[1] == "jpg" | $type_image[1] == "png" | $type_image[1] == "gif" ) {

			$name_avatar = time().$_FILES['avatar']['name'] ; 
			$tmp_file    = $_FILES['avatar']['tmp_name'] ; 
			move_uploaded_file($tmp_file, '../image/avatar/'.$name_avatar);
			if (isset($_SESSION['add_user']['avatar'])) {
				unlink("../image/avatar/".$_SESSION['add_user']['avatar']) ;
			}
			$_SESSION['add_user']['avatar'] = $name_avatar ; 
		}
		else{ $error_imgage = 'Bạn nên chọn file ảnh ' ;
			$count_error ++ ;
		 } 
		

	}
		else{
			if (!isset($_SESSION['add_user']['avatar'])) {
				$error_imgage = 'Bạn chưa chọn file ảnh đại diện';
				$count_error ++ ;
			}
		}
	
	}
	
	if($count_error == 0 ){
		header("Location: index.php?page=confirm&method=add");
		// echo "<pre>";
		// print_r($_SESSION['add_user']);
		// echo "<pre>" ;
	}
	
}
?>
///////////////////////////////////////////////

<?php
foreach ($_POST['flower'] as $names)
{
        print "You are selected $names<br/>";
}

?>
/////////////////////////////////////////////////
<form action="c3.php" method="post">
  <select name="ary[]" multiple="multiple">
    <option value="Option 1" >Option 1</option>
    <option value="Option 2">Option 2</option>
    <option value="Option 3">Option 3</option>
    <option value="Option 4">Option 4</option>
    <option value="Option 5">Option 5</option>
  </select>
  <input type="submit">
</form>
PHP:

<?php
$values = $_POST['ary'];

foreach ($values as $a){
    echo $a;
}
?>
//////////////////////////////////////////////////////

<?php

    if ($_POST) { 
        foreach($_POST['select2'] as $selected) {
            echo $selected."<br>";
        }
    }

?>
//////////////////////////////////////////////////////