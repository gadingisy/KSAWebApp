@extends('layouts.app')

@section('page_title')
Data Nasabah
@endsection

@section('css_section')

@endsection


@section('content')
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ url()->previous() }}" class="text-dark icon-arrow-left52 mr-2"></a> <span class="font-weight-semibold">Data Nasabah</span></h4>

        </div>
    </div>
</div>
<div class="card">

    <table class="table table-bordered table-striped dt-responsive"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="table" width="100%">
    <thead class="thead-indigo">
            <tr>

                <th width="5%">No</th>
                <th>Kontrak</th>
                <th>Nama</th>
                <th>Marketing</th>
                <th>Tanggal Lahir</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Gaji</th>
                <th>Kontak Nasabah</th>
                <th>Kontak Keluarga Nasabah</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>


<div class="modal fade" id="frmbox" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-indigo-800">
                <h5 class="modal-title"><i class="icon-insert-template mr-1"></i> &nbsp;Form Tambah Data Nasabah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form id="frm" class="form-validate">
                <input type="hidden" name="id" id="id">
                {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">No Kontrak</label>
                        <div class="col-lg-9">
                            <select name="inp[ksa_nasabah_kredit]" class="form-control select2" id="ksa_nasabah_kredit">

                             </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Nama Nasabah</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" disabled id="ksa_nama_nasabah" data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Marketing</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_marketing_nasabah]" id="ksa_marketing_nasabah"
                                data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tanggal Lahir</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="inp[ksa_lahir_nasabah]" id="ksa_lahir_nasabah"
                                data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">NIK</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_nik_nasabah]" id="ksa_nik_nasabah"
                                data-rule-required="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Alamat</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="inp[ksa_alamat_nasabah]" id="ksa_alamat_nasabah"
                                data-rule-required="true"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Pekerjaan</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_pekerjaan_nasabah]" id="ksa_pekerjaan_nasabah"
                                data-rule-required="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Gaji</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_gaji_nasabah]" id="ksa_gaji_nasabah"
                                data-rule-required="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Kontak Nasabah</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_kontak_nasabah]" id="ksa_kontak_nasabah"
                                data-rule-required="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Kontak Keluarga Nasabah</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_keluarga_nasabah]" id="ksa_keluarga_nasabah"
                                data-rule-required="true">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-grey-100">
                    <button type="button" class="btn btn-danger btn-labeled btn-labeled-left btn-xs pull-left"
                        data-dismiss="modal">
                        <b><i class="icon-switch"></i></b> Cancel
                    </button>
                    <button type="button" class="btn btn-success btn-labeled btn-labeled-left btn-xs" id="act-save"
                        onclick="save('insert')">
                        <b><i class="icon-floppy-disk"></i></b> Simpan
                    </button>
                    <button type="button" class="btn btn-success btn-labeled btn-labeled-left btn-xs" id="act-update"
                        onclick="save('update')">
                        <b><i class="icon-floppy-disk"></i></b> Update
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


@section('js_section')
<script src="{{asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/extensions/jquery_ui/widgets.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/extensions/jquery_ui/effects.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/extensions/mousewheel.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/extensions/jquery_ui/globalize/globalize.js')}}"></script>
<!-- Theme JS files -->
<script type="text/javascript" src="{{asset('global_assets/js/plugins/fullcalendar/core/main.min.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/fullcalendar/daygrid/main.min.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/fullcalendar/timegrid/main.min.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/fullcalendar/list/main.min.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/fullcalendar/interaction/main.min.js')}}">
</script>

<script type="text/javascript" src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
<script type="text/javascript" src="{{asset('global_assets/js/plugins/notifications/jgrowl.min.js')}}"></script>


<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

