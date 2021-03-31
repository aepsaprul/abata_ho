<?php

namespace App\Models;

use App\Models\MasterJabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HcLoker extends Model
{
    use HasFactory;

    public function masterJabatan() {
        return $this->belongsTo(MasterJabatan::class);
    }
}
