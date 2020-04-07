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

	// �ۑ��f�[�^
	$data = array($pdate,$pprice,$star,$lang[0],$lang[1],$lang[2],$lang[3],$lang[4],$lang[5],$job);

	// �ۑ��t�@�C����
	$filename = 'uploads/question.csv';

	// append���[�h�ŊJ��
	$handle = fopen($filename,'a');

	// �r���I���b�N
	flock($handle, LOCK_EX);

	// CSV��������
	fputcsv($handle, $data);

	// ����
	fclose($handle);
?>
<body>
���A���P�[�g��o�^���܂����B
<br>
<br>
<a href="uploads/question.csv">CSV�t�@�C���̃_�E�����[�h</a>
</body>
</html>