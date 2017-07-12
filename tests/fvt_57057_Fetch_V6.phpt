--TEST--
pdo_ibm: Change fetch modes.
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
	require_once('fvt.inc');
	class animalObj {
		public $id, $breed;
		public function __construct() {
		}
	}
	class Test extends FVTTest {
		public function runTest() {
			$this->connect();
			$this->db->setAttribute(PDO::I5_ATTR_DBC_SYS_NAMING, true);
			$this->db->setAttribute(PDO::I5_ATTR_DBC_LIBL, "XMLSERVTST QTEMP");
			$this->db->setAttribute(PDO::I5_ATTR_DBC_CURLIB, "XMLSERVTST");
			
			$sql = "SELECT * FROM animal";
			
			$stmt = $this->db->query($sql);
			$result = $stmt->setFetchMode(PDO::FETCH_NUM);
			$row = $stmt->fetch();
			var_dump($row);

			$stmt = $this->db->query($sql);
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$row = $stmt->fetch();
			var_dump($row);

			$stmt = $this->db->query($sql);
			$result = $stmt->setFetchMode(PDO::FETCH_BOTH);
			$row = $stmt->fetch();
			var_dump($row);

			$stmt = $this->db->query($sql);
			$result = $stmt->setFetchMode(PDO::FETCH_BOTH);
			$row = $stmt->fetch();
			var_dump($row);

			$stmt = $this->db->query($sql);
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$row = $stmt->fetch();
			var_dump($row);

			$stmt = $this->db->query($sql);
			$result = $stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
			$row = $stmt->fetch();
                        print "As row column number: " .  $row[0] . "\n" ;

			$sth = $this->db->prepare('SELECT id, breed FROM animals' ); 
			$sth->bindColumn(1, $id);
			$sth->bindColumn(2, $breed);
			$sth->execute();			
			$result = $sth->setFetchMode(PDO::FETCH_BOUND);
			while( $row = $sth->fetch() ) {
                                print "The id is: " . $id . " Breed is: " . $breed . "\n";
                                print "Result in row : " .  $row . "\n" ;
			}
		}
	}
        
	$testcase = new Test();
	$testcase->runTest();
?>
--EXPECT--
array(5) {
  [0]=>
  string(1) "1"
  [1]=>
  string(3) "cat"
  [2]=>
  string(16) "Pook            "
  [3]=>
  string(4) "3.20"
  [4]=>
  string(4) "9.56"
}
array(5) {
  ["ID"]=>
  string(1) "1"
  ["BREED"]=>
  string(3) "cat"
  ["NAME"]=>
  string(16) "Pook            "
  ["WEIGHT"]=>
  string(4) "3.20"
  ["HEIGHT"]=>
  string(4) "9.56"
}
array(10) {
  ["ID"]=>
  string(1) "1"
  [0]=>
  string(1) "1"
  ["BREED"]=>
  string(3) "cat"
  [1]=>
  string(3) "cat"
  ["NAME"]=>
  string(16) "Pook            "
  [2]=>
  string(16) "Pook            "
  ["WEIGHT"]=>
  string(4) "3.20"
  [3]=>
  string(4) "3.20"
  ["HEIGHT"]=>
  string(4) "9.56"
  [4]=>
  string(4) "9.56"
}
array(10) {
  ["ID"]=>
  string(1) "1"
  [0]=>
  string(1) "1"
  ["BREED"]=>
  string(3) "cat"
  [1]=>
  string(3) "cat"
  ["NAME"]=>
  string(16) "Pook            "
  [2]=>
  string(16) "Pook            "
  ["WEIGHT"]=>
  string(4) "3.20"
  [3]=>
  string(4) "3.20"
  ["HEIGHT"]=>
  string(4) "9.56"
  [4]=>
  string(4) "9.56"
}
array(5) {
  ["ID"]=>
  string(1) "1"
  ["BREED"]=>
  string(3) "cat"
  ["NAME"]=>
  string(16) "Pook            "
  ["WEIGHT"]=>
  string(4) "3.20"
  ["HEIGHT"]=>
  string(4) "9.56"
}
As row column number: 1
The id is: 0 Breed is: Pook                            
Result in row : 1
The id is: 1 Breed is: Peaches                         
Result in row : 1
The id is: 2 Breed is: Smarty                          
Result in row : 1
The id is: 3 Breed is: Bubbles                         
Result in row : 1
The id is: 4 Breed is: Gizmo                           
Result in row : 1
The id is: 5 Breed is: Rickety Ride                    
Result in row : 1
The id is: 6 Breed is: Sweater                         
Result in row : 1
