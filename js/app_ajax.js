$(document).ready(function() {
    var ville   = $('#ville'),
    cpostal = $('#cpostal');

    cpostal.on('change', function() {
        var val = $(this).val(); // on récupère la valeur de la région
        var jSonObj = {
            'cpostal': $(this).val()
        }
//        console.log(val)
        if(val != '') {

            $.post('../cpostal.ajax.php', jSonObj, function(data){
//                console.log(data);
                var test = data
                console.log(test)
                data = $.parseJSON(data);
                $.each(data, function(key, value){
                    console.log(value['ville_nom']);
                    var touz = $('<option id="prout"></option');
                    touz.appendTo('#ville');
                    $('#prout').text(value['ville_nom']);
                });
            });
//            console.log(ville);
        }
    });
});