<?php
include 'env.php';
 
$dsn = "DRIVER={SQL Server};SERVER=$host;DATABASE=$db"; 
echo $dsn;
$con = odbc_connect( $dsn, $user, $pass ); 

$sql = " 
SELECT  
    NFSE_ID NF,  
    RPS, 
    NFSE_PROT,
    XML_CANC, 
    STATUS, 
    CONVERT (DATE, DATE_NFSE) AS DATA 
    FROM SPED051
WHERE D_E_L_E_T_ = ''
AND ID_ENT = '000001'
AND STATUS <> '6' 
AND NFSE_PROT = ''
AND YEAR(DATE_NFSE)='2018'
ORDER BY DATA ";

$result=odbc_exec($con,$sql);

while(odbc_fetch_row($result)){
         for($i=1;$i<=odbc_num_fields($result);$i++){
            echo "Result is ".odbc_result($result,$i);
        }
}
?>