<?php
$dir = 'xmls';
$n = 0;

if ($handle = opendir($dir)) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
            $files[] = $entry;
            $n++;
            echo "File $n:  $entry<br>";
        }
    }

    closedir($handle);
}else{
    echo "Insira arquivos de NF's na pasta XMLs";
}

echo "Numero de Arquivos: $n <br>";
echo "--------------------------------------------------------- <br><br>";

foreach($files as $f){
    //echo $f."<br>";
    $xml = simplexml_load_file($dir."/".$f) or die("Error: Cannot create object");
    $nf = $xml->Nfse->InfNfse->Numero;
    $id = $xml->Nfse->InfNfse->CodigoVerificacao;

    echo "UPDATE SPED051 SET NFSE_PROT='$id' WHERE NFSE_ID = '$nf' <br>";
}

?>