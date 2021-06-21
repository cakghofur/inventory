$(document).ready(function(){
    getNotif();
    $('#showPass').click(function(){
        if($(this).is(':checked')){
            $('#oldPassword').attr('type','text');
        }else{
            $('#oldPassword').attr('type','password');

        }
    });

    $('#showPass2').click(function(){
        if($(this).is(':checked')){
            $('#confirmPassword').attr('type','text');
        }else{
            $('#confirmPassword').attr('type','password');

        }
    });

    $('#table-users').dataTable({
        paging: false,
        ordering: false,
        columnDefs: [{ searchable: false, targets: [0] }],
        responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
                var data = row.data();
                return "Details Untuk " + data[1];
            },
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: "table table-responsive",
            }),
        },
        },
    });

    $('#gambar').change(function(){
        getURL(this);
    });
    function getURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          var filename = $("#gambar").val();
          filename = filename.substring(filename.lastIndexOf('\\')+1);
          reader.onload = function(e) {
            debugger;
            $('#previewImg').attr('src', e.target.result);
            $('#previewImg').hide();
            $('#previewImg').fadeIn(500);
            $('.custom-file-label').text(filename);
          }
          reader.readAsDataURL(input.files[0]);
        }
    }

    $('#table-pembeli').dataTable({
        paging: true,
        language: {
            oPaginate: {
              sNext: '<i class="ni ni-bold-right"></i>',
              sPrevious: '<i class="ni ni-bold-left"></i>',
              sFirst: '<i class="fa fa-step-backward"></i>',
              sLast: '<i class="fa fa-step-forward"></i>'
            }
        },
        ordering: false,
        columnDefs: [{ searchable: false, targets: [0] }],
        responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
                var data = row.data();
                return "Details Untuk " + data[1];
            },
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: "table table-responsive",
            }),
        },
        },
    });

    $('#table-pesanan').dataTable({
        paging: true,
        language: {
            oPaginate: {
              sNext: '<i class="ni ni-bold-right"></i>',
              sPrevious: '<i class="ni ni-bold-left"></i>',
              sFirst: '<i class="fa fa-step-backward"></i>',
              sLast: '<i class="fa fa-step-forward"></i>'
            }
        },
        columnDefs: [{ searchable: false, targets: [0] }],
        responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
                var data = row.data();
                return "Details Untuk " + data[1];
            },
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: "table table-responsive",
            }),
        },
        },
    });

    $('#table-produk').dataTable({
        paging: true,
        language: {
            oPaginate: {
              sNext: '<i class="ni ni-bold-right"></i>',
              sPrevious: '<i class="ni ni-bold-left"></i>',
              sFirst: '<i class="fa fa-step-backward"></i>',
              sLast: '<i class="fa fa-step-forward"></i>'
            }
        },
        columnDefs: [{ searchable: false, targets: [0] }],
        responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
                var data = row.data();
                return "Details Untuk " + data[1];
            },
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: "table table-responsive",
            }),
        },
        },
    });

    $('#table-ukuran').dataTable({
        paging: false,
        ordering:false,
        columnDefs: [{ searchable: false, targets: [0] }],
        responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
                var data = row.data();
                return "Details Untuk " + data[1];
            },
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: "table table-responsive",
            }),
        },
        },
    });


    $('#btnEdit').click(function(){
        $('#nama').removeAttr('disabled');
        $('#email').removeAttr('disabled');
        $('#username').removeAttr('disabled');
        $('#gambar').removeAttr('disabled');
        $(this).removeClass('btn-primary');
        $(this).addClass('btn-secondary');
        $('#btnUpdate').removeClass('btn-secondary');
        $('#btnUpdate').addClass('btn-primary');
        $(this).addClass('disabled');
        $('#btnUpdate').removeAttr('disabled');
        $('.custom-file-label').removeClass('disabled');
    });


    function getNotif()
    {
        let notifmobile=$('#get-notification');
        let notif=$('#get-notif');
        let Url=window.location.origin;
        $.ajax({
            type:'GET',
            data:'',
            url:Url+'/getnotif/',
            success:function(obj1){
            $.each(obj1,function(key,val){
                notif.html(`<a href="`+Url+`/pesanan/`+val.id_pesanan+`" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="../assets/gambar/pembeli/`+val.gambar+`"
                                        class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">`+val.nama+`</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>`+val.tanggal_pesanan+`</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>`);
                notifmobile.html(`<a href="`+Url+`/pesanan/`+val.id_pesanan+`" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <img alt="Image placeholder" src="../assets/gambar/pembeli/`+val.gambar+`"
                                        class="avatar rounded-circle">
                                </div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">`+val.nama+`</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>`+val.tanggal_pesanan+`</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>`);
            });
                // let obj1=JSON.parse(result);
                // $('#harga').text('Rp. '+parseFloat(obj1.harga));
                // $('#subharga').val(obj1.harga);
                // $('#jumlah2').text(jumlah);
                // $('#total').text('Rp. '+parseFloat(obj1.total));
                // $('#kirim').removeAttr('disabled');
            }

        });
    }
});