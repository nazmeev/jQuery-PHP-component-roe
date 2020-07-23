jQuery(function(){
    jQuery('.btn-remove').on('click', function(){
        if(!confirm('Realy?')) return false;
    })
})