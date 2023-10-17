<?php

namespace App\Helpers\ListBag\components;

use Illuminate\View\Component;

class BuildForm extends Component
{
    public $config;
    public $dataForm;
    public function __construct($listField = '', $data = null)
    {
        $this->config = require(app_path('Helpers/ListBag/resources/config/' . "{$listField}.php"));
        $this->dataForm = $data;
    }

    public function render()
    {
        return view('ListBag::BuildForm');
    }
}
