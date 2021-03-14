<?php

namespace App\Http\Controllers\Angsuran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\AngsuranImport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Nasabah;
use App\Models\Angsuran;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Maatwebsite\Excel\Facades\Excel;

use DataTables;
class AngsuranController extends Controller
{
    public function index(){
       return view('angsuran/index');
    }

    public function dt()
    {
        $tbl = Angsuran::leftJoin('ksa_penjualan_kredit','ksa_pembayaran_angsuran.ksa_kredit_angsuran','ksa_penjualan_kredit.ksa_id_kredit')->get();
        return datatables($tbl)
            ->addIndexColumn()
            ->addColumn('action', function ($db) {
                return '<a href="javascript:edit(' . $db->ksa_id_angsuran . ')" title="Edit Data" class="btn btn-warning btn-sm waves-effect"><i class="icon-database"></i></a>
                <a href="javascript:del(' . $db->ksa_id_angsuran . ')" title="Delete Data" class="btn btn-sm waves-effect btn-danger"><i class="icon-trash"></i></a>';
            })
            ->editColumn('ksa_biaya_angsuran', function ($db){
                return  'Rp. '.number_format($db->ksa_biaya_angsuran,0,',','.');
            })
            ->editColumn('ksa_tanggal_angsuran', function ($db){

                return Carbon::parse($db->ksa_tanggal_angsuran)->format('d-m-Y');
            })
            ->rawColumns(['action'])->toJson();
    }

    public function insert(Request $request)
    {
        $inp = $request->post('inp');

        if($inp) {
            $dbs = new Angsuran();

            foreach($inp as $key => $row){
                if(is_array($inp[$key])) {
                    $inp[$key] = implode('; ',$inp[$key]); //untuk checkbox
                }
                else {
                    $dbs->$key = $inp[$key];
                }
            }

            if($dbs->save())
                return json_encode(array('status' => 'ok;', 'text' => ''));
            else
                return json_encode(array('status' => 'error;', 'text' => 'Gagal Menyimpan Data' ));
        }
        else return json_encode(array('status' => 'error;', 'text' => 'Gagal Menyimpan Data' ));
    }

    public function update(Request $request)
    {
        try {
            $dbs = Angsuran::find($request->id);

            $inp = $request->post('inp');
            if($inp){
                foreach($inp as $key => $row){
                    if(is_array($inp[$key])) {
                        $dbs->$key = implode('; ',$inp[$key]); //untuk checkbox
                    } else {
                        $dbs->$key = $inp[$key];
                    }
                }
            }

            $dbs->save();

            return json_encode(array('status' => 'ok;', 'text' => ''));

        } catch (\Illuminate\Database\QueryException $e) {
            return json_encode(array('status' => 'error;', 'text' => 'Gagal Update Data' ));
        }
    }

    public function edit(Request $request)
    {
        return Angsuran::find($request->id)->toJson();
    }

    public function lastid()
    {

      $last = Angsuran::select('ksa_kontrak_angsuran')->orderBy('ksa_kontrak_angsuran', 'desc')->first();
      if(!empty($last)){
      $outputString = preg_replace('/[^0-9]/', '', $last);
      $increment = $outputString + 1;
      } else {
          $increment = 1;
      }


     return json_encode(array('status' => 'ok;', 'data' => 'KSA 000AS'.$increment ));

    }


    public function delete(Request $request)
    {
        $deleted = Angsuran::destroy($request->id);

        if($deleted)
            return json_encode(array('status' => 'ok;', 'text' => ''));
        else
            return json_encode(array('status' => 'error;', 'text' => 'Gagal Delete Data' ));
    }


}
