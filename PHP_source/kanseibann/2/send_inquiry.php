<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>���₢���킹�t�H�[��</title>
</head>
<body>
<?php
	// ���₢���킹�^�C�g���A�ڍׂ̃Z�b�g
	$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
	$message = htmlspecialchars($_POST['message'],
		ENT_QUOTES);

	// ���{��iSJIS�j�̎w��
	mb_language('ja');
	mb_internal_encoding('SJIS');

	// From�A�h���X�̐ݒ�i�������M<���M���̃A�h���X>�j
	$name = '�������M';
	$email = '�����M���̃A�h���X��';
	$header = 'From: '. mb_encode_mimeheader($name) . '<' . $email .'>';

	// ���[�����M
	$result = mb_send_mail("�������̃��[���A�h���X��", $title, $message, $header);

	//���[�����M�̊m�F
	if ($result) {
		// ���[�����M�̐���
		echo '�����₢���킹���e��S���҂֑��M���܂����B';
	} else {
		// ���[�����M�̎��s
		echo '���S���҂ւ̑��M�Ɏ��s���܂����B';
	}
?>
</body>
</html>