<?php

function p($array){
    dump($array,1,'<pre>',0);
}

function clickNum(){
	$date = (int)date('Ymd',time());
	// 当本日数据不存在
	if(!M('hot')->find($date)){
		// 组合插入数据
		$hot = array(
			'date' => $date,
			'number' => 1 
		);
		// 插入数据
		if(!M('hot')->add($hot)){
			$this->ajaxReturn('error:fatal insert date');
		}
	}else{
		// 如果本日数据存在，则热度加一
		$where = array('date' => $date);
		if(!M('hot')->where($where)->setInc('number'))
		{
			$this->ajaxReturn('error:fatal update date');
		}
	}
}
function uploadImage() {

    // 取得时间戳
    $date = date('Ym',time());

    // 设置存储路径
    $dirname = $_SERVER['DOCUMENT_ROOT'].__ROOT__ . '/Uploads/image/'. $date;

    // 建立存储文件夹，如果不存在则建立
    if (!file_exists($dirname)){
        mkdir($dirname, 0777, true);
    }

    // 实例化上传类对象
    $upload = new \Org\Util\UploadFile();
    // 限制上传的类型
    $upload->allowExts = array('jpg', 'png', 'jpeg', 'bmp','gif'); 
    // 设置上传的路径
    $upload->savePath = $_SERVER['DOCUMENT_ROOT'].__ROOT__ . '/Uploads/image/'. $date .'/';
    // 上传图片并判断是否上传成功
    if (!$upload->upload()){
        // 上传失败打印信息
        echo $upload->getErrorMsg();
        die;
        return -1;
    }else{
        // 上传成功打印信息
        $info = $upload->getUploadFileInfo();
        // 去掉文件名的后缀
        $filename = $info[0]['name'];
        $filetype = strrchr($filename, ".");
        $filename = str_replace($filetype,"",$filename);
        $savePath = '/Uploads/image/'. $date .'/'.$info[0]['savename'];      
    }
    // 返回Uploads表对应的id
    return $savePath;
}

?>