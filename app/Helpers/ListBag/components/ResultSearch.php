<?php

namespace App\Helpers\ListBag\components;

use Illuminate\View\Component;

class ResultSearch extends Component
{
    public $listBag;
    public function __construct($listBag = '')
    {
        $this->listBag = $listBag;
    }

    public function render()
    {
        return view('ListBag::ResultSearch');
    }
}
