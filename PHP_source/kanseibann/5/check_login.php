<?php
	// �Z�b�V�����̐���
	session_start();

	// ���[�U�[���^�p�X���[�h
	$user = htmlspecialchars($_POST['user'], ENT_QUOTES);
	$pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);

	// MySQL�ւ̐ڑ�
	$conn = mysql_connect('localhost','sample_user','sample_pass');

	if ($conn) {
		// �f�[�^�x�[�X�̑I��
		mysql_select_db('sample_db',$conn);

		// �f�[�^�x�[�X�ւ̖₢���킹SQL��
		$sql = 'SELECT user_name FROM user_tb
			WHERE login_name = "' . $user . '"
			AND login_password = "' . $pass . '"';

		// SQL���̎��s
		$query = mysql_query($sql, $conn);
	}

	// �F��
	if (mysql_num_rows($query) == 1) {
		// ���O�C������
		$login = 'OK';

		// �f�[�^�̎��o��
		$row = mysql_fetch_object($query);

		// �\���p���[�U�[�����Z�b�V�����ϐ��ɕۑ�
		$_SESSION['name'] = $row->user_name;

	} else {
		// ���O�C�����s
		$login = 'Error';
	}

	// �Z�b�V�����ϐ��ɋL�^
	$_SESSION['login'] = $login;

	// �ړ�
	if ($login == 'OK') {
		// ���O�C�������F�f�����j���[��ʂ�
		header('Location: menu_message.php');
	} else {
		// ���O�C�����s�F���O�C���t�H�[����ʂ�
		header('Location: login.html');
	}
?>