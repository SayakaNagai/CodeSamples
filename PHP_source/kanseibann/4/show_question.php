<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>�A���P�[�g</title>
</head>
<body>
���A���P�[�g����
<br>
<table border=1>
<tr bgcolor="#CCCCCC">
<td>�w����</td>
<td>���ύw���z</td>
<td>�]��</td>
<td>PHP</td>
<td>Perl</td>
<td>Java</td>
<td>C#</td>
<td>C++</td>
<td>Basic</td>
<td>�E��</td>
</tr>
<?php
	// �t�@�C����
	$filename = 'uploads/question.csv';

	// ���P�[���ݒ�
	setlocale(LC_ALL, 'ja_JP');

	// read���[�h�ŊJ��
	$handle = fopen($filename,'r');

	// CSV�f�[�^�����o��
	while($data = fgetcsv($handle,1000)) {
		// ��s���̃f�[�^�����o��
		list($pdate,$pprice,$star,$lang[0],$lang[1],$lang[2],$lang[3],$lang[4],$lang[5],$job) = $data;

		// ��s���̃f�[�^��\��
		echo '<tr>';
		echo '<td>' . $pdate .'</td>';
		echo '<td>' . $pprice .'</td>';
		echo '<td>' . $star .'</td>';

		for ($i=0; $i<6; $i++) {
			if ($lang[$i] == '') {
				echo '<td align="center">�|</td>';
			} else {
				echo '<td align="center">��</td>';
			}
		}
		
		echo '<td>' . $job .'</td>';
		echo '</tr>';
	}

	// ����
	fclose($handle);
?>
</table>
</body>
</html>