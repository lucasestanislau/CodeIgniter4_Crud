<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Pages extends Controller{

    public function index(){
        return view('teste');
    }

    public function showme($page = 'home'){

        if(!is_file(APPPATH. '/Views/pages/'.$page.'.php')){
            throw new \Exception("Some message goes here");
        }

        $data['title'] = ucfirst($page);

        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }
}