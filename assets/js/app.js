 
$(document).on('click', '[data-modal="frmModal"]', function () {
    $('#frmModal').remove();
    $('.modal-backdrop').remove();
    //e.preventDefault();
    var load = ' <div class="progress mb-4"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
    var $this = $(this)
            , $remote = $this.data('remote') || $this.attr('href')
            , $modal = $('<div class="modal custom-modal fade" id="frmModal" tabindex="-1" role="dialog" ><div class="modal-dialog modal-lg">' + load + '</div></div>');
    $('.app').append($modal);
    $modal.modal({backdrop: 'static', keyboard: false, show: true});
    $modal.load($remote);
});

$(document).on('click', '[data-modal="frmModalWarning"]', function (e) {
    $('#frmModalWarning').remove();
    //e.preventDefault();
    var load = ' <div class="progress mb-4"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
    var $this = $(this)
            , $remote = $this.data('remote') || $this.attr('href')
            , $modal = $('<div class="modal fade" id="frmModalWarning" tabindex="-1" role="dialog" ><div class="modal-dialog modal-lg">' + load + '</div></div>');
    $('.app').append($modal);
    $modal.modal({backdrop: 'static', keyboard: false, show: true});
    $modal.load($remote);
});

$(document).on('click', '[data-item="submodal"]', function () {
    //e.preventDefault();
    $('#frmModalWarning').remove();
});


$(document).on('click', '[data-dismiss="modal"]', function () {
    //e.preventDefault();
    $('#frmModal').remove();
    $('.modal-backdrop').remove();
    $('[data-item="buscar"]').trigger('click');
    $('body').removeClass(" modal-open");
});


$(document).on('click','[data-item-id="delete"]', function (e) {
    e.preventDefault();
    var $this = $(this), $dados = $this.data('item-token'), $url = $this.data('remote');

    var url = $url ; //'' + $url + '?Op=D&p='+ $dados + '';

   //console.log(url);
    swal({
        title: "Excluir Registro?",
        text: "Deseja realmente excluir esse registro!",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Sim!",
        cancelButtonText: "Cancelar!",
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                success: function (data){
                     console.log(data);
                    if (data.retorno == 'success') {
                        $('[data-button="Filter"]').trigger('click');
                        swal("Registro excluído!", "", "success");

                        setTimeout(() => {
                            location.reload();
                        }, 1000);

                    }else{
                        swal("Erro ao deletar", '' + data.text + '', "error");
                    }
                }
            });
        }else{
            swal("Cancelado", "Operação cancelada", "error");
        }
    });
});
