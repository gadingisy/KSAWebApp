<?php

namespace App\Http\Controllers\Nasabah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\Models\Nasabah;
use Maatwebsite\Excel\Facades\Excel;

use DataTables;
class NasabahController extends Controller
{
    public function index(){
       return view('nasabah/index');
    }

    public function dt()
    {
        $tbl = Nasabah::leftJoin('ksa_penjualan_kredit','ksa_nasabah.ksa_nasabah_kredit','ksa_penjualan_kredit.ksa_id_kredit')->get();
        return datatables($tbl)
            ->addIndexColumn()
            ->addColumn('action', function ($db) {
                return '<a href="javascript:edit(' . $db->ksa_id_nasabah . ')" title="Edit Data" class="btn btn-warning btn-sm waves-effect"><i class="icon-database"></i></a>
                <a href="javascript:del(' . $db->ksa_id_nasabah . ')" title="Delete Data" class="btn btn-sm waves-effect btn-danger"><i class="icon-trash"></i></a>';
            })
            ->editColumn('ksa_lahir_nasabah', function ($db){
                return Carbon::parse($db->ksa_lahir_nasabah)->format('d-m-Y');
            })
            ->editColumn('ksa_gaji_nasabah', function ($db){
                return  'Rp. '.number_format($db->ksa_gaji_nasabah,0,',','.');
            })



            ->rawColumns(['action'])->toJson();
    }

    public function insert(Request $request)
    {
        $inp = $request->post('inp');

        if($inp) {
            $dbs = new Nasabah();

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
            $dbs = Nasabah::find($request->id);

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
        return Nasabah::find($request->id)->toJson();
    }

    public function delete(Request $request)
    {
        $deleted = Nasabah::destroy($request->id);

        if($deleted)
            return json_encode(array('status' => 'ok;', 'text' => ''));
        else
            return json_encode(array('status' => 'error;', 'text' => 'Gagal Delete Data' ));
    }

    public function lastid()
    {

      $last = Nasabah::select('ksa_kontrak_nasabah')->orderBy('ksa_kontrak_nasabah', 'desc')->first();
      if(!empty($last)){
      $outputString = preg_replace('/[^0-9]/', '', $last);
      $increment = $outputString + 1;
      } else {
          $increment = 1;
      }


     return json_encode(array('status' => 'ok;', 'data' => 'KSA 000AS'.$increment ));

    }


}
