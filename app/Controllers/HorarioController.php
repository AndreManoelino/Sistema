<?php

namespace App\Controllers;

use App\Models\HorarioModel;
use App\Models\SalaoModel;
use App\Models\HorarioDataModel;


class HorarioController extends BaseController
{
    public function index($salao_id)
    {
        $horarioModel     = new HorarioModel();
        $horarioDataModel = new HorarioDataModel();
        $salaoModel       = new SalaoModel();

        $data['salao'] = $salaoModel->find($salao_id);

        // Regras semanais
        $data['horarios'] = $horarioModel
            ->where('salao_id', $salao_id)
            ->orderBy('dia_semana', 'ASC')
            ->findAll();

        // Datas específicas
        $data['datas'] = $horarioDataModel
            ->where('salao_id', $salao_id)
            ->orderBy('data', 'ASC')
            ->findAll();

        return view('horarios/index', $data);
    }
    public function storeData()
    {
        $horarioDataModel = new HorarioDataModel();

        $tipo = $this->request->getPost('tipo') ?? 'normal';

        $data = [
            'salao_id' => $this->request->getPost('salao_id'),
            'data'     => $this->request->getPost('data'),
            'tipo'     => $tipo,
        ];

        // Se for dia normal, salva horários
        if ($tipo === 'normal') {
            $data['hora_abertura']   = $this->request->getPost('hora_abertura') ?: null;
            $data['hora_fechamento'] = $this->request->getPost('hora_fechamento') ?: null;
        } 
        // Se for bloqueado, zera horários
        else {
            $data['hora_abertura']   = null;
            $data['hora_fechamento'] = null;
        }

        $horarioDataModel->insert($data);

        return redirect()
            ->to('/horarios/' . $data['salao_id'])
            ->with('success', 'Data cadastrada com sucesso.');
    }

    public function deleteData($id)
    {
        $horarioDataModel = new HorarioDataModel();
        $data = $horarioDataModel->find($id);

        $horarioDataModel->delete($id);

        return redirect()
            ->to('/horarios/' . $data['salao_id'])
            ->with('success', 'Data removida com sucesso.');
    }


    public function create($salao_id)
    {
        return view('horarios/create', [
            'salao_id' => $salao_id
        ]);
    }

    public function store()
    {
        $horarioModel = new HorarioModel();

        $data = [
            'salao_id'        => $this->request->getPost('salao_id'),
            'dia_semana'      => (int) $this->request->getPost('dia_semana'),
            'hora_abertura'   => $this->request->getPost('hora_abertura'),
            'hora_fechamento' => $this->request->getPost('hora_fechamento'),
        ];

        $horarioModel->insert($data);

        return redirect()
            ->to('/horarios/' . $data['salao_id'])
            ->with('success', 'Horário criado com sucesso.');
    }

    public function edit($id)
    {
        $model = new HorarioDataModel();
        $data = $model->find($id);

        if (!$data) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('horarios/edit_data', [
            'data' => $data
        ]);
    }


    public function update($id)
    {
        $horarioDataModel = new HorarioDataModel();

        $tipo = $this->request->getPost('tipo') ?? 'normal';

        $data = [
            'data' => $this->request->getPost('data'),
            'tipo' => $tipo,
        ];

        if ($tipo === 'normal') {
            $data['hora_abertura']   = $this->request->getPost('hora_abertura') ?: null;
            $data['hora_fechamento'] = $this->request->getPost('hora_fechamento') ?: null;
        } else {
            $data['hora_abertura']   = null;
            $data['hora_fechamento'] = null;
        }

        $horarioDataModel->update($id, $data);

        return redirect()
            ->to('/horarios/' . $this->request->getPost('salao_id'))
            ->with('success', 'Data atualizada com sucesso.');
    }

    public function delete($id)
    {
        $horarioModel = new HorarioModel();
        $horario = $horarioModel->find($id);

        $horarioModel->delete($id);

        return redirect()
            ->to('/horarios/' . $horario['salao_id'])
            ->with('success', 'Horário deletado com sucesso.');
    }
    public function updateData($id)
    {
        $horarioDataModel = new HorarioDataModel();

        $tipo = $this->request->getPost('tipo') ?? 'normal';

        $data = [
            'data' => $this->request->getPost('data'),
            'tipo' => $tipo,
        ];

        if ($tipo === 'normal') {
            $data['hora_abertura']   = $this->request->getPost('hora_abertura') ?: null;
            $data['hora_fechamento'] = $this->request->getPost('hora_fechamento') ?: null;
        } else {
            $data['hora_abertura']   = null;
            $data['hora_fechamento'] = null;
        }

        $horarioDataModel->update($id, $data);

        return redirect()
            ->to('/horarios/' . $this->request->getPost('salao_id'))
            ->with('success', 'Data atualizada com sucesso.');
    }

}
