<?php

namespace App\Imports;

Use App\Models\Angsuran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class AngsuranImport implements ToModel,WithHeadingRow,WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

                return new Angsuran([
            'ksa_kontrak_angsuran'     => $row['ksa_kontrak_angsuran'],
            'ksa_tanggal_angsuran'    => $row['ksa_tanggal_angsuran'],
            'ksa_nama_angsuran' => $row['ksa_nama_angsuran'],
            'ksa_biaya_angsuran' => $row['ksa_biaya_angsuran'],
            'ksa_keterangan_angsuran' => $row['ksa_keterangan_angsuran'],
            'ksa_cara_angsuran' => $row['ksa_cara_angsuran']
        ]);
    }
}
