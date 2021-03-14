@extends('layouts.app')

@section('page_title')
Data Penjualan Kredit
@endsection

@section('css_section')
<style type="text/css">

</style>
@endsection


@section('content')
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a href="{{ url()->previous() }}" class="text-dark icon-arrow-left52 mr-2"></a> <span class="font-weight-semibold">Data Penjualan Kredit</span></h4>

        </div>
    </div>
</div>
<div class="card">

    <table class="table table-bordered table-striped dt-responsive"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="table" width="100%">
    <thead class="thead-indigo">
            <tr>

                <th>No</th>
                <th width="15%">Kontrak</th>
                <th>Tanggal Akad</th>
                <th>Nama</th>
                <th>Kavling</th>
                <th>Blok</th>
                <th  width="25%">Harga</th>
                <th  width="25%">Uang Muka</th>
                <th>Tenor</th>
                <th  width="15%">Angsuran</th>
                <th>Keterangan</th>
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
                <h5 class="modal-title"><i class="icon-insert-template mr-1"></i> &nbsp;Form Tambah Data Penjualan Kredit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form id="frm" class="form-validate">
                <input type="hidden" name="id" id="id">
                {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Kontrak</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_kontrak_kredit]" id="ksa_kontrak_kredit"
                                data-rule-required="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tanggal</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="inp[ksa_tanggal_kredit]" id="ksa_tanggal_kredit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Nama</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_nama_kredit]" id="ksa_nama_kredit"
                                data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Kavling</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_kavling_kredit]" id="ksa_kavling_kredit"
                                data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Blok</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_blok_kredit]" id="ksa_blok_kredit"
                                data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Harga</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_harga_kredit]" id="ksa_harga_kredit"
                                data-rule-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Uang Muka</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_dp_kredit]" id="ksa_dp_kredit"
                                >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tenor</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_tenor_kredit]" id="ksa_tenor_kredit"
                                >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Angsuran</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="inp[ksa_angsuran_kredit]" id="ksa_angsuran_kredit"
                                >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Keterangan</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="inp[ksa_keterangan_kredit]" id="ksa_keterangan_kredit"
                               ></textarea>
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

{{-- <script src="assets/js/app.js"></script> --}}
<script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/picker_date.js')}}"></script>
<script>
    var dTable;
    $(document).ready( function () {
        dTable = $('#table').DataTable({

            ajax: {
                url: '{{ url("penjualan/dt") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            language: {
                'loadingRecords': '&nbsp;',
                'processing': 'Loading...'
            },
            processing: true,
            serverSide: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true
                },

                {
                    data: 'ksa_kontrak_kredit',
                    name: 'ksa_kontrak_kredit',
                    orderable: true,
                    searchable: true,
                    className: 'center'
                },
                {
                    data: 'ksa_tanggal_kredit',
                    name: 'ksa_tanggal_kredit',
                    orderable: true,
                    searchable: true,
                    className: 'center'
                },
                {
                    data: 'ksa_nama_kredit',
                    name: 'ksa_nama_kredit',
                    orderable: true,
                    searchable: true,
                    className: 'center'
                },
                {
                    data: 'ksa_kavling_kredit',
                    name: 'ksa_kavling_kredit',
                    orderable: true,
                    searchable: true,
                    className: 'center'
                },
                {
                    data: 'ksa_blok_kredit',
                    name: 'ksa_blok_kredit',
                    orderable: true,
                    searchable: true,
                    className: 'center'
                },
                {
                    data: 'ksa_harga_kredit',
                    name: 'ksa_harga_kredit',

                    orderable: false,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_dp_kredit',
                    name: 'ksa_dp_kredit',
                    orderable: true,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_tenor_kredit',
                    name: 'ksa_tenor_kredit',
                    orderable: true,
                    searchable: false,
                    className: 'center'
                },
                {
                    data: 'ksa_angsuran_kredit',
                    name: 'ksa_angsuran_kredit',
                    orderable: true,
                    searchable: true,
                    className: 'center'
                },
                {
                    data: 'ksa_keterangan_kredit',
                    name: 'ksa_keterangan_kredit',
                    orderable: true,
                    searchable: true,
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
            ],
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

        $('.dt-buttons').append(`
    <button class="btn btn-light bg-white" onclick="add()"><i class="icon-add"></i> <span class="d-none d-lg-inline-block ml-2">Tambah Data</span></button>`
            );
    });

    function add() {
        _reset();
        $.ajax({
                url: '{{ url("penjualan/lastid") }}',
                type: 'get',
                contentType: false, //untuk upload image
                processData: false, //untuk upload image
                timeout: 300000, // sets timeout to 3 seconds
                dataType: 'json',
                beforeSend: function() {
                $("#frm").LoadingOverlay("show");
             },
                success: function (e) {
                    if (e.status == 'ok;') {
                        $('#ksa_kontrak_kredit').val(e.data);
                    }
                    $("#frm").LoadingOverlay("hide");
                }
        });


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
                url: '{{ url("penjualan") }}' + '/' + url,
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
            url: '{{ url("penjualan/edit") }}',
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
                url: '{{ url("penjualan/delete") }}',
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
