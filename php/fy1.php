<?php 
	// 数据库连接常量 
	define('DB_HOST', 'localhost'); 
	define('DB_USER', 'root'); 
	define('DB_PWD', ''); 
	define('DB_NAME', 'travel');  
	 // 连接数据库 
	
	function conn() 
	{ 
	   	@$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
	   	@mysqli_query($conn, "set names utf8"); 
	  	return $conn; 
	} 
	//获得结果集 
	function doresult($sql){ 
	 	@$result=mysqli_query(conn(), $sql); 
	  	return @$result; 
	} 
	 //结果集转为对象集合 
	function dolists($result){ 
	  	return @mysqli_fetch_array($result, MYSQL_ASSOC); 
	}
	function totalnums($sql) { 
	  	@$result=mysqli_query(conn(), $sql); 
		return @$result->num_rows; 
	} 
	 // 关闭数据库 
	function closedb() 
	{ 
	   	if (! mysqli_close()) { 
	    	exit('关闭异常'); 
	   	} 
	} 
	 

	
	
	// 总记录数 
	$sql = "SELECT title_id FROM travels "; 
	$totalnums = totalnums($sql); 
	   
	 // 每页显示条数 
	$fnum = 8; 
	  
	 // 翻页数 
	$pagenum = ceil($totalnums / $fnum); 
	  
	 //页数常量 
	@$tmp = $_GET['page']; 
	   
	 //防止恶意翻页 
	if ($tmp > $pagenum) 
	   	echo "<script>window.location.href='fy.php'</script>"; 
	   
	//计算分页起始值 
	if ($tmp == "") { 
	  	$num = 0; 
	} else { 
	  	$num = ($tmp - 1) * $fnum; 
	} 
	// 查询语句 
	$sql = "SELECT title,title_id FROM travels ORDER BY title_id DESC LIMIT " . $num . ",$fnum"; 
	$result = doresult($sql); 
	  
	 // 遍历输出 
	while (! ! $rows = dolists($result)) { 
	   	echo $rows['title_id'] . " " . $rows['title'] . "<br>"; 
	} 
	   
	 // 翻页链接 
	for ($i = 0; $i < $pagenum; $i ++) { 
	   	echo "<a href=fy.php?page=" . ($i + 1) . ">" . ($i + 1) . "</a>"; 
	}  
?>