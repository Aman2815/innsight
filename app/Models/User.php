<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_details';
    protected $primaryKey       = 'ID';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','email','mobile','gender','state'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getRecords(){
        $builder = $this->db->table('user_details');
        $builder->select('user_details.*,state.state_name');
        $builder->join('state','state.ID = user_details.state');
        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function getSingleUser($id){
        $builder = $this->db->table('user_details');
        $builder->select('*');
        $builder->where('ID',$id);
        $result = $builder->get()->getFirstRow();
        return $result;
    }

    public function deleteRecord($id){
        $builder = $this->db->table('user_details');
        $builder->where('ID',$id);
        return $builder->delete();
    }
}
