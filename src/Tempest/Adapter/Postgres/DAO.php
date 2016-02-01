<?php
	namespace Tempest\Adapter\Postgres;
	use \Tempest\Adapter\Base\DAO as BaseDAO;
	use \Tempest\Exception\FailedToEstablishConnectionException;

	class DAO implements BaseDAO {
		private $connection = null;

		public function __construct($config){
			$this->config = $config;
			$this->dsn = $params["dsn"] ?: $this->buildDSN();
		}

		// To Do: This method needs to build PDO compatible DSN strings
		private function buildDSN(){
			$database = $this->config->database ?: "";
			$host     = $this->config->host     ?: "";
			return      "postgres:host=$host;dbname=$database";
		}

		public function execute($query, $params){
			$this->conn()->exec()
		}

		public function conn() {
			$u = $this->config->username;
			$p = $this->config->password;
			if(!$this->connection){
				try {
					$this->connection = new PDO($this->dsn, $u, $p);
				} catch (PDOException $ex) {
					throw new FailedToEstablishConnectionException($this->dsn . " - Username: $u");
				}
			}
			return $this->connection;
		}
	}
?>