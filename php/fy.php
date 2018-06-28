<?php 
	@$article1 = isset($_POST['article1']) ? htmlspecialchars($_POST['article1']) : '';
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "travel";
	 
	// 创建连接
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	    die("连接失败: " . mysqli_connect_error());
	}
	 //结果集转为对象集合 
	function dolists($result){ 
	  	return @mysqli_fetch_array($result, MYSQL_ASSOC); 
	}
	 

	mysqli_query($conn, "set names 'utf8'");
	
	// 总记录数 
	$sql = "SELECT title_id FROM travels "; 
	$totalnums = mysqli_query($conn, $sql)->num_rows; 
	 // 每页显示条数 
	$fnum = 8; 
	  
	 // 翻页数 
	@$pagenum = ceil($totalnums / $fnum); 
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
	$sql = "SELECT * FROM travels ORDER BY title_id DESC LIMIT " . $num . ",$fnum"; 
	$result = mysqli_query($conn, $sql); 
	  
	 // 遍历输出 
	while (! ! $row = dolists($result)) { 
	   	echo "<a href='article.html?".$row["title_id"]."' data-ajax='true' id='article_title' value='".$row["title"]."' onchange='href_l(this.value)'>
					<span class='travel_note_img'>
		  				<img src='".$row["image"]."'/>
		  				<span>精华</span>
		  			</span>
		  			<div class='travel_note_title'>".$row["title"]."</div>
				</a>";
	} 
	   
	 // 翻页链接 
	echo "<div align='center'>";
	for ($i = 0; $i < $pagenum; $i ++) {
		$ture_num=$i + 1;
	   	 /*<button  onclick='btn_num(value)' id='btn_num' value='".$ture_num."'>".$ture_num." </button>"*/
	} 
	echo "<script>var page_max = $ture_num</script>";
	echo "</div>";
	$conn->close();
?>