<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
charset=Shift_JIS">
<title>�A���P�[�g����</title>
</head>
<body>
��������������͂��Ă��������B<br>
<form action="show_question_db.php" method="POST">
�w�����F<br>
<input type="text" name="sdate" value="<?php echo date('Y/m/d', strtotime('-1 month')); ?>">
�`<input type="text" name="edate" value="<?php echo date('Y/m/d'); ?>">
<br>
<br>
�\�[�g�F<br>
<input type="radio" name="sort" value="date" checked>�w�����Ń\�[�g����
<input type="radio" name="sort" value="star">�]���Ń\�[�g����
<br>
<br>
<input type="submit" value="�A���P�[�g��\������">
</form>
</body>
</html>