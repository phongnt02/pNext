<?php

namespace App\Helpers\ListBag;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ListBag {
    private $config;
    public $ResultSearch;
    public $column = [];
    public $SearchTransform;

    public function __construct($config = '')
    {
        $this->config = $this->getField($config);
    }
    
    public function getField ($config = '') {
        $fields = require(app_path('Helpers/ListBag/resources/config/' . "{$config}.php"));
        return isset( $fields['search']) ?  $fields['search'] : null;
    }

    public function getResultSearch ($search = '') {
        $listField = [];
        foreach ($this->config as $key => $value) {
            $table = $this->getTableName($key);
            if($table){
                $query = DB::table($table);
            }

            (isset($value['condition']) && $value['condition']) ? $query->where($key, 'LIKE', "%{$search}%") : $query;

            (isset($value['orderBy']) && $value['orderBy']) ? $query->orderBy($key) : $query;
                
            if(isset($value['show']) && $value['show']) {
                array_push($listField, $key);
                $this->column[] = [
                    'name' => $key,
                    'label' => $value['label']
                ] ;
            }            
        }
        $query->select($listField);
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

}