{{-- <script src="assets/js/app.js"></script> --}}
<script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/picker_date.js')}}"></script>
<script>
    var dTable;
    $(function () {
        dTable = $('#table').DataTable({
            ajax: {
                url: '{{ url("nasabah/dt") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true
                },

                {
                    data: 'ksa_kontrak_kredit',
                    name: 'ksa_kontrak_kredit',
                    orderable: true,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_nama_kredit',
                    name: 'ksa_nama_kredit',
                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_marketing_nasabah',
                    name: 'ksa_marketing_nasabah',
                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_lahir_nasabah',
                    name: 'ksa_lahir_nasabah',
                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_nik_nasabah',
                    name: 'ksa_nik_nasabah',
                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_alamat_nasabah',
                    name: 'ksa_alamat_nasabah',

                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_pekerjaan_nasabah',
                    name: 'ksa_pekerjaan_nasabah',
                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_gaji_nasabah',
                    name: 'ksa_gaji_nasabah',
                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_kontak_nasabah',
                    name: 'ksa_kontak_nasabah',
                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_keluarga_nasabah',
                    name: 'ksa_keluarga_nasabah',
                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'center'
                },

            ],
            "order": [
                ['0', 'asc']
            ]
        });

        $('.select2').select2();

        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $('.form-check-input-styled').uniform();

        $('.dataTables_filter input[type=search]').attr('placeholder', 'Pencarian');

        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });

        $('.dt-buttons').append(
            `
    <button class="btn btn-light bg-white" onclick="add()"><i class="icon-add"></i> <span class="d-none d-lg-inline-block ml-2">Tambah Data</span></button>`
            );
    });


    $.ajax({
            url: '{{ url("penjualan/getKontrak") }}',
            type: 'get',
            dataType: 'json',
            contentType: 'application/json',
            beforeSend: function() {
                $("#frm").LoadingOverlay("show");
            },
            success: function(data) {
                $("#ksa_nasabah_kredit").empty();
                $("#ksa_nasabah_kredit").append('<option>Pilih Nomor Kontrak</option>');
                    $.each(data,function(key,value){
                        $("#ksa_nasabah_kredit").append('<option value="'+key+'">'+value+'</option>');
                    });
                    $("#frm").LoadingOverlay("hide");
            }
        });

    $("#ksa_nasabah_kredit").on('change', function(){
        var textselect = document.getElementById("ksa_nasabah_kredit");
        var text = textselect.options[textselect.selectedIndex].value;
        $.ajax({
            url: '{{ url("penjualan/getKontrakID") }}',
            type: 'get',
            dataType: 'json',
            data: ({
                id: text
            }),
            contentType: 'application/json',
            beforeSend: function() {
                $("#frm").LoadingOverlay("show");
            },
            success: function(data) {
                $("#ksa_nama_nasabah").empty();
                $("#ksa_nama_nasabah").val(data.ksa_nama_kredit);
                $("#ksa_nama_nasabah").text(data.ksa_nama_kredit);

                $("#frm").LoadingOverlay("hide");
            }
        });
    })

    function add() {
        _reset();

        $('.form-check-input-styled').prop('checked', false).uniform('refresh');
        $('#act-save').show();
        $('#act-update').hide();
        $('#frmbox').modal({
            keyboard: false,
            backdrop: 'static'
        });
    }



    function save(url) {
        if ($("#frm").valid()) {
            var formData = new FormData($('#frm')[0]);

            $.ajax({
                url: '{{ url("nasabah") }}' + '/' + url,
                type: 'post',
                data: formData,
                contentType: false, //untuk upload image
                processData: false, //untuk upload image
                timeout: 300000, // sets timeout to 3 seconds
                dataType: 'json',
                success: function (e) {
                    if (e.status == 'ok;') {
                        new Noty({
                            text: 'Berhasil Menyimpan Data',
                            type: 'success'
                        }).show();

                        dTable.draw();
                        $("#frmbox").modal('hide');
                    } else {
                        alert(e.text);
                    }
                }
            });
        }
    }

    function edit(id) {
        $.ajax({
            url: '{{ url("nasabah/edit") }}',
            type: 'post',
            dataType: 'json',
            data: ({
                _token: "{{ csrf_token() }}",
                id: id
            }),
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                _reset();
                $('#act-save').hide();
                $('#act-update').show();
                $('#id').val(id);
                $.each(e, function (key, value) {
                    if ($('#' + key).hasClass("select2")) {
                        $('#' + key).val(value).trigger('change');
                    } else if ($('input[type=radio]').hasClass(key)) {
                        if (value != "") {
                            $("input[name='inp[" + key + "]'][value='" + value + "']").prop(
                                'checked', true);
                            $.uniform.update();
                        }
                    } else if ($('input[type=checkbox]').hasClass(key)) {
                        if (value != null) {
                            var temp = value.split('; ');
                            for (var i = 0; i < temp.length; i++) {
                                $("input[name='inp[" + key + "][]'][value='" + temp[i] + "']").prop(
                                    'checked', true);
                            }
                            $.uniform.update();
                        }
                    } else $('#' + key).val(value);
                });
                $('#frmbox').modal({
                    keyboard: false,
                    backdrop: 'static'
                });
            }
        });
    }

    function del(id, txt) {
        if (confirm('Data: ' + txt + '\n' + 'Apakah anda yakin akan menghapus data ini?')) {
            $.ajax({
                url: '{{ url("nasabah/delete") }}',
                type: 'delete',
                dataType: 'json',
                data: ({
                    _token: "{{ csrf_token() }}",
                    id: id
                }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (e) {
                    if (e.status == 'ok;') {
                        new Noty({
                            text: 'Berhasil Menghapus Data',
                            type: 'success'
                        }).show();

                        dTable.draw();
                    } else {
                        alert(e.text);
                    }
                }
            });
        }
    }

</script>
@endsection
