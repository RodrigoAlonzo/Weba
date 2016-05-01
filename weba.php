<?php
# Author : Rodrigo Canaza.
# Date : 28/4/2016
# Updated : 30/4/2016
# Version : 0.0.2
# Probado : Kali Linux.
# Requiere : php5-curl // Dowloading : apt-get install php5-curl
echo "
      __        _______ ____    _    
      \ \      / / ____| __ )  / \   
       \ \ /\ / /|  _| |  _ \ / _ \  
        \ V  V / | |___| |_) / ___ \ 
         \_/\_/  |_____|____/_/   \_\
        
       [*] Author : Rodrigo Canaz. \"RACP\"
       [*] Update : 30/4/2016
       [*] Version : 0.0.2

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
$lata = fgets($rata); 
$lata_1 = explode(":",$lata); 
for ( $i = 0 ; $i <=255 ; $i++ ){
echo "\n\n=====================================\n";
echo "[-] Probando IP : $lata_1[$i]\n\n ";
$tati = "http://" . "$lata_1[$i]" . "/";
$url = "$tati";
$putas = curl_init($url);
curl_setopt($putas, CURLOPT_URL , $url);
curl_setopt($putas, CURLOPT_RETURNTRANSFER,1);
curl_setopt($putas, CURLOPT_TIMEOUT,10);
curl_setopt($putas ,CURLOPT_RETURNTRANSFER,true);
$output = curl_exec($putas);
$httpcode = curl_getinfo($putas, CURLINFO_HTTP_CODE); //PIDIENDO CODIGO !
curl_close($putas);
echo '[!]' . date('h:i:s');
if (strlen($output) > 0){
preg_match("@<title>(.*)</title>@",$output,$title);
$titu = html_entity_decode($title[1]);
echo " - Title -> $titu - ";
}
echo ' HTTP code: ' . $httpcode;
switch ($httpcode){
case 0:
echo " - Not Found!";
break;
case 100:
echo " - Continue";
break;
case 101:
echo " - Switching Protocols";
break;
case 102:
echo " - Processing";
break;
case 200:
echo " - Ok";
break;
case 201:
echo " - Created";
break;
case 202:
echo " - Accepted";
break;
case 203:
echo " - Non-authoritative Information";
break;
case 204:
echo " - No Content";
break;
case 205:
echo " - Reset Content";
break;
case 206:
echo " - Partial Content";
break;
case 207:
echo " - Multi-Status";
break;
case 208:
echo " - Already Reported";
break;
case 226: 
echo " - IM used"; 
break;
case 300:
echo " - Multiple Choices";
break;
case 301:
echo " - Moved Permanently";
break;
case 302:
echo " - Found";
break;
case 303:
echo " - See Other";
break;
case 304:
echo " - Not Modified";
break;
case 305:
echo " - Use Proxy";
break;
case 307:
echo " - Temporary Redirect";
break;
case 308:
echo " - Permanent Redirect";
break;
case 400:
echo " - Bad Request";
break;
case 401:
echo " - Unauthorized";
break;
case 402:
echo " - Payment Required";
break;
case 403:
echo " - Forbidden";
break;
case 404:
echo " - Not Found";
break;
case 405:
echo " - Method Not Allowed";
break;
case 406:
echo " - Not Acceptable";
break;
case 407:
echo " - Proxy Authentication Required";
break;
case 408:
echo " - Request Timeout";
break;
case 409:
echo " - Conflict";
break;
case 410:
echo " - Gone";
break;
case 411:
echo " - Length Required";
break;
case 412:
echo " - Precondition Failed";
break;
case 413:
echo " - Payload Too Large";
break;
case 414:
echo " - Request - URI Too Long";
break;
case 415:
echo " - Unsupported Media Type";
break;
case 416:
echo " - Requested RAnge Not SAtisfiable";
break;
case 417:
echo " - Expectation Failed";
break;
case 418:
echo " - Im a Teapot";
break;
case 421:
echo " - Misdirected Request";
break;
case 422:
echo " - Unprocesssable  Enity";
break;
case 423:
echo " - Locked";
break;
case 424:
echo " - FAiled Dependency";
break;
case 426:
echo " - Upgrade Required";
break;
case 428:
echo " - Precondition Required";
break;
case 429:
echo " - Too Many Requests";
break;
case 431:
echo " - Request Header FIelds Too Large";
break;
case 444:
echo " - Connection Closed Without Response";
break;
case 451:
echo " - Unavailable FOr LEgal Reasns";
break;
case 499:
echo " - Client Closed Request";
break;
case 500:
echo " - Internal Server Error";
break;
case 501:
echo " - Not Implemented";
break;
case 502:
echo " - BAd Gateway";
break;
case 503:
echo " - Service Unavailable";
break;
case 504:
echo " - Gateway Timeout";
break;
case 505:
echo " - HTTP Version Not Supported";
break;
case 506:
echo " - Variant Also NEgotiates";
break;
case 507:
echo " - Insufficient Storage";
break;
case 508:
echo " - Loop Detect";
break;
case 510:
echo " - Not Extended";
break;
case 511:
echo " - Network Authentication Required";
break;
case 599:
echo " - NEtwork Connect Timeout Error";
break;
default:
echo " - NULL";
break;
}
}
fclose($rata);
}
} 
?>
