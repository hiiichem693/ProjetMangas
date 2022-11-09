<?php

namespace App\dao;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
use App\metier\Manga;

class ServiceManga
{
    public function getListeMangas() {
        try{
            $mesMangas = DB::table('manga')
                ->Select()
                ->join('genre', 'manga.id_genre','=','genre.id_genre')
                ->join('dessinateur', 'manga.id_dessinateur', '=', 'dessinateur.id_dessinateur')
                ->join('scenariste', 'manga.id_scenariste', '=', 'scenariste.id_scenariste')
                ->orderBy('id_manga')
                ->get();
            return $mesMangas;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function ajoutManga($code_d, $prix, $titre, $couverture, $code_ge, $id_scenariste)
    {
        try {
            DB::table('manga')->insert(
                ['id_dessinateur' => $code_d, 'prix' => $prix, 'titre' => $titre,
                    'couverture' => $couverture, 'id_genre' => $code_ge,
                    'id_scenariste' => $id_scenariste]
            );
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getManga($idManga)
    {
        try {
            $query = DB::table('manga')
                ->select()
                ->where('id_manga', '=', $idManga)
                ->first();
            return $query;
        } catch (MonException $e) {
            throw new monException($e->getMessage(), 5);
        }
    }

    public function modificationManga($code, $code_d, $prix, $titre, $couverture, $code_ge, $scenariste)
    {
        try {
            DB::table('manga')
                ->where ('id_manga', $code)
                ->update([
                    'id_dessinateur'=> $code_d,
                    'prix'=> $prix,
                    'titre'=>$titre,
                    'couverture'=> $couverture,
                    'id_genre'=>$code_ge,
                    'id_scenariste'=> $scenariste,
                ]);
        } catch (MonException $e) {
            throw new monException($e->getMessage(), 5);
        }
    }

    public function getListeMangasGenre($id_genre) {
        try{
            $mesMangas=DB::table('manga')
                ->Select()
                ->join('genre', 'manga.id_genre', '=', 'genre.id_genre')
                ->join('dessinateur','manga.id_dessinateur','=','dessinateur.id_dessinateur')
                ->join('scenariste', 'manga.id_scenariste', '=', 'scenariste.id_scenariste')
                ->where('genre.id_genre', '=', $id_genre)
                ->get();
            return $mesMangas;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
