$(document).ready(function(){


    // pembeli js
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

    
    $('#button-edit').click(function(){
        let nama=$('#edit-nama');
        let email=$('#edit-email');
        let no=$('#edit-no');
        let alamat=$('#edit-alamat');
        nama.removeAttr('readonly');
        email.removeAttr('readonly');
        no.removeAttr('readonly');
        alamat.removeAttr('readonly');
        $('#button-update').removeClass('disabled btn-secondary');
        $('#button-update').addClass('btn-primary');

        $(this).addClass('disabled btn-secondary');
        $(this).removeClass('btn-primary');

    });



    // produk js

    $('#table-userProduk').dataTable({
        paging: true,
        language: {
            oPaginate: {
              sNext: '<i class="fa fa-angle-right"></i>',
              sPrevious: '<i class="fa fa-angle-left"></i>',
              sFirst: '<i class="fa fa-step-backward"></i>',
              sLast: '<i class="fa fa-step-forward"></i>'
            }
        },
        ordering: true,
        columnDefs: [{ searchable: false, targets: [0,8] },
        {
          width: "3%",
          targets: [0],
        },],
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

    $('#table-userPesanan').dataTable({
        paging: false,
        language: {
            oPaginate: {
              sNext: '<i class="fa fa-angle-right"></i>',
              sPrevious: '<i class="fa fa-angle-left"></i>',
              sFirst: '<i class="fa fa-step-backward"></i>',
              sLast: '<i class="fa fa-step-forward"></i>'
            }
        },
        ordering: false,
        columnDefs: [{ searchable: false, targets: [0,8] },
        {
          width: "3%",
          targets: [0],
        },],
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


    
    
});