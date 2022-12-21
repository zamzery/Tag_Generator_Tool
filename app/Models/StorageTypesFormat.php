<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageTypesFormat extends Model
{
    use HasFactory;
    protected $fillable = ['sata','m2','storage_types_format'];
}
