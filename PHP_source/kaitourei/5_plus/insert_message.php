<?php
	// セッションの復元
	session_start();

	// ログインチェック
	require_once 'check_login_message.php';

	// タイトル、メッセージ
	$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
	$message = htmlspecialchars($_POST['message'], ENT_QUOTES);

	// MySQLへの接続
	$conn = mysql_connect('localhost','sample_user','sample_pass');

	if ($conn) {
		// データベースの選択
		mysql_select_db('sample_db',$conn);

		// データベースへ書き込むSQL文
		$sql = 'INSERT INTO message_tb(message_title,message,user_name)
			VALUES("' . $title . '","' . $message. '","' . $_SESSION['name'] . '")';

		// SQL文の実行
		$query = mysql_query($sql, $conn);
	}
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
■メッセージを登録しました。<br>
<br><br>
<a href="show_message.php">メッセージを読む</a>
</body>
</html>