Build (see zzallzs5.sh):
 phpize
 ./configure --build=$CCHOST --host=$CCHOST --target=$CCHOST --with-pdo-ibm=$IBM_DB_HOME
 make
 make install

Fixed:
 - odd problem <nul> in column names

Added System Naming LIBL and CURLIB (Stephanie request):
  $db->setAttribute(PDO::I5_ATTR_DBC_SYS_NAMING, true);
  $db->setAttribute(PDO::I5_ATTR_DBC_LIBL, "XMLSERVTST QTEMP");
  $db->setAttribute(PDO::I5_ATTR_DBC_CURLIB, "XMLSERVTST");


Added (Stephanie request):
 - i5_naming - PDO::I5_ATTR_DBC_SYS_NAMING
   true  value turns on DB2 UDB CLI iSeries system naming mode. 
     Files are qualified using the slash (/) delimiter. 
     Unqualified files are resolved using the library list for the job.
   false value turns off DB2 UDB CLI default naming mode, which is SQL naming. 
     Files are qualified using the period (.) delimiter.
     Unqualified files are resolved using either the default library or the current user ID.

 - i5_commit - PDO::I5_ATTR_COMMIT (isolation mode)
   The SQL_ATTR_COMMIT attribute should be set before the SQLConnect(). 
   If the value is changed after the connection has been established, 
   and the connection is to a remote data source, the change does not take effect 
   until the next successful SQLConnect() for the connection handle
     PDO::I5_TXN_NO_COMMIT - Commitment control is not used.
     PDO::I5_TXN_READ_UNCOMMITTED - Dirty reads, nonrepeatable reads, and phantoms are possible. 
     PDO::I5_TXN_READ_COMMITTED - Dirty reads are not possible. Nonrepeatable reads, and phantoms are possible. 
     PDO::I5_TXN_REPEATABLE_READ - Dirty reads and nonrepeatable reads are not possible. Phantoms are possible. 
     PDO::I5_TXN_SERIALIZABLE - Transactions are serializable. Dirty reads, non-repeatable reads, and phantoms are not possible

 - i5_job_sort - PDO::I5_ATTR_JOB_SORT
   SQL_ATTR_JOB_SORT_SEQUENCE (conn is hidden 10046)
     true  value turns on DB2 UDB CLI job sort mode. 
     false value turns off DB2 UDB CLI job sortmode. 


