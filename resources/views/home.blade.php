@extends('layouts.app')
@section('page_title')
Dashboard
@endsection
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><span class="font-weight-semibold text-center">Dashboard</span></h4>

        </div>
    </div>
</div>
<!-- /page header -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">Selamat Datang, {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Silahkan akses menu pada menu di kiri layar
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
