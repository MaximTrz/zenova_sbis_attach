<div class="page-heading">
    <h1>ТК тест</h1>
    <div class="options"> </div>
</div>
<div class="container-fluid" data-lasttask="">

    <!-- /.row -->
    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <form id="zaprs" >

                        <div class="row mb20">

                            <div class="col-lg-4">
                                <label class="control-label" style="font-size:11px;">
                                    <strong>* Файл: </strong>
                                </label>
                                <input type="file" name="file_name">
                            </div>

                        </div>

                        <div class="row mb20">

                            <div class="col-lg-3">

                                <label class="control-label" style="font-size:11px;">
                                    <strong>* Организация: </strong>
                                </label>

                                <input class="form-control"  value="ИП Елькина" name="organization" type="text" placeholder="Организация">

                            </div>

                            <div class="col-lg-3">
                                <label class="control-label" style="font-size:11px;">
                                    <strong>* ИНН: </strong>
                                </label>
                                <input class="form-control js-int" value="590505503367" name="organization_inn" type="text" placeholder="ИНН">
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label" style="font-size:11px;">
                                    <strong>КПП: </strong>
                                </label>
                                <input class="form-control js-int" name="organization_kpp" type="text" placeholder="КПП при наличии">
                            </div>

                        </div>

                        <div class="row mb20">

                            <div class="col-lg-3">

                                <label class="control-label" style="font-size:11px;">
                                    <strong>* Контрагент: </strong>
                                </label>

                                <input class="form-control" value="ООО Зенова" name="counterparty"" type="text" placeholder="Контрагент">

                            </div>

                            <div class="col-lg-3">
                                <label class="control-label" style="font-size:11px;">
                                    <strong>* ИНН: </strong>
                                </label>
                                <input class="form-control js-int" value="5904214982" name="counterparty_inn" type="text" placeholder="ИНН">
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label" style="font-size:11px;">
                                    <strong>КПП: </strong>
                                </label>
                                <input class="form-control js-int" value="590401001" name="counterparty_kpp" type="text" placeholder="КПП при наличии">
                            </div>

                        </div>

                        <div class="row mb20">

                            <div class="col-lg-3">
                                <label class="control-label" style="font-size:11px;">
                                    <strong> Дата документа: </strong>
                                </label>
                                <input class="form-control" name="date" type="date" placeholder="Дата документа">
                            </div>

                            <div class="col-lg-3">
                                <label class="control-label" style="font-size:11px;">
                                    <strong> Cумма документа: </strong>
                                </label>
                                <input class="form-control js-int" name="sum" type="text" placeholder="Сумма документа">
                            </div>

                        </div>

                        <div class="row mb50">
                            <div class="col-lg-4">
                                <label class="control-label" style="font-size:11px;">
                                    <strong>* Тип документа: </strong>
                                </label>
                                <select name="document_type" style="width:100% !important; overflow: hidden;height: 31px;" class="js-select2">

                                    <option value="АктСверИсх">Акт сверки</option>
                                    <option value="ДоговорИсх" selected>Договор</option>
                                    <option value="ДокОтгрИсх">Расход (Реализация)</option>
                                    <option value="ЗаказИсх">Заказ</option>
                                    <option value="КоррИсх">Письмо</option>
                                    <option value="АктСверИсх">Акт сверки</option>
                                    <option value="СчетИсх">Счет</option>
                                    <option value="ConsignmentNote">Транспортная накладная</option>
                                    <option value="CorrIn">Корректировка</option>
                                    <option value="PriceMatchingIn">Согласование цен</option>
                                    <option value="PriceMatchingOut">Запрос цен</option>
                                    <option value="ReturnOut">Возврат поставщику</option>
                                    <option value="DeviationActOut">Исходящий акт о расхождениях</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb50">
                            <div class="col-lg-6">
                                <label class="control-label" style="font-size:11px;">
                                    <strong>Примечание:</strong>
                                </label>
                                <input class="form-control" name="note" type="text" placeholder="Примечание">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-success">Отправить</button>
                            </div>
                        </div>

                    </form>

                    <div id="o_content">

                    </div>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
