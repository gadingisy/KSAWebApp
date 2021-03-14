$(function () {
    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        //dom: '<"datatable-header"f<"dt-buttons">l><"datatable-scroll"t><"datatable-footer"ip>',
        // dom: '<"datatable-header datatable-header-accent"lfB><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        dom:
            "<'row'<'col-sm-12 col-md-6'<'float-left mr-2'B><'float-left left-button'>l><'col-sm-12 col-md-6'<'float-right'f>>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'<'extra_btn float-left mr-2 pt-2'>i><'col-sm-12 col-md-7'p>>",
        language: {
            search: "Search : _INPUT_",
            lengthMenu: "Show _MENU_",
            paginate: {
                first: "First",
                last: "Last",
                next: "&rarr;",
                previous: "&larr;",
            },
            processing: "Loading data ...",
            sEmptyTable: "No data available in table", //Data tidak tersedia
            sInfoEmpty: "Showing 0", //Menampilkan
            sLengthMenu: "Show _MENU_ entries", //Item per halaman
            sInfoFiltered: " - from _MAX_ entries", //- dari total _MAX_ entri
            sProcessing: "Processing...",
            sZeroRecords: "No matching records found", //Tidak ditemukan data yang cocok
        },
        lengthMenu: [
            [10, 20, 30, 50, 100, 150, -1],
            [10, 20, 30, 50, 100, 150, "All"],
        ],
        bStateSave: false,
        pageLength: 10, // default records per page
        autoWidth: false, // disable fixed width and enable fluid table
        //  "processing": true, // enable/disable display message box on record load
        //"serverSide": true, // enable/disable server side ajax loading
        buttons: [
            {
                extend: "collection",
                text:
                    '<i class="fa fa-file"></i> <span class="d-none d-lg-inline-block ml-2">Export</span>',
                className: "btn btn-sm btn-success",
                buttons: [
                    {
                        text: "Excel",
                        extend: "excelHtml5",
                        footer: false,
                        exportOptions: {
                            columns: ":visible",
                        },
                    },
                    {
                        text: "CSV",
                        extend: "csvHtml5",
                        fieldSeparator: ";",
                        exportOptions: {
                            columns: ":visible",
                        },
                    },
                    {
                        text: "PDF Portrait",
                        extend: "pdfHtml5",
                        message: "",
                        exportOptions: {
                            columns: ":visible",
                        },
                    },
                    {
                        text: "PDF Landscape",
                        extend: "pdfHtml5",
                        message: "",
                        orientation: "landscape",
                        exportOptions: {
                            columns: ":visible",
                        },
                    },
                ],
            },
        ],
    });
    $.fn.dataTableExt.oPagination.iFullNumbersShowPages = 6;
    $.fn.DataTable.ext.pager.numbers_length = 6;
});
