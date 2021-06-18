/////////////////////////////////////////////////////////////////
<?php include("dbconnect.php"); ?>
<h2>View My Guest Book!!</h2>
<?php
 $result = mysql_query("select * from guestbook") or die (mysql_error());
 while ($row = mysql_fetch_array($result))
 {
         echo "<b>Name:</b>"; 
         echo $row["name"];
         echo "<br>\n";
         echo "<b>Location:</b>";
         echo $row["location"]; 
         echo "<br>\n";
         echo "<b>Email:</b>";
         echo $row["email"]; 
         echo "<br>\n";
         echo "<b>URL:</b>"; 
         echo $row["url"]; 
         echo "<br>\n"; 
         echo "<b>Comments:</b>"; 
         echo $row["comments"]; 
         echo "<br>\n"; 
         echo "<br>\n"; 
         echo "<br>\n";
 }
 mysql_free_result($result);
?>
<h2><a href="sign.php">Sign My Guest Book!!</a></h2>
//////////////////////////////////////////////////////////////////////////////////
<tr>
 <td><?php echo $i; ?></td>
 <td><?php echo $data['username']; ?></td>
 <td><?php echo $data['email']; ?></td>
 <td><?php echo ($data['is_block'] == 1) ? "Bị khóa" : "Không bị khóa"; ?></td>
 <td><?php echo ($data['permision'] == 0) ? "Admin" : "Thành viên thường"; ?></td>
 <td>
  <a href="chinh-sua-thanh-vien.php?id=<?php echo $id;?>">Sửa</a>
  <a href="quan-ly-thanh-vien.php?id_delete=<?php echo $id;?>">Xóa</a>
 </td>
</tr>
/////////////////////////////////////////////////////////////////////////////////////
<?php
	session_start(); 
 ?>
<?php require_once("includes/connection.php");?>
<?php include("includes/permission.php");?>
<?php include ("includes/header.php"); ?>
<?php
	$sql = "SELECT * FROM users";
	$query = mysqli_query($conn,$sql);
?>
<a href="them-thanh-vien.php">Thêm thành viên</a>
<table border="1px;" align="center">
	<thead>
		<tr>
			<td bgcolor="#E6E6FA">ID</td>
			<td bgcolor="#E6E6FA">Username</td>
			<td bgcolor="#E6E6FA">Email</td>
			<td bgcolor="#E6E6FA">Khóa tài khoản</td>
			<td bgcolor="#E6E6FA">Quyền</td>
			<td bgcolor="#E6E6FA">Hành động</td>
		<tr>
	</thead>
	<tbody>
	<?php 
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['id'];
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo ($data['is_block'] == 1) ? "Bị khóa" : "Không bị khóa"; ?></td>
			<td><?php echo ($data['permision'] == 0) ? "Thành viên thường" : "Admin"; ?></td>
			<td>
				<a href="chinh-sua-thanh-vien.php?id=<?php echo $id;?>">Sửa</a>
				<a href="quan-ly-thanh-vien.php?id_delete=<?php echo $id;?>">Xóa</a>
			</td>
		</tr>
	<?php 
			$i++;
		}
	?>
	</tbody>
</table>
<?php include "includes/footer.php" ?>
/////////////////////////////////////////////////////////////////////////
<?php
$servername = "localhost";
$username = "root";
$password = "1234567890";
$dbname = "myDB";
 
// tạo connection
$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // output dữ liệu trên trang
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " "
            . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
////////////////////////////////////////////////////////////////////////////
<?php include("dbconnect.php"); ?> 
<h2>View My Guest Book!!</h2> 
<?php 
 $result = mysql_query("select * from guestbook") or die (mysql_error()); 
 while ($row = mysql_fetch_array($result)) 
 { 
         echo "<b>Name:</b>"; 
         echo $row["name"]; 
         echo "<br>\n"; 
         echo "<b>Location:</b>"; 
         echo $row["location"]; 
         echo "<br>\n"; 
         echo "<b>Email:</b>"; 
         echo $row["email"]; 
         echo "<br>\n"; 
         echo "<b>URL:</b>"; 
         echo $row["url"]; 
         echo "<br>\n"; 
         echo "<b>Comments:</b>"; 
         echo $row["comments"]; 
         echo "<br>\n"; 
         echo "<br>\n"; 
         echo "<br>\n"; 
 } 
 mysql_free_result($result); 
?> 
<h2><a href="sign.php">Sign My Guest Book!!</a></h2>
///////////////////////////////////////////////////////////////////////
<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('hrmwaitrose');

$query = "SELECT * FROM employee"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['age'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection

?>
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
<?php
function display_data($data) {
    $output = '<table>';
    foreach($data as $key => $var) {
        $output .= '<tr>';
        foreach($var as $k => $v) {
            if ($key === 0) {
                $output .= '<td><strong>' . $k . '</strong></td>';
            } else {
                $output .= '<td>' . $v . '</td>';
            }
        }
        $output .= '</tr>';
    }
    $output .= '</table>';
    echo $output;
}
?>
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
<?php include("dbconnect.php"); ?>
<h2>View My Guest Book!!</h2>
<?php
 $result = mysql_query("select * from guestbook") or die (mysql_error());
 while ($row = mysql_fetch_array($result))
 {
         echo "<b>Name:</b>"; 
         echo $row["name"];
         echo "<br>\n";
         echo "<b>Location:</b>";
         echo $row["location"]; 
         echo "<br>\n";
         echo "<b>Email:</b>";
         echo $row["email"]; 
         echo "<br>\n";
         echo "<b>URL:</b>"; 
         echo $row["url"]; 
         echo "<br>\n"; 
         echo "<b>Comments:</b>"; 
         echo $row["comments"]; 
         echo "<br>\n"; 
         echo "<br>\n"; 
         echo "<br>\n";
 }
 mysql_free_result($result);
?>
<h2><a href="sign.php">Sign My Guest Book!!</a></h2>
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,

<?php
$connection = mysqli_connect("localhost", "root", "abcd", "learn_php_mysql_db");

$sql="SELECT * FROM posts ORDER BY id";

$result = mysqli_query($connection, $sql);

if ($result) {
    // Hàm `mysql_fetch_row()` sẽ chỉ fetch dữ liệu một record mỗi lần được gọi
    // do đó cần sử dụng vòng lặp While để lặp qua toàn bộ dữ liệu trên bảng posts
    while ($row=mysqli_fetch_row($result)) {
        printf ("Id: %s, Title: %s, Content: %s<br>",$row[0],$row[1], $row[2]);
    }

    // Máy tính sẽ lưu kết quả từ việc truy vấn dữ liệu bảng
    // Do đó chúng ta nên giải phóng bộ nhớ sau khi hoàn tất đọc dữ liệu
    mysqli_free_result($result);
}
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
<?php
require_once 'dbconfig.php';
  
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  
    $sql = 'SELECT lastname,
                    firstname,
                    jobtitle
               FROM employees
              ORDER BY lastname';
  
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <h1>Employees</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Job Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['lastname']) ?></td>
                            <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                            <td><?php echo htmlspecialchars($row['jobtitle']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

// tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm kết nối
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, email, reg_date FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Load dữ liệu lên website
while($row = $result->fetch_assoc()) {
echo "id: " . $row["id"]. " - Tên: " . $row["firstname"]. " "
. $row["lastname"]. " - Email: ". $row["email"]. " - Ngày đăng ký: ". $row["reg_date"]."<br>";
}
} else {
echo "0 results";
}
$conn->close();
?>
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,