<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    public function get_category_list()
    {
        $db = db_connect();
        $builder = $db->table('categorys');
        $builder->select('id, c_name');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
