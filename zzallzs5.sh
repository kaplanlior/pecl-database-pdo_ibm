#!/bin/bash
export IBM_DB_HOME=/usr
export PHP_HOME=/usr/local/zendsvr
export PASE_TOOLS_HOME=/QOpenSys/usr
export AIX_TOOLS_HOME=/usr/local
export PERZL_TOOLS_HOME=/opt/freeware
export PATH=$PHP_HOME/bin:$PERZL_TOOLS_HOME/bin:$PASE_TOOLS_HOME/bin:$AIX_TOOLS_HOME/bin:$PATH
export LIBPATH=$PHP_HOME/lib:$PERZL_TOOLS_HOME/lib:$PASE_TOOLS_HOME/lib:$AIX_TOOLS_HOME/lib
export CC=gcc
export CFLAGS="-DPASE -I=.:$PHP_HOME/php/include"
export CCHOST=powerpc-ibm-aix6.1.0.0
phpize
./configure --build=$CCHOST --host=$CCHOST --target=$CCHOST --with-pdo-ibm=$IBM_DB_HOME
make
make install
cp /usr/local/zendsvr/lib/php/20090626/* /usr/local/zendsvr/lib/php_extensions/.

