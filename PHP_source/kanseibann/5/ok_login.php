<?php
	// �Z�b�V�����̕���
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>���O�C��</title>
</head>
<body>
<?php
	// ���O�C���m�F
	if ($_SESSION['login'] == 'OK') {
		// ���O�C������
		echo '�����O�C�����ł��B';
		echo '<br><br>';
		echo '�ڑ����[�U�[�F' . $_SESSION['name'];
	} else {
		// ���O�C�����s
		echo '�����O�C�����Ă��܂���B';
	}
?>
</body>
</html>