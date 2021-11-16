<?php

namespace App\Http\Controllers\Produksi;

use App\Http\Controllers\Controller;
use App\Models\mLokasi;
use App\Models\mProduksi;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class Produksi extends Controller
{
    public function index()
    {
        $datatable_column = [
            ["data" => "no"],
            ["data" => "kode_produksi"],
            ["data" => "lokasi"],
            ["data" => "tanggal_mulai"],
            ["data" => "tanggal_selesai"],
            ["data" => "status"],
            ["data" => "publish"],
            ["data" => "options"],
        ];
        return view('produksiList', [
            'datatable_column' => $datatable_column,
        ]);
    }
    public function datatable(Request $request)
    {
        $total_data = mProduksi::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order_column = 'id';
        $order_type = $request->input('order.0.dir');

        $data_list = mProduksi::with(['lokasi'])
            ->offset($start)
            ->limit($limit)
            ->orderBy($order_column, $order_type)
            ->get();

        $total_data++;
        $data = [];

        foreach ($data_list as $key => $row) {
            $key++;
            if ($order_type == "desc") {
                $no = $key + $start;
            } else {
                $no = $total_data - $key - $start;
            }

            $nestedData['no'] = $no;
            $nestedData['kode_produksi'] = $row->kode_produksi;
            $nestedData['lokasi'] = $row->lokasi->lokasi;
            $nestedData['tanggal_mulai'] = $row->tgl_mulai_produksi;
            $nestedData['tanggal_selesai'] = $row->tgl_selesai_produksi;
            $nestedData['status'] = $row->status;
            $nestedData['publish'] = $row->publish;

            $data[] = $nestedData;
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($total_data - 1),
            "recordsFiltered" => intval($total_data - 1),
            "data" => $data,
            "all_request" => $request->all(),
        ];
        return $json_data;
    }

    function create()
    {
        $lokasi = mLokasi::all();

        $data = [
            'lokasi' => $lokasi
        ];


        return view('produksiCreate', $data);
    }
    function insert(Request $request)
    {
        $request->validate([
            'kode_produksi' => 'required',
            'tgl_mulai_produksi' => 'required',
            'tgl_selesai_produksi' => 'required',
            'id_lokasi' => 'required',
            'catatan' => 'required',
        ]);

        $kode_produksi = $request->input('kode_produksi');
        $tgl_mulai_produksi = date('Y-m-d', strtotime($request->input('tgl_mulai_produksi')));
        $tgl_selesai_produksi = date('Y-m-d', strtotime($request->input('tgl_selesai_produksi')));
        $id_lokasi = $request->input('id_lokasi');
        $catatan = $request->input('catatan');

        $data_insert
            = [
                'kode_produksi' => $kode_produksi,
                'tgl_mulai_produksi' => $tgl_mulai_produksi,
                'tgl_selesai_produksi' => $tgl_selesai_produksi,
                'id_lokasi' => $id_lokasi,
                'catatan' => $catatan
            ];

        mProduksi::create($data_insert);
    }

    function edit($id)
    {
        $lokasi = mLokasi::all();
        $edit = mProduksi::where('id, $id')->first();

        $data = [
            'lokasi' => $lokasi,
            'edit' => $edit
        ];

        return view('produksi.produksiEdit', $data);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'kode_produksi' => 'required',
            'tgl_mulai_produksi' => 'required',
            'tgl_selesai_produksi' => 'required',
            'id_lokasi' => 'required',
            'catatan' => 'required'
        ]);

        $kode_produksi = $request->input('kode_produksi');
        $tgl_mulai_produksi = date(Y - m - d, strtotime($request->input('tgl_mulai_produksi')));
        $tgl_selesai_produksi = date(Y - m - d, strtotime($request->input('tgl_selesai_produksi')));
        $id_lokasi = $request->input('id_lokasi');
        $catatan = $request->input('catatan');

        $data_update = [
            'kode_produksi' => $kode_produksi,
            'tgl_mulai_produksi' => $tgl_mulai_produksi,
            'tgl_selesai_produksi' => tgl_selesai_produksi,
            'id_lokasi' => $id_lokasi,
            'catatan' => $catatan
        ];

        mProduksi::where('id', $id)->update($data_update);
    }

    function delete($id)
    {
        mProduksi::where('id', $id)->delete();
    }
}
