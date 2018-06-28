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
	mysqli_query($conn, "set names 'utf8'");
	$title_1=$article1;
	$sql = "SELECT * FROM travels where title_id='$title_1'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    // 输出数据
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "<div class='discover_travel_info'>
	        		<img src='".$row["image"]."' width='100%' height='240px' />
					<div>".$row["title"]."</div>
					<div>".$row["time"]."</div>
					<div>".$row["abstract"]."</div>
					<div style='text-align: left;word-wrap:break-word;'>".$row["article"]."</div>
				</div>";
	    }
	} else {
	    echo "0 结果";
	}
?>