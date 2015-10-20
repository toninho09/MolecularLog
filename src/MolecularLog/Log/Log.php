<?php
namespace MolecularLog\Log;
class Log{
	private $file;
	private $format = true;
	private $showDate = true;
	private $dateFormat = 'Y-m-d H:i:s';
	private $prefix = '';
	public function _construct($file = ''){
		$this->file = $file;
	}

	public function setFile($file){
		$this->file = $file;
	}

	public function getFile($file){
		return $this->file;
	}

	public function setFormat($bool){
		$this->format = $bool;
	}

	public function isFormat(){
		return $this->format;
	}

	public function setDate($bool){
		$this->showDate = $bool;
	}

	public function isShowDate(){
		return $this->showDate;
	}

	public function setDateFormat($dateFormat){
		$this->dateFormat = $dateFormat;
	}

	public function getDateFormat(){
		return $this->dateFormat;
	}

	public function setPrefix($prefix){
		$this->prefix = $prefix;
	}

	public function getprefix(){
		return $this->prefix;
	}

	public function debug($msg){
		$this->writeLogWithConfig($msg,__FUNCTION__);
	}

	public function info($msg){
		$this->writeLogWithConfig($msg,__FUNCTION__);
	}
	
	public function notice($msg){
		$this->writeLogWithConfig($msg,__FUNCTION__);
	}
	
	public function warning($msg){
		$this->writeLogWithConfig($msg,__FUNCTION__);
	}
	
	public function error($msg){
		$this->writeLogWithConfig($msg,__FUNCTION__);
	}
	
	public function critical($msg){
		$this->writeLogWithConfig($msg,__FUNCTION__);
	}

	public function alert($msg){
		$this->writeLogWithConfig($msg,__FUNCTION__);
	}

	public function emergency($msg){
		$this->writeLogWithConfig($msg,__FUNCTION__);
	}
	private function writeLogWithConfig($msg,$type){
		$this->writeLog($msg, $this->prefix.".".strtoupper($type)." :", $this->format, $this->showDate, $this->dateFormat);
	}

	public function writeLog($msg,$type = '',$varFormat = true ,$date = true,$dateFormat = 'Y-m-d H:i:s'){
		if($varFormat) $msg = var_export($msg,true)."\n";
		$msg = $type." ".$msg;
		if($date)$msg = "[".date($dateFormat)."] ".$msg;
		file_put_contents($this->file,$msg,FILE_APPEND);
	}
}