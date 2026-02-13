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

        $foto = $this->request->getFile('foto');
        $nomeFoto = null;

        if ($foto && $foto->isValid()) {
            $nomeFoto = $foto->getRandomName();
            $foto->move('uploads/barbeiros', $nomeFoto);
        }

        $barbeiroModel->insert([
            'salao_id' => $this->request->getPost('salao_id'),
            'nome'     => $this->request->getPost('nome'),
            'foto'     => $nomeFoto
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
    public function updateBarbeiro($id)
    {
        $barbeiroModel = new BarbeiroModel();
        $barbeiro = $barbeiroModel->find($id);

        $foto = $this->request->getFile('foto');
        $nomeFoto = $barbeiro['foto'];

        if ($foto && $foto->isValid()) {

            // apagar foto antiga
            if ($barbeiro['foto'] && file_exists('uploads/barbeiros/' . $barbeiro['foto'])) {
                unlink('uploads/barbeiros/' . $barbeiro['foto']);
            }

            $nomeFoto = $foto->getRandomName();
            $foto->move('uploads/barbeiros', $nomeFoto);
        }

        $barbeiroModel->update($id, [
            'nome' => $this->request->getPost('nome'),
            'foto' => $nomeFoto
        ]);

        return redirect()->to(base_url('servicos/' . $barbeiro['salao_id']));
    }
    public function deleteBarbeiro($id)
    {
        $barbeiroModel = new BarbeiroModel();
        $barbeiro = $barbeiroModel->find($id);

        if ($barbeiro['foto'] && file_exists('uploads/barbeiros/' . $barbeiro['foto'])) {
            unlink('uploads/barbeiros/' . $barbeiro['foto']);
        }

        $barbeiroModel->delete($id);

        return redirect()->back();
    }
    public function updateServico($id)
    {
        $servicoModel = new ServicoModel();
        $servico = $servicoModel->find($id);

        $foto = $this->request->getFile('foto');
        $nomeFoto = $servico['foto'];

        if ($foto && $foto->isValid()) {

            if ($servico['foto'] && file_exists('uploads/servicos/' . $servico['foto'])) {
                unlink('uploads/servicos/' . $servico['foto']);
            }

            $nomeFoto = $foto->getRandomName();
            $foto->move('uploads/servicos', $nomeFoto);
        }

        $servicoModel->update($id, [
            'barbeiro_id'      => $this->request->getPost('barbeiro_id'),
            'nome'             => $this->request->getPost('nome'),
            'valor'            => $this->request->getPost('valor'),
            'tempo_execucao'   => $this->request->getPost('tempo_execucao'),
            'tempo_tolerancia' => $this->request->getPost('tempo_tolerancia'),
            'foto'             => $nomeFoto
        ]);

        return redirect()->to(base_url('servicos/' . $servico['salao_id']));
    }
    public function deleteServico($id)
    {
        $servicoModel = new ServicoModel();
        $servico = $servicoModel->find($id);

        if ($servico['foto'] && file_exists('uploads/servicos/' . $servico['foto'])) {
            unlink('uploads/servicos/' . $servico['foto']);
        }

        $servicoModel->delete($id);

        return redirect()->back();
    }
    public function editBarbeiro($id)
    {
        $barbeiroModel = new BarbeiroModel();
        $data['barbeiro'] = $barbeiroModel->find($id);

        return view('servicos/edit_barbeiro', $data);
    }
    public function editServico($id)
    {
        $servicoModel = new ServicoModel();
        $barbeiroModel = new BarbeiroModel();

        $servico = $servicoModel->find($id);

        if (!$servico) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'servico'   => $servico,
            'barbeiros' => $barbeiroModel
                ->where('salao_id', $servico['salao_id'])
                ->findAll()
        ];
        //dd($data);
        return view('servicos/edit_servico', $data);
    }

}
