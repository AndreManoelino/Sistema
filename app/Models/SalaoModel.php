<?php
namespace App\Models;

use CodeIgniter\Model;

class SalaoModel extends Model
{
    protected $table = 'saloes';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nome', 'slug', 'email', 'telefone', 'status', 'rua', 'bairro', 'cidade', 'cep'
    ];

    public function getAllActive()
    {
        return $this->where('status','ativo')->findAll();
    }

    public function getActiveById($id)
    {
        return $this->find($id);
    }

    public function getBySlug($slug)
    {
        return $this->where('slug',$slug)->first();
    }
}
