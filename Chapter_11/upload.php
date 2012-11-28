<?php
	if($_FILES['myfile']['error'] > 0) {      //判断文件是否可以成功上传到服务器，0表示上传成功
		echo '上传错误: ';
    		switch ($_FILES['myfile']['error']) {
     			case 1:  
				echo '上传文件大小超出了PHP配置文件中的约定值：upload_max_filesize';  
				break;
			case 2:  
				echo '上传文件大小超出了表单中的约定值：MAX_FILE_SIZE';  
				break;
			case 3:  
				echo '文件只被部分上载'; 
			       	break;
			case 4:  
				echo '没有上传任何文件'; 
			       	break;
   		}
		exit;       //如果$_FILES['myfile']['error']大于0都是有错误，输出错误信息并退出程序
	}
     	//获取上传文件的MIME类型中的主类型和子类型
	list($maintype,$subtype)=explode("/",$_FILES['myfile']['type']);	
  	if ($maintype=="text") {    //通过主类型限制不能上传文本文件，例如.txt .html .php等文件文件
		echo '问题: 不能上传文本文件。';
		exit;                //如果用户上传文本文件则退出程序
	}

	$upfile = './uploads/'.time().$_FILES['myfile']['name'];     //定义上传后的位置和新文件名
	if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {     //判断是否为上传文件
 	    	if (!move_uploaded_file($_FILES['myfile']['tmp_name'], $upfile)) {   //从移动文件
        		echo '问题: 不能将文件移动到指定目录。';
       		exit;
		}
 	}else{
		echo '问题: 上传文件不是一个合法文件: ';
		echo $_FILES['myfile']['name'];
		exit;
	}

	echo '文件'.$upfile.'上传成功,大小为'.$_FILES['myfile']['size'].'！<br>';   //如果文件上传成功则输出
?>
