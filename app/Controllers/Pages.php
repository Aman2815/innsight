<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        if(!is_file(APPPATH . 'Views/pages/'.$page.'.php')){
            throw new PageNotFoundException($page);
        }

        $data['titme'] = ucfirst($page);

        return view('template/header',$data)
        .view('pages/'.$page)
        .view('template/footer');
    }
}
