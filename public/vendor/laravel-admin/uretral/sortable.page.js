$(document).ready(function()
{
    window.blocks = '';
   function updateOutput (e)
    {
        let list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            window.blocks = window.JSON.stringify(list.nestable('serialize'));
            $('#blocks_json').val(window.blocks);
            console.log($('#blocks_json').val());
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    $('.dd').nestable({
        maxDepth: 1
    })
        .on('change', updateOutput);

    $(document).on('change','select.blocks',function(){
        let max = 1000000;
        let min = 9000000;
        let itemNr = Math.floor(Math.random() * (max - min + 1)) + min;
        let name = $(this).find('option:selected').text();
        let url = $(this).val();
        let res = $('#block_target').attr('rel');

        window.blocks = window.JSON.stringify($('.dd').nestable('serialize'));

        $.ajax({
            type: "get",
            url: "/admin/block/"+url+"/create?parent="+res+"&nr="+itemNr,
            data: { _token:LA.token}
        }).success(function( data ) {
            $('.modal-body').html(data);
            $('.modal-title').html(name + ' блок');
            $('.grid-expand').click();
        });


        $('#blocks_json').val(window.blocks);

        console.log($('#blocks_json').val());
    });

    $(document).on('change','select.static',function(){

        let max = 1000000;
        let min = 9000000;
        let itemNr = Math.floor(Math.random() * (max - min + 1)) + min;
        let name = $(this).find('option:selected').text();
        let url = $(this).val();
        let res = $('#block_target').attr('rel');

        window.blocks = window.JSON.stringify($('.dd').nestable('serialize'));

        $.ajax({
            type: "get",
            url: "/admin/static/"+url+"/create?parent="+res+"&nr="+itemNr,
            data: { _token:LA.token}
        }).success(function( data ) {
            $('.modal-body').html(data);
            $('.modal-title').html(name + ' блок');
            $('.grid-expand').click();
        });


    });

    $(document).on('click','.block_edit',function(){
        $.ajax({
            type: "get",
            url: $(this).attr('rel'),
            data: { _token:LA.token}
        }).success(function( data ) {
            $('.modal-body').html(data);
            $('.modal-title').html($(this).attr('data-name') + ' блок');
            $('.grid-expand').click();
        });
        console.log($('#blocks_json').val());
    });

    function frameHeight(id){
        var height = $(id).contents().find('html').height();
        $(id).height(height);
    }

    $(document).on('click','.block_view',function(){
        let id = $(this).attr('data-code');
        let nest = $('#nest_'+ id);
        let frameID = 'frame_'+id;
        // $.ajax({
        //     type: "get",
        //     url: $(this).attr('rel'),
        //     data: {
        //         _token:LA.token
        //     }
        // }).success(function( data ) {
        //     $(nest).find('iframe').html(data);
        //
        // });
        let iframe = `<iframe id="`+frameID+`" name="`+id+`" style="width: 100%; height:0;" scrolling="no"  frameborder="0" vspace="0" hspace="0"  src="`+ $(this).attr('rel')+`"></iframe>`;

        $(nest).html($(iframe));

        $('#'+frameID).load(function(){
            $(this).height($(this).contents().height());
            $('#'+$(this).attr('name')).addClass('show');
            $(document).on('click','#'+$(this).attr('name'),function(){
                $(this).removeClass('show');
            });
        });
    });
    $(document).on('click','.show',function(){
        $(this).find('.dd3-view').html('');
        $(this).removeClass('show');
    });


    $(document).on('click','.block_delete',function(){

        var url = $(this).attr('rel');
        var code = $(this).attr('data-code');

        swal({
            title: "Вы уверены, что хотите удалить эту запись?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Подтвердить",
            showLoaderOnConfirm: true,
            cancelButtonText: "Отмена",
            preConfirm: function() {

                return new Promise(function(resolve) {
                    $.ajax({
                        method: 'post',
                        url: url,
                        data: {
                            _method:'delete',
                            _token:LA.token,
                        },
                        success: function (data) {

                            $.pjax({container:'#pjax-container', url: location.href });
                            resolve(data);
                            location.reload();
                        }
                    });
                });
            }
        }).then(function(result) {
            var data = result.value;
            if (typeof data === 'object') {
                if (data.status) {
                    swal(data.message, '', 'success');
                } else {
                    swal(data.message, '', 'error');
                }
            }
        });

    });

    $(document).on('click','.static_delete',function(){

        var url = $(this).attr('rel');

        swal({
            title: "Вы уверены, что хотите удалить эту запись?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Подтвердить",
            showLoaderOnConfirm: true,
            cancelButtonText: "Отмена",
            preConfirm: function() {

                return new Promise(function(resolve) {
                    $.ajax({
                        method: 'get',
                        url: url,
                        data: {
                            _token:LA.token,
                        },
                        success: function (data) {

                            $.pjax({container:'#pjax-container', url: location.href });
                            resolve(data);
                            // console.log(data);
                            location.reload();
                        }
                    });
                });
            }
        }).then(function(result) {
            var data = result.value;
            if (typeof data === 'object') {
                if (data.status) {
                    swal(data.message, '', 'success');
                } else {
                    swal(data.message, '', 'error');
                }
            }
        });

    });
});


