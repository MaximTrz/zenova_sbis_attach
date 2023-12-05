<?


$auyqrr = array("jsonrpc" => "2.0", "id"=> 0, "method" => "СБИС.Аутентифицировать", "params" => array("Параметр" => array("Логин" => "rita0607", "Пароль" =>  "11489serG")));
$textfileind = json_encode($auyqrr);

$urlrest = 'https://online.sbis.ru/auth/service/';

$ch = curl_init();

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$set_zenova_token.""));
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($ch, CURLOPT_URL, $urlrest);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 300);
curl_setopt($ch, CURLOPT_POSTFIELDS, $textfileind);

$data = curl_exec($ch);
curl_close($ch);
$arrogot = json_decode($data, true);
