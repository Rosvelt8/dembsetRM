<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choix extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idchoix';

    protected $table = 'choix';

    protected $fillable = ['choix'];

    public static function getChoix(int $idchoix = null)
    {
        return self::query()->select('choix.*', 'Pr.*', 'M.*')
            ->join('pronostique AS Pr', 'choix.idprono', '=', 'Pr.idprono')
            ->join('matchs AS M', 'Pr.idmatch', '=', 'M.idmatch')
            ->where('idchoix', $idchoix)->first();
    }

    public static function getAllChoix(array $where)
    {
        if($where !== NULL){
            return self::query()->select('choix.*', 'Pr.*', 'M.*')
                ->join('pronostique AS Pr', 'choix.idprono', '=', 'Pr.idprono')
                ->join('matchs AS M', 'Pr.idmatch', '=', 'M.idmatch')
                ->orderBy('choix.created_at')->where($where)->get();

        }
        return self::query()->select('Ch.*', 'Pr.*', 'M.*')
            ->join('pronostique AS Pr', 'choix.idprono', '=', 'Pr.idprono')
            ->join('match AS M', 'Pr.idmatch', '=', 'M.idmatch')
            ->orderBy('created_at')->get();
    }
    public static function getAllChoixEnAttente(array $where)
    {
        if($where !== NULL){
            return self::query()->select('choix.*', 'Pr.*', 'M.*')
                ->join('pronostique AS Pr', 'choix.idprono', '=', 'Pr.idprono')
                ->join('matchs AS M', 'Pr.idmatch', '=', 'M.idmatch')
                ->where('choix.statut', 'A')
                ->orderBy('choix.created_at')->where($where)->get();

        }
        return self::query()->select('Ch.*', 'Pr.*', 'M.*')
            ->join('pronostique AS Pr', 'choix.idprono', '=', 'Pr.idprono')
            ->join('match AS M', 'Pr.idmatch', '=', 'M.idmatch')
            ->where('choix.statut', 'A')
            ->orderBy('created_at')->get();
    }

}
