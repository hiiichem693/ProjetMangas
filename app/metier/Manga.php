<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\MonException;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Request;

class Manga extends Model
{
    protected $table ='manga';
    protected $primarykey ='id_manga';

    public $timestamps=false;
    protected $fillable = [
        'id_manga',
        'id_dessinateur',
        'id_secenariste',
        'prix',
        'titre',
        'couverture',
        'id_genre'
    ];

    public function ajoutManga($code_d, $prix, $titre, $couverture, $code_ge, $id_scenariste) {
        try{
            DB::table('manga')->insert(
                ['id_dessinateur'=>$code_d, 'prix' => $prix,
                    'titre' => $titre, 'couverture' => $couverture, 'id_genre' => $code_ge,
                    'id_scenariste'=>$id_scenariste]
            );
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
