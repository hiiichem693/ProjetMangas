<?php


namespace App\dao;
use App\Exceptions\MonException;
use DB;

class ServiceScenariste
{

    public function getIScenariste() {

        try {
            return $this->getKey();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getListeScenaristes() {
        try {
            $query = DB::table('scenariste')->get();
            return $query;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }

    public function getScenariste ($id) {
        try {
            $query = DB::table('scenariste')
                ->select()
                ->where('id_scenariste', '=', $id)
                ->first();
            return $query;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }
}
