<?php

namespace App\Helpers\ListBag;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ListBag {
    public $config;
    public $ResultSearch;
    public $columnQuery = [];
    public $SearchTransform = [];

    public function __construct($config = '')
    {
        $this->config = $this->getField($config);
    }
    
    public function getField ($config = '') {
        $fields = require(app_path('Helpers/ListBag/resources/config/' . "{$config}.php"));
        return isset( $fields['search']) ?  $fields['search'] : null;
    }

    public function index ($search, $id = null) {
        // $this->pushInSearchTransform($search);
        $this->getResultSearch($search, $id);
    }

    public function getResultSearch ($search, $id) {

        foreach ($this->config as $key => $value) {
            if (isset($value['inner'])){
                continue;
            }
            $table = $this->getTableName($key);
            if($table && !isset($value['join'])){
                $query = DB::table($table);
                $mainTable = $table;
            }

            if(isset($value['join'])) {
                $query->join($value['join']['table'], $value['join']['on'][0],$value['join']['on'][1]);
            }

            if ((isset($value['condition']) && $value['condition'] == 'LIKE')) {
                $query->where($key, 'LIKE', "%{$search}%");
            }

            if ((isset($value['condition']) && $value['condition'] == 'WHERE')) {
                $query->where($key, $id);
            }

            (isset($value['orderBy']) && $value['orderBy']) ? $query->orderBy($key) : $query;

                
            if(isset($value['show']) && $value['show']) {
                $this->columnQuery[] = (strpos($key, '.') !== false) ? $key : $mainTable . '.' . $key;
            }            
        }
        $query->select($this->columnQuery);
        $this->ResultSearch = $query->get();
        $this->SearchTransform = $search;

    }
    
    public function getTableName ($string) {
        $position = strpos($string, '_id');
        if ($position) {
            $tableName = substr($string, 0, $position);
            return Schema::hasTable($tableName) ? $tableName : null;
        }
        return null;
    }

    // public function pushInSearchTransform ($search) {
    //     $this->SearchTransform[] = $search;
    // }

}