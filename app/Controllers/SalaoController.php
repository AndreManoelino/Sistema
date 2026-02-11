<?php

namespace App\Controllers;

use App\Models\SalaoModel;
use CodeIgniter\Controller;

class SalaoController extends Controller
{
    protected $salaoModel;

    public function __construct()
    {
        $this->salaoModel = new SalaoModel();
    }

    // Listar todos os salões
    public function listar()
    {
        $data['saloes'] = $this->salaoModel->findAll();
        
        return view('saloes/index', $data);
    }

    // Mostrar formulário de cadastro
    public function novo()
    {
        return view('saloes/criar');
    }

    // Salvar novo salão
    public function salvar()
    {
        $data = [
            'nome' => $this->request->getPost('nome'),
            'slug' => strtolower(str_replace(' ', '-', $this->request->getPost('nome'))),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'rua' => $this->request->getPost('rua'),
            'bairro' => $this->request->getPost('bairro'),
            'cidade' => $this->request->getPost('cidade'),
            'cep'=> $this->request->getPost('cep'),
            'status' => 'ativo'
        ];

        $this->salaoModel->insert($data);

        return redirect()->to('/saloes');
    }

    // Mostrar formulário de edição
    public function editar($id)
    {
        $data['salao'] = $this->salaoModel->find($id);
        return view('saloes/editar', $data);
    }

    // Atualizar salão
    public function atualizar($id)
    {
        $data = [
            'nome' => $this->request->getPost('nome'),
            'slug' => strtolower(str_replace(' ', '-', $this->request->getPost('nome'))),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            
        ];

        $this->salaoModel->update($id, $data);
        return redirect()->to('/saloes');
    }

    // Deletar salão
    public function deletar($id)
    {
        $this->salaoModel->delete($id);
        return redirect()->to('/saloes');
    }
}
