<?php

namespace App\Helpers\ListBag\components;

use Illuminate\View\Component;

class ResultSearch extends Component
{
    public $listBag;
    public $dataTable = [];
    public $listId = [] ;
    public $routeNext;
    public function __construct($listBag = null, $routeNext = null)
    {
        $this->listBag = $listBag;
        $this->routeNext = $routeNext;
        $this->setDataTable();
    }
    
    public function setDataTable () {
        foreach ($this->listBag->ResultSearch as $resultItem) {
            $dataRow = [];
            $resultItem = json_decode(json_encode($resultItem), true);
            foreach ($this->listBag->config as $key => $value) {
                if(isset($value['inner'])) {
                    $dataRow[$key] = $value['inner'];
                }

                // handle push list id
                $position = strpos($key, '_id');
                if ($position && !isset($value['join'])) {
                    $this->listId[] = [
                        $this->routeNext => $resultItem[$key]
                    ];
                }
            }
            $this->dataTable[] = array_merge($dataRow, $resultItem);
        }
    }

    public function render()
    {
        return view('ListBag::ResultSearch');
    }
}
