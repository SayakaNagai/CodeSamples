<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>�摜�ꗗ</title>
</head>
<body>
<?php
	// �ۑ���̃f�B���N�g��
	$dir = 'uploads/';
	$dir_s = 'uploads/s/';

	// �f�B���N�g�����̃t�@�C�������o��
	$files = scandir($dir_s);

	// �t�@�C���������o��
	$count = count($files);
?>
���摜�ꗗ
<br>
<table border=0>
<?php
	// ��̈ʒu
	$col = 0;
	
	// �t�@�C���̎��o��
	for ($i = 0; $i < $count; $i++) {
		// �t�@�C���������o��
		$file = pathinfo($files[$i]);
		// �t�@�C����
		$file_name = $file['basename'];
		// �t�@�C���g���q
		$file_ext = $file['extension'];
		
		// JPEG�`���̃t�@�C����\������
		if ($file_ext == 'jpg') {
			// ��̉��Z
			$col++;
			
			// �擪�Ȃ��TR�^�O�J�n
			if ($col == 1) echo '<tr valign="top">';

			// TD�^�O�J�n
			echo '<td bgcolor="#EEEEEE">';

			// �t�@�C�����̕\��
			echo $file_name;
			echo '<br>';

			// �����N�A�摜�̕\��
			echo '<a href="' . $dir . $file_name . '" target="_blank"><img src="' . $dir_s . $file_name . '"></a>';

			// TD�^�O�I���
			echo '</td>';

			// 5��ڂȂ��TR�^�O�I���A��ʒu��0�ɖ߂�
			if ($col == 5) {
				echo '</tr>';
				$col=0;
			}
		}
	}

	// ��̎c��𖄂߂�
	if ($col>0) {
		echo '<td colspan="' . (5 - $col) . '" bgcolor="#CCCCCC"></td></tr>';
	}
?>
</table>
</body>
</html>