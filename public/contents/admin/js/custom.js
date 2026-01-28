setTimeout(() => {
    const elements = document.getElementsByClassName('alert');

    if (elements.length > 0) {
        elements[0].remove();
    }
}, 3000);


$('.delete-btn').on('click', function(){
    var dataIdValue=$(this).data('id');
    $('#modal_input').val(dataIdValue);
})

$('.restore-btn').on('click', function(){
    var dataIdValue=$(this).data('id');
    $('#restore_input').val(dataIdValue);
})