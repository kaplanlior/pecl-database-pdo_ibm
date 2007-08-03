--TEST--
pdo_ibm: Check error condition when inserting into non-existent table
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
	require_once('fvt.inc');
	class Test extends FVTTest
	{
		public function runTest()
		{
			try {
				$this->connect();
				$myarr = array(array (10, "Java", 12, "Bean", 914.05));
				$sql = "INSERT INTO doesnotexist VALUES(?, ?, ?, ?, ?, ?)";
				$stmt = $this->db->prepare($sql);

				foreach ($myarr as $data) {
					if ($stmt->execute($data)) {
						echo "True\n";
					} else {
						echo "False\n";
					}
				}
				$stmt = null;
			} catch(exception $e) {
				print $e->getMessage();
			}

		}
	}

	$testcase = new Test();
	$testcase->runTest();
?>
--EXPECTF--
IF_DB2
SQLSTATE[07001]:%s-99999 [%s][%s] CLI0100E  Wrong number of parameters. SQLSTATE=07001 (SQLExecute[-99999] at %s)
ENDIF_DB2
IF_INFORMIX
SQLSTATE[42S02]: Base table or view not found: -206 [%s][%s][%s]The specified table (doesnotexist) is not in the database. (SQLPrepare[-206] at %s)
ENDIF_INFORMIX
