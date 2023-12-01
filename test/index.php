<?php

CONST API_URL = "https://online.sbis.ru/service/?srv=1";

include_once "auth.php";
$session_id = $arrogot['result'];

$binaryData = file_get_contents('scan.pdf');
include "uuid.php";

$document_number = generete_uuid();
$attach_number = generete_uuid();

$requestData = array(
    "jsonrpc" => "2.0",
    "method" => "СБИС.ЗаписатьДокумент",
    "params" => array(

        "Документ" => array(
            "Вложение" => array(
                array(
                    "Идентификатор" => $document_number,
                    "Файл" => array(
                        "ДвоичныеДанные" => base64_encode($binaryData),
                        "Имя" => "scan.pdf"
                    ),
                ),
            ),
            "Дата" => "30.11.2023",
            "Идентификатор" => $attach_number,
            "Контрагент" => array(
                "СвЮЛ" => array(
                    "ИНН" => "5904214982",
                    "КПП" => "590401001",
                    "Название" => "ООО Зенова"
                )
            ),
            "НашаОрганизация" => array(
                "СвЮЛ" => array(
                    "ИНН" => "590505503367",
                     //"КПП" => "111101001"
                )
            ),
            "Примечание" => "Здесь обычно указывают примечание",
            "Редакция" => array(
                array(
                    "ПримечаниеИС" => "АктПриемкиТовара:1ee88d22-4ff7-4995-93dd-33363ebe9eae"
                )
            ),
            "Тип" => "ДоговорИсх",
            "Сумма" => "10000",
            "Период" => [
                "ДатаНач" => "30.11.2023",
                "ДатаКнц" => "30.12.2023",
            ]
        ),

    ),
    "id" => 0
);


//$xmlString = file_get_contents('xml-templates\\01.xml');
//$xml = new SimpleXMLElement($xmlString);
//
//$company_name = "Рога и копыта";
//
//$xml->Документ->СвСчФакт['НомерСчФ'] = "Копыта №2";
//
//
//echo "<pre>";
//echo json_encode($requestData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//echo "</pre>";
//
//
//exit();

$ch = curl_init();

curl_setopt_array($ch, array(
    CURLOPT_URL => API_URL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($requestData),
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json-rpc; charset=utf-8",
        "X-SBISSessionID: " . $session_id
    ),
));

$response = curl_exec($ch);
$err = curl_error($ch);


curl_close($ch);

if ($err) {
    echo '<pre>';
    echo "cURL Error #:";
    var_dump($err);
    echo '</pre>';
} else {
    var_dump($response);
}

?>
