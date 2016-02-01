<?php
	namespace Tempest\Adapter\Base;

	interface DAO {
		public function execute($query, $params){}
		public function conn(){}
	}
?>