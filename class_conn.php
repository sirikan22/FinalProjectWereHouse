<?php
date_default_timezone_set('Asia/Bangkok');
class class_conn{

//ตั้งฐานข้อมูล
public $db_server = "localhost";
public $db_username = "root";
public $db_password = "qwerty@123";
public $db_database = "db_wrshouse03";
//ฟังก์ชั่นในการเรียกดูข้อมูล จะใช้กับ select ต่างๆ

public function select_base($sql){
$db_server = $this->db_server;//เรียกตัวแปร db_server จาก public มาใส่ใน $db_server ในฟังก์ชั่น
$db_username = $this->db_username;
$db_password = $this->db_password;
$db_database = $this->db_database;
$con = mysqli_connect($db_server,$db_username,$db_password,$db_database);
mysqli_set_charset($con,"utf8"); //set ข้อมูลในฐานข้อมูลเป็นภาษาไทย
if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: ". mysqli_connect_error();
}
$result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
}

public function prepare_select($sql, $types, ...$params){
    $db_server = $this->db_server;
    $db_username = $this->db_username;
    $db_password = $this->db_password;
    $db_database = $this->db_database;

    $con = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    mysqli_set_charset($con, "utf8");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        return $result;
    } else {
        mysqli_close($con);
        return false;
    }
}

public function prepare_execute($sql, $types, ...$params){
    $db_server = $this->db_server;
    $db_username = $this->db_username;
    $db_password = $this->db_password;
    $db_database = $this->db_database;

    $con = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    mysqli_set_charset($con, "utf8");

    if (mysqli_connect_errno()) {
        return false;
    } else {
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($con);
            return true;
        } else {
            mysqli_close($con);
            return false;
        }
    }
}

//ฟังก์ชั่นในการเพิ่ม/ลบ/แก้ไขข้อมูลลงฐานข้อมูลใช้กับคำสั่ง insert,delete,update
public function write_base($sql){
$db_server = $this->db_server;//เรียกตัวแปร db_server จาก public มาใส่ใน $db_server ในฟังก์ชั่น
$db_username = $this->db_username;
$db_password = $this->db_password;
$db_database = $this->db_database;
$con = mysqli_connect($db_server,$db_username,$db_password,$db_database);
mysqli_set_charset($con,"utf8"); //set ข้อมูลในฐานข้อมูลเป็นภาษาไทย
if(mysqli_connect_errno())
{

	return false;
}
else{
	mysqli_query($con,$sql);
	mysqli_close($con);
	return true;
}



}

public function select_numrows_prepared($sql, $types, ...$params){
    $db_server = $this->db_server;
    $db_username = $this->db_username;
    $db_password = $this->db_password;
    $db_database = $this->db_database;

    $con = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    mysqli_set_charset($con, "utf8");

    if (mysqli_connect_errno()) {
        return false;
    } else {
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $num_rows = mysqli_num_rows($result);
            mysqli_stmt_close($stmt);
            mysqli_close($con);
            return $num_rows;
        } else {
            mysqli_close($con);
            return false;
        }
    }
}

public function select_base_prepared($sql, $types, ...$params){
    $db_server = $this->db_server;
    $db_username = $this->db_username;
    $db_password = $this->db_password;
    $db_database = $this->db_database;

    $con = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    mysqli_set_charset($con, "utf8");

    if (mysqli_connect_errno()) {
        return false;
    } else {
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($con);
            return $result;
        } else {
            mysqli_close($con);
            return false;
        }
    }
}

//ฟังก์ชั่นในการนับจำนวนแถว
public function select_numrows($sql){
$db_server = $this->db_server;//เรียกตัวแปร db_server จาก public มาใส่ใน $db_server ในฟังก์ชั่น
$db_username = $this->db_username;
$db_password = $this->db_password;
$db_database = $this->db_database;
$con = mysqli_connect($db_server,$db_username,$db_password,$db_database);
mysqli_set_charset($con,"utf8"); //set ข้อมูลในฐานข้อมูลเป็นภาษาไทย

if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: ". mysqli_connect_error();
}
$result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
}
//ฟังก์ชั่นแสดงข้อความ
public function show_message($word){
return "<script type='text/javascript'>alert('$word');</script>";
}
//ฟังก์ชั่นในการลิงค์ไปหน้าอื่น
public function goto_page($speed,$url){
return "<meta http-equiv='refresh' content='$speed;$url' />";
}

// Check connection
}
function conndb() 
	{
        global $conn;
        global $host;
        global $user;
        global $pass;
        global $dbname;
        $conn = mysqli_connect($host,$user,$pass);

		mysqli_select_db($conn,$dbname);
		mysqli_query($conn,"SET NAMES utf8");

    }

    function closedb() 
	{
		global $conn;
        mysqli_close($conn);
    }

?>