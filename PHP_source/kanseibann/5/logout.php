<?php
	// �Z�b�V�����J�n
	session_start();

	// �Z�b�V�����ϐ���������
	$_SESSION = array();

	// �Z�b�V����ID��j��
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-3600, '/');
	}

	// �Z�b�V������j��
	session_destroy();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>���O�A�E�g</title>
</head>
<body>
�����O�A�E�g���܂����B<br>
<br>
�Z�b�V�������i$_SESSION�j:
<pre>
<?php
	// $_SESSION�̒��g��S�ĕ\��
	print_r($_SESSION);
?>
</pre>
</body>
</html>