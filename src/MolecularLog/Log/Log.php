<?php
namespace MolecularLog\Log;
class Log{
	private $file;
	public function _construct($file = ''){
		$this->file = $file;
	}

	public function setFile($file){
		$this->file = $file;
	}

	public function getFile($file){
		return $this->file;
	}

	public function writeLog($msg,$type = '',$varFormat = true ,$date = false,$dateFormat = 'Y-m-d H:i:s'){
		if($varFormat) $msg = var_export($msg,true)."\n";
		$msg = " ".$type." ".$msg;
		if($date)$msg = "[".date($dateFormat)."] ".$msg;
		file_put_contents($this->file,$msg,FILE_APPEND);
	}
}