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

		// データベースからの取り出しSQL文 ①
		$sql = 'SELECT message_id,message_title,message,user_name,entry_date
			FROM message_tb
			ORDER BY message_id';

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
■メッセージ一覧<br>
<table border=1>
<tr bgcolor="#CCCCCC">
<td>ID</td>
<td>タイトル</td>
<td>メッセージ</td>
<td>ユーザー</td>
<td>登録日</td>
</tr>
<?php
	// データの取り出し
	while($row=mysql_fetch_object($query)) {
		echo '<tr>';
		echo '<td>' . $row->message_id .'</td>';
		echo '<td>' . $row->message_title .'</td>';
		echo '<td>' . nl2br($row->message) .'</td>';
		echo '<td>' . $row->user_name .'</td>';
		echo '<td>' . $row->entry_date .'</td>';
		echo '</tr>';
	}
?>
</table>
</body>
</html>

