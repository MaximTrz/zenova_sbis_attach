<?php

$modulname = 'СБИС Вложение'; ///название модуля

if(isset($_GET['inc']) and $_GET['inc'] == 'index') {


    $page_title = 'СБИС Вложение - ' . $set_systemname;

    $page_css = 'modul/sbis-attach/view/ltl.css.tpl';
    $page = 'modul/sbis-attach/view/sbis.tpl';
    $page_java = 'modul/sbis-attach/view/sbis.js.tpl';
    $page_name = 'Отправка неформализованного документа'; ///для доступа

} else {

    include "view/dostup_disabled.tpl";
    exit();

}