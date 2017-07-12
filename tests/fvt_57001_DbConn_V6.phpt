--TEST--
pdo_ibm: Connect to database
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
	require_once('fvt.inc');
	class Test extends FVTTest
	{
		public function runTest()
		{
			print "Attempting to connect..\n";
			$this->connect();
			$this->db->setAttribute(PDO::I5_ATTR_DBC_SYS_NAMING, true);
			$this->db->setAttribute(PDO::I5_ATTR_DBC_LIBL, "XMLSERVTST QTEMP");
			$this->db->setAttribute(PDO::I5_ATTR_DBC_CURLIB, "XMLSERVTST");
			print "Connection succeeded.\n";
		}
	}

	$testcase = new Test();
	$testcase->runTest();
?>
--EXPECT--
Attempting to connect..
Connection succeeded.
