<?php
	@$search1 = isset($_POST['search1']) ? htmlspecialchars($_POST['search1']) : '';
	@$search2 = isset($_POST['search2']) ? htmlspecialchars($_POST['search2']) : '';
	
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "travel";
	 
	// 创建连接
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("连接失败: " . mysqli_connect_error());
	}
	mysqli_query($conn, "set names 'utf8'");
	if ($search1!=NULL&&$search2!=NULL){
		$sql = "SELECT * FROM travels where (title LIKE '%$search1%' OR abstract LIKE '%$search1%') AND (title LIKE '%$search2%' OR abstract LIKE '%$search2%')";
		$result = mysqli_query($conn, $sql);
	}else{
		$sql = "SELECT * FROM travels where title LIKE '%$search1%' OR abstract LIKE '%$search1%'";
		$result = mysqli_query($conn, $sql);
	}
	 
	if (mysqli_num_rows($result) > 0) {
	    // 输出数据
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "<a href='article.html?".$row["title_id"]."' data-ajax='true' id='article_title' value='".$row["title"]."' onchange='href_l(this.value)'>
					<div class='discover_travel_info'>
						<img class='discover_travel_img' src='".$row["image"]."' />
						<div class='discover_travel_title'>".$row["title"]."</div>
					</div>
				</a>";
	    }
	} else {
	    echo "0 结果";
	}
	$conn->close();
?>