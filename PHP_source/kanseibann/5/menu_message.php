<?php
	// �Z�b�V�����̕���
	session_start();

	// ���O�C���`�F�b�N
	require_once 'check_login_message.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>�f����</title>
</head>
<body>
Login: <b><?php echo $_SESSION['name']; ?></b>
<hr>
<a href="logout.php">�y���O�A�E�g�z</a>
<hr>
���f�����j���[<br>
<ul>
<li><a href="write_message.php">���b�Z�[�W������</a>
<li><a href="show_message.php">���b�Z�[�W��ǂ�</a>
</ul>
</body>
</html>