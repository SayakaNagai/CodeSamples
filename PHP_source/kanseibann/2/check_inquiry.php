<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>���₢���킹�t�H�[��</title>
</head>
<body>
<?php
	// ���₢���킹�^�C�g���A�ڍׂ̃Z�b�g
	$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
	$message = htmlspecialchars($_POST['message'], ENT_QUOTES);
?>
�����₢���킹���e���m�F���Ă��������B
<br>
<form action="send_inquiry.php" method="POST">
<input type="hidden" name="title" value="<?php echo $title; ?>">
<input type="hidden" name="message" value="<?php echo $message; ?>">
���₢���킹�^�C�g���F
<br>
<?php echo $title; ?>
<br>
<br>
���₢���킹���e�ڍׁF
<br>
<?php
	// ���s������BR�^�O�𖄂ߍ���
	echo nl2br($message);
?>
<br>
<br>
<input type="submit" value="���₢���킹���e�̑��M">
</form>
</body>
</html>