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
	}
	// �E��
	$job = htmlspecialchars($_POST['job'], ENT_QUOTES);
?>
<body>
���A���P�[�g�̓��e���m�F���Ă��������B
<br>
���̖{�̍w�����������Ă��������B<br>
<?php
	// �S�p���甼�p�֕ϊ�
	$pdate = mb_convert_kana($pdate, 'a', 'SJIS');
	// �u/�v�ŕ���
	list($year,$month,$day) = explode('/', $pdate);

	// ���t�`�F�b�N
	if (checkdate($month,$day,$year)) {
		echo $pdate;
	} else {
		echo $pdate . '�i���t�Ɍ�肪����܂��B�j';
	}
?>
<br><br>
�ꂩ��������̏��Ђ̕��ύw���z�������Ă��������B<br>
<?php
	// �S�p���甼�p�֕ϊ�
	$pprice = mb_convert_kana($pprice, 'a', 'SJIS');

	// ���l�`�F�b�N
	if (is_numeric($pprice)) {
		echo $pprice . '�~';
	} else {
		echo $pprice . '�~�i���l�ł͂���܂���B�j';
	}
?>
<br><br>
�{���̕]���������Ă��������B�i5�i�K�j<br>
<?php echo $star; ?>
<br><br>
�����̂��錾��������Ă��������B�i�����I���j<br>
<?php
	for ($i = 0; $i <6; $i++) {
		// �`�F�b�N����Ă�����̂̂ݕ\��
		if ($lang[$i] != '') echo '[' . $lang[$i] . ']';
	}
?>
<br><br>
���Ȃ��̐E��������Ă��������B<br>
<?php echo $job; ?>
<br><br>
<form action="write_question_db.php" method="POST">
<input type="hidden" name="pdate" value="<?php echo $pdate; ?>">
<input type="hidden" name="pprice" value="<?php echo $pprice; ?>">
<input type="hidden" name="star" value="<?php echo $star; ?>">
<?php
	for ($i = 0; $i < 6; $i++) {
		echo '<input type="hidden" name="lang[' . $i . ']" value="' . $lang[$i] . '">';
	}
?>
<input type="hidden" name="job" value="<?php echo $job; ?>">
<input type="submit" value="�A���P�[�g�𑗐M����">
</form>
</body>
</html>