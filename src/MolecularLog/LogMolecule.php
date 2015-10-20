<?php
	namespace MolecularLog;
	class LogMolecule{

		protected $class="\MolecularLog\Log\Log";
		
		protected static $instance;
		
	    public static function __callStatic($name, $arguments)
	    {
			$retorno = call_user_func_array(array(self::getInstance(),$name),$arguments);
			if(!is_null($retorno)) return $retorno;
			return self::getInstance();
		}
		
		public function __call($name, $arguments)
	    {
			$retorno = call_user_func_array(array(self::getInstance(),$name),$arguments);
			if(!is_null($retorno)) return $retorno;
			return self::getInstance();
		}
		
		public function register(\MolecularCore\Core &$app = null){
			if (!isset(self::$instance)) {
	            self::$instance = new $this->class();
	        }
		}
		
		public function run(){
		}
		
		public static function getInstance(){
			if (!isset(self::$instance)) {
	            self::$instance = new $this->class();
	        }
	        return self::$instance;
		}
	}