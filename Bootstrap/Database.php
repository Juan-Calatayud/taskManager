<?php
namespace TaskManager\Bootstrap;
use \PDO;
include 'Config.php';
class Database
{
	private static $instance;
	private function __construct(){}
	private function __clone(){}
	private static function connect()
	{
		$dbConfig = Config::getInstance()->get('db');
		return new PDO(
			'mysql:host='.$dbConfig['host'].
			';dbname='.$dbConfig['dbname'].
			';charset='.$dbConfig['charset'],
			$dbConfig['user'],
			$dbConfig['password']
			);
	}
	public static function getInstance(){
		if (self::$instance == null) {
			self::$instance = self::connect();
		}
		return self::$instance;
	}
}