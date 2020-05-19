<?php

namespace App\Models;
use CodeIgniter\Model;

class Cliente extends Model{
    protected $table = 'cliente';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nome', 'cpf'];

    public function getClientes($id = null){
        if($id === null){
            return $this->asArray()->findAll();
        }

        return $this->asArray()->where(['id' => $id])->first();
    }

}

