<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Equipe extends Model
{
    use HasFactory;

    protected $table = 'equipe';
    protected $primaryKey = 'idequipe';
    protected $fillable = ['idequipe', 'nomequipe','idlogin'];

    
}
