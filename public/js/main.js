$(document).ready(function() {
    if($('#createLocation').val() == 'new') {
        console.log('test show');
        $('.toHide').show();
    } else {
        console.log('test hide');
        $('.toHide').hide();
    }
    $('#createLocation').on('change',function() {
        if(this.value == 'new') {
            $('.toHide').removeClass('toHide');
            console.log('showing!');
        } else {
            $('.toHide').addClass('toHide');
            console.log('hiding');
        }
    });
});