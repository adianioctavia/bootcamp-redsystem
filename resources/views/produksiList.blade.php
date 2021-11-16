@extends('layouts.base')

@section('content')
<!--begin: Datatable -->
<div class="m-content">
    <div>
        <a href="{{route('produksiCreate')}}" class= "btn btn-success">TAMBAH PRODUKSI</a>
    </div>
    <div class="m-portlet akses-list">
        <div class="m-portlet__body">
            <div class="table-responsive">
                <table class="akses-list table table-bordered" id="datatable-new" data-url="{{ route('produksiDataTable') }}"
                    data-column="{{json_encode($datatable_column)}}">
                    <thead>
                        <th width="20">No</th>
                        <th class="no-sort">Kode Produksi</th>
                        <th class="no-sort">Lokasi</th>
                        <th class="no-sort">Tanggal Mulai</th>
                        <th class="no-sort">Tanggal Selesai</th>
                        <th class="no-sort">Status</th>
                        <th class="no-sort">Publish</th>
                        <th class="no-sort">Menu</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--end: Datatable -->
@endsection
