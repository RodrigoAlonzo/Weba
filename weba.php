<?php
# Author : Rodrigo Canaza.
# Date : 28/4/2016
# Version : 0.0.1
# Probado : Kali Linux.
# Requiere : php5-curl // Dowloading : apt-get install php5-curl
echo "
      __        _______ ____    _    
      \ \      / / ____| __ )  / \   
       \ \ /\ / /|  _| |  _ \ / _ \  
        \ V  V / | |___| |_) / ___ \ 
         \_/\_/  |_____|____/_/   \_\
        
       [*] Author : Rodrigo Canaza. \"RACP\"
       [*] Date : 28/4/2016
       [*] Version : 0.0.1 

";
system('rm LIST.txt');
system('touch LIST.txt');
if(isset($argv[1])){
echo "TARGET : " . $argv[1] . "\n";
$url = "http://" . "$argv[1]" . "/";
echo "\n";
echo "\n";
$ip_comp = gethostbyname("$argv[1]");  
$ip = explode(".",$ip_comp);
echo "[+]Starting brute force ! \n";
$num = 0;
while ($num <= 255 ) {
 $res = $num++;
$file = fopen("LIST.txt","a");
fwrite($file,"$ip[0]." . "$ip[1]." . "$ip[2]." . "$res:");
} 
fclose($file);
$rata = fopen("LIST.txt","r");
while(!feof($rata)){
$lata = fgets($rata); //recibimos
$lata_1 = explode(":",$lata); //separamos la ip
for ( $i = 0 ; $i <=255 ; $i++ ){
echo "\n\n=====================================\n";
echo "[-] Probando IP : $lata_1[$i]\n\n ";
$tati = "http://" . "$lata_1[$i]" . "/";
$url = "$tati";
$putas = curl_init($url);
curl_setopt($putas, CURLOPT_URL , $url);
curl_setopt($putas, CURLOPT_RETURNTRANSFER,1);
curl_setopt($putas, CURLOPT_TIMEOUT,10);
$output = curl_exec($putas);
$httpcode = curl_getinfo($putas, CURLINFO_HTTP_CODE); //PIDIENDO CODIGO !
curl_close($putas);
echo '[!]' . date('h:i:s');
echo ' HTTP code: ' . $httpcode;
} 
}
fclose($rata);
}
?>
