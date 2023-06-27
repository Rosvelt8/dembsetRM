<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idmatch';

    protected $table = 'matchs';

    protected $fillable = ['matchs'];

    public static function getMatch(int $idmatch = null)
    {
        return self::query()->where('idmatch', $idmatch)->first();
    }


    public static function getMatchs()
    {
        return self::query()->orderBy('created_at')->get();
    }
}
