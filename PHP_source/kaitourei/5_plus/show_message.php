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

		// �f�[�^�x�[�X����̎��o��SQL�� �@
		$sql = 'SELECT message_id,message_title,message,user_name,entry_date
			FROM message_tb
			ORDER BY message_id';

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
<?php
	// ���ʃ��j���[
	require_once 'header_message.php';
?>
�����b�Z�[�W�ꗗ<br>
<table border=1>
<tr bgcolor="#CCCCCC">
<td>ID</td>
<td>�^�C�g��</td>
<td>���b�Z�[�W</td>
<td>���[�U�[</td>
<td>�o�^��</td>
</tr>
<?php
	// �f�[�^�̎��o��
	while($row=mysql_fetch_object($query)) {
		echo '<tr>';
		echo '<td>' . $row->message_id .'</td>';
		echo '<td>' . $row->message_title .'</td>';
		echo '<td>' . nl2br($row->message) .'</td>';
		echo '<td>' . $row->user_name .'</td>';
		echo '<td>' . $row->entry_date .'</td>';
		echo '</tr>';
	}
?>
</table>
</body>
</html>

