<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>�A���P�[�g����</title>
</head>
<body>
<?php
	// ���t�`�F�b�N�֐��̍쐬
	function get_checked_date($date)
	{
		// �S�p���甼�p�֕ϊ�
		$checked_date = mb_convert_kana($date, 'a', 'SJIS');
		// �u/�v�ŕ���
		list($year,$month,$day) = explode('/', $checked_date);
		// ���t�`�F�b�N
		if (!checkdate($month,$day,$year)) {
			// ���݂̓��t
			$checked_date = date('Y/m/d');
		}

		return $checked_date;
	}

	$sdate = get_checked_date($_POST['sdate']);
	$edate = get_checked_date($_POST['edate']);
	$sort = htmlspecialchars($_POST['sort'], ENT_QUOTES);
?>
���A���P�[�g����
<br>
<table border=1>
<tr bgcolor="#CCCCCC">
<td>ID</td>
<td>�w����</td>
<td>���ύw���z</td>
<td>�]��</td>
<td>PHP</td>
<td>Perl</td>
<td>Java</td>
<td>C#</td>
<td>C++</td>
<td>Basic</td>
<td>�E��</td>
<td>�o�^��</td>
</tr>
<?php
	// MySQL�ւ̐ڑ�
	$conn = mysql_connect('localhost','sample_user','sample_pass');

	if ($conn) {
		// �f�[�^�x�[�X�̑I��
		mysql_select_db('sample_db',$conn);

		// �f�[�^�x�[�X�ւ̖₢���킹SQL��
		$sql = 'SELECT question_id,purchase_date,purchase_price,star,
				lang_php,lang_perl,lang_java,lang_cs,lang_cpp,lang_basic,
				job,entry_date
			FROM question_tb
			WHERE purchase_date >= "' . $sdate . '"
			AND purchase_date <= "' . $edate . '"';

		// �\�[�g
		if ($sort == 'date') {
			$sql = $sql . ' ORDER BY purchase_date';
		} else {
			$sql = $sql . ' ORDER BY star';
		}

		// SQL���̎��s
		$query = mysql_query($sql, $conn);
		
		// �f�[�^�̎��o��
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