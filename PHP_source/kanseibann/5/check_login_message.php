<?php
	// �Z�b�V�����̕���
	session_start();

	// ���O�C���`�F�b�N
	if ($_SESSION['login'] != 'OK') {
		// ���O�C�����Ă��Ȃ����b�Z�[�W��\������
		echo <<< EOT
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>�f����</title>
</head>
<body>
�����O�C�����Ă��܂���B
<br><br>
<a href="login.html">���O�C����ʂ��J��</a>
</body>
</html>
EOT;

		// �I��
		exit();
	}
?>