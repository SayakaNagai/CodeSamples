<?php
	// セッションの復元
	session_start();

	// ログインチェック
	if ($_SESSION['login'] != 'OK') {
		// ログインしていないメッセージを表示する
		echo <<< EOT
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>掲示板</title>
</head>
<body>
■ログインしていません。
<br><br>
<a href="login.html">ログイン画面を開く</a>
</body>
</html>
EOT;

		// 終了
		exit();
	}
?>