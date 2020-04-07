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
<?php
	// 共通メニュー
	require_once 'header_message.php';
?>
■メッセージを入力してください。<br>
<form action="insert_message.php" method="POST">
タイトル：<br>
<input type="text" name="title" size="50">
<br><br>
メッセージ：<br>
<textarea name="message" cols="40" rows="5"></textarea>
<br><br>
<input type="submit" value="メッセージの登録">
</form>
</body>
</html>