<?php

namespace App\Models;

use CodeIgniter\Model;

class M_model extends Model
{
    public function tampil($s){
		return $this->db->table($s)
						->get()
						->getResult();
}
public function tambah($table, $isi)
	{
			return $this->db->table($table)
						->insert($isi);
	}
	public function hapus($table,$where)
    {
        return $this->db->table($table)
                        ->delete($where);

    }
    public function edit($tabel, $isi, $where){
        return $this->db->table($tabel)
                        ->update($isi,$where);
    }
    public function getWhere($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getRow();
    }

}