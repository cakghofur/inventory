$(document).ready(function () {
    $("#showPass").click(function () {
        if ($(this).is(":checked")) {
            $("#oldPassword").attr("type", "text");
        } else {
            $("#oldPassword").attr("type", "password");
        }
    });

    $("#showPass2").click(function () {
        if ($(this).is(":checked")) {
            $("#confirmPassword").attr("type", "text");
        } else {
            $("#confirmPassword").attr("type", "password");
        }
    });

    $("#stockOut").dataTable({
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

    $("#gambar").change(function () {
        getURL(this);
    });
    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#gambar").val();
            filename = filename.substring(filename.lastIndexOf("\\") + 1);
            reader.onload = function (e) {
                debugger;
                $("#previewImg").attr("src", e.target.result);
                $("#previewImg").hide();
                $("#previewImg").fadeIn(500);
                $(".custom-file-label").text(filename);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#stockIn").dataTable({
        paging: true,
        language: {
            oPaginate: {
                sNext: '<i class="ni ni-bold-right"></i>',
                sPrevious: '<i class="ni ni-bold-left"></i>',
                sFirst: '<i class="fa fa-step-backward"></i>',
                sLast: '<i class="fa fa-step-forward"></i>',
            },
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

    $("#stock-keluar").dataTable({
        paging: true,
        language: {
            oPaginate: {
                sNext: '<i class="ni ni-bold-right"></i>',
                sPrevious: '<i class="ni ni-bold-left"></i>',
                sFirst: '<i class="fa fa-step-backward"></i>',
                sLast: '<i class="fa fa-step-forward"></i>',
            },
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

    $("#table-user").dataTable({
        paging: true,
        language: {
            oPaginate: {
                sNext: '<i class="ni ni-bold-right"></i>',
                sPrevious: '<i class="ni ni-bold-left"></i>',
                sFirst: '<i class="fa fa-step-backward"></i>',
                sLast: '<i class="fa fa-step-forward"></i>',
            },
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

    $("#btnEdit").click(function () {
        $("#nama").removeAttr("disabled");
        $("#email").removeAttr("disabled");
        $("#username").removeAttr("disabled");
        $("#gambar").removeAttr("disabled");
        $(this).removeClass("btn-primary");
        $(this).addClass("btn-secondary");
        $("#btnUpdate").removeClass("btn-secondary");
        $("#btnUpdate").addClass("btn-primary");
        $(this).addClass("disabled");
        $("#btnUpdate").removeAttr("disabled");
        $(".custom-file-label").removeClass("disabled");
    });
});
