<?php

namespace App\Controllers;

use App\Models\BarbeiroModel;
use App\Models\ServicoModel;

class ServicoController extends BaseController
{
    public function index($salaoId)
    {
        $barbeiroModel = new BarbeiroModel();
        $servicoModel = new ServicoModel();

        $data['salao_id'] = $salaoId;
        $data['barbeiros'] = $barbeiroModel->where('salao_id', $salaoId)->findAll();
        $data['servicos'] = $servicoModel
            ->select('servicos.*, barbeiros.nome as barbeiro_nome')
            ->join('barbeiros', 'barbeiros.id = servicos.barbeiro_id')
            ->where('servicos.salao_id', $salaoId)
            ->findAll();

        return view('servicos/index', $data);
    }

    public function storeBarbeiro()
    {
        $barbeiroModel = new BarbeiroModel();

        $barbeiroModel->insert([
            'salao_id' => $this->request->getPost('salao_id'),
            'nome' => $this->request->getPost('nome')
        ]);

        return redirect()->back();
    }

    public function storeServico()
    {
        $servicoModel = new ServicoModel();

        $foto = $this->request->getFile('foto');
        $nomeFoto = null;

        if ($foto && $foto->isValid()) {
            $nomeFoto = $foto->getRandomName();
            $foto->move('uploads/servicos', $nomeFoto);
        }

        $servicoModel->insert([
            'salao_id' => $this->request->getPost('salao_id'),
            'barbeiro_id' => $this->request->getPost('barbeiro_id'),
            'nome' => $this->request->getPost('nome'),
            'valor' => $this->request->getPost('valor'),
            'tempo_execucao' => $this->request->getPost('tempo_execucao'),
            'tempo_tolerancia' => $this->request->getPost('tempo_tolerancia') ?: 15,
            'foto' => $nomeFoto
        ]);

        return redirect()->back();
    }
}
