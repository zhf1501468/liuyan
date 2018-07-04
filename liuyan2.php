<?php
date_default_timezone_set("Asia/Shanghai"); 
header("content-type:text/html;charset=utf-8");
$c=$_POST["contern"]; 
if(empty($c)){  
echo "<script type='text/javascript'>alert('留言内容不能为空');history.back();</script>"; 
}else
{    
$u=$_POST["user"]; 
if(empty($u)){   
echo "<script type='text/javascript'>alert('留言用户不能为空');history.back();</script>";  
}else
{
$t=date("Y-m-d,H:m:s");   

$db = array (
		'server' => 'localhost',
		'port' => '3306',
		'username' => 'root',
		'password' => '',
		'database' => 'gdmec' 
);


$conn = @mysql_connect($db['server'].':'.$db['port'],$db['username'],$db['password']);
if (! $conn) {
	echo "服务器不能连！" . mysql_error();
} else {
	// 声明字符集
	mysql_set_charset('utf8', $conn);
	// 选择数据库
	mysql_select_db($db['database'], $conn);
}
$sql="insert into test (name,content,time) values ('$u','$c','$t')";
$r=mysql_query($sql); 
if($r){  
	echo "修改成功！！！<br/>";
	header ( "location:liuyan.php" );

}else
{echo "<script type='text/javascript'>alert('留言失败');history.back();</script>";  
}

}}
?>
