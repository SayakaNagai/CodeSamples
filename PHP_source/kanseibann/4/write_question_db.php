<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>アンケート</title>
</head>
<?php
	// 購入日
	$pdate = htmlspecialchars($_POST['pdate'], ENT_QUOTES);
	// 平均購入金額
	$pprice = htmlspecialchars($_POST['pprice'], ENT_QUOTES);
	// 評価
	$star = htmlspecialchars($_POST['star'], ENT_QUOTES);
	
	// 興味のある言語
	for ($i = 0; $i < 6; $i++) {
		$lang[$i] = htmlspecialchars($_POST['lang'][$i], ENT_QUOTES);
		// 1,0に変換
		if ($lang[$i] == '') {
			$lang[$i] = 0;
		} else {
			$lang[$i] = 1;
		}
	}

	// 職業
	$job = htmlspecialchars($_POST['job'], ENT_QUOTES);

	// 日付チェック
	// 全角から半角へ変換
	$pdate = mb_convert_kana($pdate, 'a', 'SJIS');
	// 「/」で分割
	list($year,$month,$day) = explode('/', $pdate);
	// 日付チェック
	if (!checkdate($month,$day,$year)) $pdate = '';

	// 数値チェック
	// 全角から半角へ変換
	$pprice = mb_convert_kana($pprice, 'a', 'SJIS');
	// 数値チェック
	if (!is_numeric($pprice)) $pprice = '';

	// MySQLへの接続
	$conn = mysql_connect('localhost','sample_user','sample_pass');

	if ($conn) {
		// データベースの選択
		mysql_select_db('sample_db',$conn);

		// データベースへの書き込みSQL文
		$sql = 'INSERT INTO question_tb(purchase_date,purchase_price,star,
				lang_php,lang_perl,lang_java,lang_cs,lang_cpp,lang_basic,job)
			VALUES ("' . $pdate . '",' . $pprice. ',' . $star . ','. 
				$lang[0] . ',' . $lang[1] . ',' . $lang[2] . ',' . $lang[3] . ','. $lang[4] . ',' . $lang[5] . ',"' . $job . '")';

		// SQL文の実行
		$query = mysql_query($sql, $conn);
	}
?>
<body>
■アンケートを登録しました。
</body>
</html>