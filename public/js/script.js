$(document).ready(function(){
    $('form').on('submit', function(e){
        $('button[data-submit="submit"]').attr('disabled', 'disabled');
    });
});
