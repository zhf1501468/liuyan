<?php
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

$sql = "select * from test";
$result = mysql_query ( $sql );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
<link rel="stylesheet" type="text/css" href="liuyan1.css" />
</head>
<body>
<div id="web_bg" style="background-image: url(beijing.gif);"></div>
<span>留言板</span>
<div>
<form action="liuyan2.php" method="post"><textarea name="contern"></textarea><br />留言用户：<input type="text" name="user"/><br /><input type="submit" value="留言"/>
</form>
</div>
<div>
<table>
<thead>
									<tr>
									    
										<th>用户
										
										</td>
										<th>留言

										</td>
										<th>时间
										
										</td>
										
										</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$line = 0;
								while ( $row = mysql_fetch_array ( $result ) ) {
								$line++;
								$lineStyle = $line%2==1?"odd gradeX":"even gradeC";
									echo "<br><tr class='$lineStyle'><br>";
									
									echo "<td>" . $row ['name'] . "</td></br>";
									echo "<td>" . $row ['content'] . "</td>";
									echo "<td>" . $row ['time'] . "</td>";
									}
									echo "</tr>";
									?>
									</tbody>
									</table>
									</div>
</body>

