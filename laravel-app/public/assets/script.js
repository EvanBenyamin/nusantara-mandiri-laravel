document.addEventListener('DOMContentLoaded', function() {

    $(function() {
        $('#datepicker').datepicker();
    });


    new DataTable('#example');
    $(function () {
        $('.selectpicker').selectpicker();
    });
});