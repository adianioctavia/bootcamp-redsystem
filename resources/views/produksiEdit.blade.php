@extends('layouts.base')

@section('content')
<div class="m-content">

    <div class="m-portlet akses-list">
        <form method="post" action="{{route('produksiUpdate', ['id'=> $edit->id])}}" class="form-send m-form m-form--fit m-form--label-align-right" data-redirect="{{ router('produksi>List')}}">

        {{csrf_field()}}
            
        <div class="m-portlet__body">
            <div class="form-group m-form__group">
                <label>
                    Kode Produksi
                </label>
                <input type="text" name="kode_produksi" value="{{$edit->kode_produksi}}" class="form-control m-input">
            </div>
            <div class="form-group m-form__group">
                <label>
                    Mulai Produksi
                </label>
                <input type="date" name="tgl_mulai_produksi" value="{{ $edit->tgl_mulai_produksi}}" class="form-control m-input">
            </div>
            <div class="form-group m-form__group">
                <label>
                    Selesai Produksi
                </label>
                <input type="date" name="tgl_selesai_produksi" value="{{ $edit->tgl_selesai_produksi}}" class="form-control m-input">
            </div>
            <div class="form-group m-form__group">
                <label>
                    Pabrik
                </label>
                <select name="id_lokasi" class="form-control m-input">
                    @foreach($lokasi as $row)
                    <option value="{{ $row->id}}"{{ $row->id== $edit->id_lokasi ? 'selected':''}}>{{ $row->kode_lokasi.' - '.$row->lokasi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group m-form__group">
                <label>
                    Catatan
                </label>
                <textarea name="catatan" class="form-control m-input"> {{$edit->catatan}}</textarea>
            </div>
        </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form_actions">
                    <button type="submit" class="btn btn-primary">
                        Perbarui Produk
                    </button>
                    <a href="{{ route('produksiList')}}" class="btn btn-secondary">
                    Kembali ke Daftar
                    </a>
                </div>
            </div>
        </form>
      </div>
    </div>
</div> 
@endsection