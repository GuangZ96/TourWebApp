<?php
	@$b = $_POST['una'];
	@$bb = $_POST['upa'];

	$cc = mysqli_connect('localhost', 'root', '', 'travel');
	mysqli_query($cc, "set names 'utf8'"); 

    $s = "select userid from travel_users where usename = '$b' and usepasswd = '$bb'";
    $res = mysqli_query($cc,$s);

    if ($rr = mysqli_fetch_array($res)) {
		session_start();
		$_SESSION['usename'] = $b;
		$_SESSION['userid'] = $rr['userid'];
		setcookie('mingzi',$b,time()+240,"/");
		header('Refresh:3;url=/bs/my.html');
	} else {
		echo "用户名或密码错误,请输入正确的用户或密码";
		header("Refresh:3;url=/bs/denglu.html");
	}
?>