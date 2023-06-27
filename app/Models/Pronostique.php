<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronostique extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idprono';

    protected $table = 'pronostique';

    protected $fillable = ['pronostique'];

    public static function getPronos(int $idprono = null)
    {
        
        return self::query()->select('pronostique.*', 'M.*')
            ->join('matchs AS M', 'pronostique.idprono', '=', 'M.idmatch')
            ->where('idprono', $idprono)->first();
    }

    public static function getAllPronos(array $where= NULL)
    {
        if($where!==NULL){

            return self::query()->select('pronostique.*', 'M.*')
                ->join('matchs AS M', 'pronostique.idprono', '=', 'M.idmatch')
                ->where($where)->orderBy('pronostique.created_at')->get();
        }
        return self::query()->select('pronostique.*', 'M.*')
            ->join('matchs AS M', 'pronostique.idprono', '=', 'M.idmatch')
            ->orderBy('pronostique.created_at')->get();
    }

}
