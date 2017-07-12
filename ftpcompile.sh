# bash ftpcompile.sh lp0364d adc
MYPWD=$(<$HOME/.ftprc)
ftp -i -n -v $1 << ftp_end
user $2 $MYPWD

quote namefmt 1

bin
cd /home/adc/PDO_IBM-1.3.3-sg2
mput *.h
mput *.c

cd /home/adc/PDO_IBM-1.3.3-sg2/i5_compile
mput *.h
mput *.c


quit

ftp_end

