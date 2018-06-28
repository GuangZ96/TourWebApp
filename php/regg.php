<?php
	@$a = $_POST['uname'];
	@$aa = $_POST['upasswd'];
	@$aaa = $_POST['upasswdcom'];
	@$aaaa = $_POST['uemail'];
	
	$c = mysqli_connect('localhost', 'root', '', 'travel');
	mysqli_query($c, "set names 'utf8'");
	
	$i = "insert into travel_users(usename,usepasswd,usepasswdcom,useemail) values ('$a','$aa','$aaa','$aaaa')";
	$r = mysqli_query($c, $i);
	
	if ($r) {
		header("Refresh:3;url=/bs/denglu.html");
	}
    mysqli_close($c);
?>