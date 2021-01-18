<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_Masterlist extends Model
{
    use HasFactory;
    
    protected $table = 'files_masterlist';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'filename',
        'title',
        'description',
        'filetype',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
