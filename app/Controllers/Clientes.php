<?php


namespace App\Controllers;

use App\Models\Cliente;
use CodeIgniter\Controller;

class Clientes extends Controller
{

    public function index()
    {
        $model = new Cliente();

        $data = [
            'clientes' => $model->getClientes()
        ];

        echo view('templates/header');
        echo view('clientes/overview', $data);
        echo view('templates/footer');
    }


    public function view($id = null)
    {
        $model = new Cliente();
        $data['clientes'] = $model->getClientes($id);

        if (empty($data['clientes'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('page not found');
        }

        $data['nome'] = $data['clientes']['nome'];
        echo view('templates/header');
        echo view('clientes/view', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        helper('form');

        echo view('templates/header');
        echo view('clientes/form');
        echo view('templates/footer');
    }

    public function store()
    {
        helper('form');
        $cliente = new Cliente();

        $rules = [
            'nome' => 'required|min_length[3]|max_length[255]',
            'cpf' => 'required'
        ];

        if ($this->validate($rules)) {
            $cliente->save([
                'id' => $this->request->getVar('id'),
                'nome' => $this->request->getVar('nome'),
                'cpf' => $this->request->getVar('cpf')
            ]);

            echo view('templates/header');
            echo view('clientes/success');
            echo view('templates/footer');
        } else {
            echo view('templates/header');
            echo view('clientes/form');
            echo view('templates/footer');
        }
    }

    public function edit($id = null)
    {
        $model = new Cliente();

        $data['clientes'] = $model->getClientes($id);
        if (empty($data['clientes'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(' We cannot resolve thins problem');
        }

        $data = [
            'nome' => $data['clientes']['nome'],
            'id' => $data['clientes']['id'],
            'cpf' => $data['clientes']['cpf']
        ];

        echo view('templates/header');
        echo view('clientes/form', $data);
        echo view('templates/footer');
    }

    public function delete($id = null){

        $model = new Cliente();

        $model->delete($id);

        echo view('templates/header');
        echo view('clientes/success');
        echo view('templates/footer');
    }
}
