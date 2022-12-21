<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpuFamilySocketSeries extends Model
{
    use HasFactory;
    protected $fillable = ['amd','intel','cpu_family_socket_series'];
}
