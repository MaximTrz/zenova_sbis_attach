<?

class SBISClient {

	private $session;

	function auth($login, $password){

        $url = 'https://online.sbis.ru/auth/service/';

        $auyqrr = array("jsonrpc" => "2.0", "id"=> 0, "method" => "СБИС.Аутентифицировать", "params" => array("Параметр" => array("Логин" => $login, "Пароль" =>  $password)));
        $textfileind = json_encode($auyqrr);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$set_zenova_token.""));
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $textfileind);

        $data = curl_exec($ch);
        curl_close($ch);

        $arrogot = json_decode($data, true);

        $this->session = $arrogot['result'];

        return $this->session;

	}

	function request($op, $params = [])
    {

        $ch = curl_init();

        curl_setopt_array($ch, array(

            CURLOPT_URL => $op,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json-rpc; charset=utf-8",
                "X-SBISSessionID: " . $this->session
            ),
        ));

        $response = curl_exec($ch);
        $err = curl_error($ch);

        curl_close($ch);

        if ($err) {
            $this->result = $err;

        } else {
            $this->result = $response;
        }

        return $this->result;

    }

}