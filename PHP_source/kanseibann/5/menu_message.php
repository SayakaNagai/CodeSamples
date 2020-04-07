<?php
	// セッションの復元
	session_start();

	// ログインチェック
	require_once 'check_login_message.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>掲示板</title>
</head>
<body>
Login: <b><?php echo $_SESSION['name']; ?></b>
<hr>
<a href="logout.php">【ログアウト】</a>
<hr>
■掲示板メニュー<br>
<ul>
<li><a href="write_message.php">メッセージを書く</a>
<li><a href="show_message.php">メッセージを読む</a>
</ul>
</body>
</html>