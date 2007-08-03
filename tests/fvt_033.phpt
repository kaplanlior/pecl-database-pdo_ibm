--TEST--
pdo_ibm: Check error condition when given null connection parameters
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
				$my_null = NULL;
				$new_conn = new PDO($my_null, $this->user, $this->pass);
			} catch(Exception $e) {
				echo "Connection Failed\n";
				echo $e->getMessage() . "\n\n";
			}

			try {
				$my_null = NULL;
				$new_conn = new PDO($this->dsn, $my_null, $this->pass);
			} catch(Exception $e) {
				echo "Connection Failed\n";
				echo $e->getMessage() . "\n";
			}

			try {
				$my_null = NULL;
				$new_conn = new PDO($this->dsn, $this->user, $my_null);
			} catch(Exception $e) {
				echo "Connection Failed\n";
				echo $e->getMessage();
			}
		}
	}

	$testcase = new Test();
	$testcase->runTest();
?>
--EXPECTF--
IF_DB2
Connection Failed
invalid data source name

Connection Failed
SQLSTATE=08001, SQL%sonnect: -30082 [%s][%s] SQL30082N  Security processing failed with reason "%d" ("%s").  SQLSTATE=08001

Connection Failed
SQLSTATE=08001, SQL%sonnect: -30082 [%s][%s] SQL30082N  Security processing failed with reason "%d" ("%s").  SQLSTATE=08001

ENDIF_DB2
IF_INFORMIX
Connection Failed
invalid data source name

Connection Failed
SQLSTATE=28000, SQL%sonnect: -951 [%s][%s][Informix]Incorrect password or user %s is not known on the database server.
Connection Failed
SQLSTATE=28000, SQL%sonnect: -951 [%s][%s][Informix]Incorrect password or user %s is not known on the database server.

ENDIF_INFORMIX
