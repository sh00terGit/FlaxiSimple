var page = {
    ajaxMethod: 'POST',

    save: function() {
        var formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('#formContent').val());
        formData.append('id', $('#formId').val());

        $.ajax({
            url: '/admin/pages/add',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){                
                console.log(result);
                window.location = '/admin/pages/edit/'+ result ;
            }
        });
    }
};

console.log(page);