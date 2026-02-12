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
            'rua' => $this->request->getPost('rua'),
            'cep' => $this->request->getPost('cep'),
            'cidade' => $this->request->getPost('cidade'),
            'bairro' => $this->request->getPost('bairro'),
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
    public function menu($id)
    {
        $salaoModel = new SalaoModel();
        $salao = $salaoModel->find($id);

        if (!$salao) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Salão não encontrado");
        }

        $data = [
            'salao' => $salao
        ];

        // Chamando a view do menu do salão
        return view('saloes/menu', $data);
    }

    public function gerarUrl($id)
    {
        $salaoModel = new SalaoModel();
        $salao = $salaoModel->find($id);

        if (!$salao) {
            return redirect()->to('/saloes')->with('error', 'Salão não encontrado.');
        }

        // Criar um slug único para cliente, se ainda não existir
        if (empty($salao['slug_cliente'])) {
            $slugCliente = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $salao['nome'])) . '-' . rand(1000,9999);
            $salaoModel->update($id, ['slug_cliente' => $slugCliente]);
        } else {
            $slugCliente = $salao['slug_cliente'];
        }

        // URL do cliente
        $urlCliente = base_url("/saloes/menu/cliente/{$slugCliente}");
        // URL do dono/admin
        $urlDono = base_url("/saloes/menu/dono/{$id}");

        return view('saloes/url_gerada', [
            'salao' => $salao,
            'urlCliente' => $urlCliente,
            'urlDono' => $urlDono
        ]);
    }
        public function menuDono($id)
    {
        $salaoModel = new SalaoModel();
        $salao = $salaoModel->find($id);

        if (!$salao) {
            return redirect()->to('/saloes')->with('error', 'Salão não encontrado.');
        }

        return view('saloes/menuDono', ['salao' => $salao]);
    }

    public function menuCliente($slug)
    {
        $salaoModel = new SalaoModel();
        $salao = $salaoModel->where('slug_cliente', $slug)->first();

        if (!$salao) {
            return redirect()->to('/')->with('error', 'Salão não encontrado.');
        }

        return view('saloes/menuCliente', ['salao' => $salao]);
    }

// Teste de comentario
}