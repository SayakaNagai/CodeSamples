<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>�A���P�[�g</title>
</head>
<?php
	// �w����
	$pdate = htmlspecialchars($_POST['pdate'], ENT_QUOTES);
	// ���ύw�����z
	$pprice = htmlspecialchars($_POST['pprice'], ENT_QUOTES);
	// �]��
	$star = htmlspecialchars($_POST['star'], ENT_QUOTES);
	
	// �����̂��錾��
	for ($i = 0; $i < 6; $i++) {
		$lang[$i] = htmlspecialchars($_POST['lang'][$i], ENT_QUOTES);
		// 1,0�ɕϊ�
		if ($lang[$i] == '') {
			$lang[$i] = 0;
		} else {
			$lang[$i] = 1;
		}
	}

	// �E��
	$job = htmlspecialchars($_POST['job'], ENT_QUOTES);

	// ���t�`�F�b�N
	// �S�p���甼�p�֕ϊ�
	$pdate = mb_convert_kana($pdate, 'a', 'SJIS');
	// �u/�v�ŕ���
	list($year,$month,$day) = explode('/', $pdate);
	// ���t�`�F�b�N
	if (!checkdate($month,$day,$year)) $pdate = '';

	// ���l�`�F�b�N
	// �S�p���甼�p�֕ϊ�
	$pprice = mb_convert_kana($pprice, 'a', 'SJIS');
	// ���l�`�F�b�N
	if (!is_numeric($pprice)) $pprice = '';

	// MySQL�ւ̐ڑ�
	$conn = mysql_connect('localhost','sample_user','sample_pass');

	if ($conn) {
		// �f�[�^�x�[�X�̑I��
		mysql_select_db('sample_db',$conn);

		// �f�[�^�x�[�X�ւ̏�������SQL��
		$sql = 'INSERT INTO question_tb(purchase_date,purchase_price,star,
				lang_php,lang_perl,lang_java,lang_cs,lang_cpp,lang_basic,job)
			VALUES ("' . $pdate . '",' . $pprice. ',' . $star . ','. 
				$lang[0] . ',' . $lang[1] . ',' . $lang[2] . ',' . $lang[3] . ','. $lang[4] . ',' . $lang[5] . ',"' . $job . '")';

		// SQL���̎��s
		$query = mysql_query($sql, $conn);
	}
?>
<body>
���A���P�[�g��o�^���܂����B
</body>
</html>