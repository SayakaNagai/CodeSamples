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
<?php
	// ���ʃ��j���[
	require_once 'header_message.php';
?>
�����b�Z�[�W����͂��Ă��������B<br>
<form action="insert_message.php" method="POST">
�^�C�g���F<br>
<input type="text" name="title" size="50">
<br><br>
���b�Z�[�W�F<br>
<textarea name="message" cols="40" rows="5"></textarea>
<br><br>
<input type="submit" value="���b�Z�[�W�̓o�^">
</form>
</body>
</html>