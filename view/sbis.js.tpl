<script type="text/javascript" src="assets/plugins/select2_new/js/select2.min.js"></script>

<script>
    $('.js-select2').select2({
        placeholder: 'Выберите значение'
    });

    $(document).ready(function() {
        $('.js-int').on('input', function() {
            let inputValue = $(this).val();
            let numericValue = inputValue.replace(/[^0-9]/g, ''); // Удаляем все символы, кроме цифр

            $(this).val(numericValue);
        });
    });

</script>


<script>

    $(document).ready(function(){

        $('.container-fluid').on('submit', '#zaprs', function(e){

            e.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "modul/sbis-attach/ajax/sbis.php",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(result) {
                    //console.log(result.msg);
                    $("#o_content").html(result.msg);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log('Error executing the request: ' + error);
                }
            });
        });
    });

</script>