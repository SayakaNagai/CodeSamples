<?php
	// �Z�b�V�����̕���
	session_start();

	// ���O�C���`�F�b�N
	require_once 'check_login_message.php';

	// �^�C�g���A���b�Z�[�W
	$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
	$message = htmlspecialchars($_POST['message'], ENT_QUOTES);

	// MySQL�ւ̐ڑ�
	$conn = mysql_connect('localhost','sample_user','sample_pass');

	if ($conn) {
		// �f�[�^�x�[�X�̑I��
		mysql_select_db('sample_db',$conn);

		// �f�[�^�x�[�X�֏�������SQL��
		$sql = 'INSERT INTO message_tb(message_title,message,user_name)
			VALUES("' . $title . '","' . $message. '","' . $_SESSION['name'] . '")';

		// SQL���̎��s
		$query = mysql_query($sql, $conn);
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>�f����</title>
</head>
<body>
Login: <b><?php echo $_SESSION['name']; ?></b>
<hr>
<a href="menu_message.php">�y���j���[�z</a>
<a href="logout.php">�y���O�A�E�g�z</a>
<hr>
�����b�Z�[�W��o�^���܂����B<br>
<br><br>
<a href="show_message.php">���b�Z�[�W��ǂ�</a>
</body>
</html>