<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>�摜�t�@�C���A�b�v���[�h</title>
</head>
<body>
<?php
	// �t�@�C�����̎��o��
	$file_name = $_FILES['filename']['name'];
	// �t�@�C���iMIME�j�^�C�v�̎��o��
	$file_type = $_FILES['filename']['type'];
	// �ꎞ�t�@�C�����̎��o��
	$temp_name = $_FILES['filename']['tmp_name'];

	// �ۑ���̃f�B���N�g��
	$dir = 'uploads/';
	// �ۑ���̃t�@�C����
	$upload_name = $dir . $file_name;
	// �T���l�C���摜�̕ۑ���̃f�B���N�g��
	$dir_s = 'uploads/s/';
	// �T���l�C���摜�̕ۑ���̃t�@�C����
	$upload_name_s = $dir_s . $file_name;

	// JPEG�`���̃t�@�C�����A�b�v���[�h����
	if (($file_type == 'image/jpeg') || ($file_type == 'image/pjpeg')) {	
		// �A�b�v���[�h�i�ړ��j
		$result = move_uploaded_file($temp_name, $upload_name);
		
		if ($result) {
			// �A�b�v���[�h�̐���
			echo '���A�b�v���[�h����';
			
			// �A�b�v���[�h���ꂽ�摜�������o��
			$image_size = getimagesize($upload_name);
			// �A�b�v���[�h���ꂽ�摜�̕��ƍ��������o��
			$width = $image_size[0];
			$height = $image_size[1];

			// �T���l�C���摜�̕��ƍ��������߂�
			$width_s = 120;
			$height_s = round($width_s*$height/$width);
			
			// �A�b�v���[�h���ꂽ�摜�����o��
			$image = imagecreatefromjpeg($upload_name);
			// �T���l�C���̑傫���̉摜��V�K�쐬
			$image_s = imagecreatetruecolor($width_s,$height_s);

			// �A�b�v���[�h���ꂽ�摜����T���l�C���摜���쐬
			$result_s = imagecopyresampled(
					$image_s, $image,
					0,0, 0,0,
					$width_s,$height_s, $width,$height);
			
			if ($result_s) {
				// �T���l�C���摜�쐬����
				// �T���l�C���摜�̕ۑ�
				if (imagejpeg($image_s,$upload_name_s)) {
					echo ' ->�T���l�C���摜�ۑ�';
				} else {
					echo ' ->�T���l�C���摜�ۑ����s';
				}
			} else {
				// �T���l�C���摜�쐬���s
				echo ' ->�T���l�C���摜�쐬���s';
			}

			// �摜�̔j��
			imagedestroy($image);
			imagedestroy($image_s);

		} else {
			// �A�b�v���[�h�̎��s
			echo '���A�b�v���[�h���s';
		}
		
	} else {
		// JPEG�`���ȊO�̃t�@�C���̓A�b�v���[�h���Ȃ�
		echo '��JPEG�`���̉摜���A�b�v���[�h���Ă��������B';
	}
?>
<br>
<br>
�摜�t�@�C���F<?php echo $upload_name . ' (' . $width . '�~' . $height . ')'; ?>
<br>
<img src="<?php echo $upload_name; ?>">
<br>
<br>
�T���l�C���F<?php echo $upload_name_s . ' (' . $width_s . '�~' . $height_s . ')'; ?>
<br>
<img src="<?php echo $upload_name_s; ?>">
</body>
</html>