<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Progres extends Model
{
    use HasFactory;

    public function deleteProgres($no_tiket)
    {
        return DB::table('progres')
            ->join('tikets', 'progres.no_tiket', 'tikets.no_tiket')
            ->where('progres.no_tiket', $no_tiket)
            ->delete();
    }
}
