<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>アンケート結果</title>
</head>
<body>
<?php
	// 日付チェック関数の作成
	function get_checked_date($date)
	{
		// 全角から半角へ変換
		$checked_date = mb_convert_kana($date, 'a', 'SJIS');
		// 「/」で分割
		list($year,$month,$day) = explode('/', $checked_date);
		// 日付チェック
		if (!checkdate($month,$day,$year)) {
			// 現在の日付
			$checked_date = date('Y/m/d');
		}

		return $checked_date;
	}

	$sdate = get_checked_date($_POST['sdate']);
	$edate = get_checked_date($_POST['edate']);
	$sort = htmlspecialchars($_POST['sort'], ENT_QUOTES);
?>
■アンケート結果
<br>
<table border=1>
<tr bgcolor="#CCCCCC">
<td>ID</td>
<td>購入日</td>
<td>平均購入額</td>
<td>評価</td>
<td>PHP</td>
<td>Perl</td>
<td>Java</td>
<td>C#</td>
<td>C++</td>
<td>Basic</td>
<td>職業</td>
<td>登録日</td>
</tr>
<?php
	// MySQLへの接続
	$conn = mysql_connect('localhost','sample_user','sample_pass');

	if ($conn) {
		// データベースの選択
		mysql_select_db('sample_db',$conn);

		// データベースへの問い合わせSQL文
		$sql = 'SELECT question_id,purchase_date,purchase_price,star,
				lang_php,lang_perl,lang_java,lang_cs,lang_cpp,lang_basic,
				job,entry_date
			FROM question_tb
			WHERE purchase_date >= "' . $sdate . '"
			AND purchase_date <= "' . $edate . '"';

		// ソート
		if ($sort == 'date') {
			$sql = $sql . ' ORDER BY purchase_date';
		} else {
			$sql = $sql . ' ORDER BY star';
		}

		// SQL文の実行
		$query = mysql_query($sql, $conn);
		
		// データの取り出し
		while($row=mysql_fetch_object($query)) {
			echo '<tr>';
			echo '<td>' . $row->question_id .'</td>';
			echo '<td>' . $row->purchase_date .'</td>';
			echo '<td>' . $row->purchase_price .'</td>';
			echo '<td>' . $row->star .'</td>';
			echo '<td>' . $row->lang_php .'</td>';
			echo '<td>' . $row->lang_perl .'</td>';
			echo '<td>' . $row->lang_java .'</td>';
			echo '<td>' . $row->lang_cs .'</td>';
			echo '<td>' . $row->lang_cpp .'</td>';
			echo '<td>' . $row->lang_basic .'</td>';
			echo '<td>' . $row->job .'</td>';
			echo '<td>' . $row->entry_date .'</td>';
			echo '</tr>';
		}
	}
?>
</table>
</body>
</html>