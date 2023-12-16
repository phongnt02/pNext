<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ListBag\ListBag;

class ManageUserController extends Controller
{
    public function index (Request $request) {
        $request->flash();
        $listBag = new ListBag('user');
        $search = $request->get('user');
        $listBag->index($search);
        return view('admin.user.index',[
            'page_title' => 'User Manage',
            'breadcrumbs' => 'user.index',
            'listBag' => $listBag
        ]);
    }
}
