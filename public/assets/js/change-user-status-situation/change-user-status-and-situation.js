$( document ).ready(function() {
    $(function (){
        $('.toogle-class').change(function (){
            const status = $(this).prop('checked') == true ? 1 : 0;
            const allUsers_id = $(this).data('id')
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/user/change-status',
                data: {'status': status, 'allUsers_id': allUsers_id},
                success: function (data){
                    sweetAlert('Status', 'Alterado com sucesso!', 'success')
                }
            })
        })

    })

    $(function (){
        $('.toogle-Admin').change(function (){
            const status = $(this).prop('checked') == true ? 1 : 0;
            const allUsers_id = $(this).data('id')
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/user/change-status-admin',
                data: {'status': status, 'allUsers_id': allUsers_id},
                success: function (data){
                    sweetAlert('Situação', 'Alterada com sucesso!', 'success')
                }
            })
        })

    })

});
