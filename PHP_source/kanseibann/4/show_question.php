<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>アンケート</title>
</head>
<body>
■アンケート結果
<br>
<table border=1>
<tr bgcolor="#CCCCCC">
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
</tr>
<?php
	// ファイル名
	$filename = 'uploads/question.csv';

	// ロケール設定
	setlocale(LC_ALL, 'ja_JP');

	// readモードで開く
	$handle = fopen($filename,'r');

	// CSVデータを取り出す
	while($data = fgetcsv($handle,1000)) {
		// 一行分のデータを取り出す
		list($pdate,$pprice,$star,$lang[0],$lang[1],$lang[2],$lang[3],$lang[4],$lang[5],$job) = $data;

		// 一行分のデータを表示
		echo '<tr>';
		echo '<td>' . $pdate .'</td>';
		echo '<td>' . $pprice .'</td>';
		echo '<td>' . $star .'</td>';

		for ($i=0; $i<6; $i++) {
			if ($lang[$i] == '') {
				echo '<td align="center">－</td>';
			} else {
				echo '<td align="center">○</td>';
			}
		}
		
		echo '<td>' . $job .'</td>';
		echo '</tr>';
	}

	// 閉じる
	fclose($handle);
?>
</table>
</body>
</html>