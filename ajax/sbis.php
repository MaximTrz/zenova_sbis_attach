<?php


session_start();
if (isset($_SESSION['user_login'])) {


    require_once('../../../Connections/connect.php');
    include "../../../controllers/settings.php";
    include "../../../controllers/function.php";

    include ("../controllers/uuid.php");
    include ("../controllers/Sbis.php");

    $service = new SBISClient();
    $service->auth("rita0607", "11489serG");

    //$binaryData = file_get_contents('modul/sbis-attach/ajax/scan.pdf');

    if(isset($_FILES['file_name']) && !empty($_FILES['file_name']['tmp_name'])) {
        $binaryData = file_get_contents($_FILES['file_name']['tmp_name']);
        $fileName = $_FILES['file_name']['name'];
    }

    $document_number = generete_uuid();
    $attach_number = generete_uuid();

    $msg = '';

    if(isset($_POST['organization']) and trim($_POST['organization']) != '') {

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
                                "Имя" => $fileName
                            ),
                        ),
                    ),

                    "Дата" => !empty($_POST['date']) && trim($_POST['date']) !== "" ? date('d.m.Y', strtotime($_POST['date'])) : date('d.m.Y'),
                    "Идентификатор" => $attach_number,
                    
                    "Контрагент" => array(
                        "СвЮЛ" => array(

                            "ИНН" =>  !empty($_POST['counterparty_inn']) && trim($_POST['counterparty_inn']) !== "" ? $_POST['counterparty_inn'] : "",

                            "КПП" =>  !empty($_POST['counterparty_kpp']) && trim($_POST['counterparty_kpp']) !== "" ? $_POST['counterparty_kpp'] : "",

                            "Название" =>  !empty($_POST['counterparty']) && trim($_POST['counterparty']) !== "" ? $_POST['counterparty'] : "",
                            
                        )
                    ),

                    "НашаОрганизация" => array(
                        "СвЮЛ" => array(
                            "ИНН" =>  trim($_POST['organization_inn']),
                            //"КПП" => trim($_POST['organization_kpp']),
                        )
                    ),

                    "Примечание" =>  trim($_POST['note']),

                    "Редакция" => array(
                        array(
                            "ПримечаниеИС" => trim($_POST['document_type'])." №".$document_number
                        )
                    ),
                    "Тип" => trim($_POST['document_type']),
                    "Сумма" => trim($_POST['sum']),
                ),

            ),
        );


        $result = json_decode($service->request("https://online.sbis.ru/service/?srv=1", $requestData), true);

    }
    if (isset($result)) {

        if(isset($result['error'])){

            $code = $result['error']['code'];
            $message = $result['error']['message'];


            $msg = '<div class="row mt50" style="margin-bottom:10px;">
                        <div class="col-lg-12">
                            <p><strong> Ошибка отправки </strong></p>
                            <p><strong>Код ошибки:</strong> ' .  $code . '</p>
                            <p><strong>Сообщение:</strong> ' . $message . '</p>
                        </div>
                    </div>';

        } else {

            $title = $result["result"]["Название"];
            $id = $result["result"]["Идентификатор"];
            $link = $result["result"]['Вложение'][0]['СсылкаВКабинет'];

            $msg = '<div class="row mt50" style="margin-bottom:10px;">
                        <div class="col-lg-12">
                            <p><strong> Документ отправлен </strong></p>
                            <p><strong>Наименование:</strong> ' . $title . '</p>
                            <p><strong>Идентификатор:</strong> ' . $id . '</p>		
                            <p><strong>Ссылка:</strong> <a href="' . $link . '" target="_blank"> Открыть документ </a></p>					
                        </div>
                    </div>';

        }

    }


    if (isset($result)) {

        echo json_encode(array(

            'msg' => $msg

        ), JSON_UNESCAPED_UNICODE);

    }

}