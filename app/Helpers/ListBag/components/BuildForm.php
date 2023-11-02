<?php

namespace App\Helpers\ListBag\components;

use Illuminate\View\Component;

class BuildForm extends Component
{
    public $config;
    public function __construct($listField = '')
    {
        $this->config = require(app_path('Helpers/ListBag/resources/config/' . "{$listField}.php"));
    }

    public function render()
    {
        return view('ListBag::BuildForm');
    }
}
