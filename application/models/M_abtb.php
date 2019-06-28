<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class M_abtb extends CI_Model
{
    public function edit_data($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function wkwk($id)
    {
        return $this->db->get_where('bis', ['kode_bis' => $id])->row_array();
    }

    public function hapuswkwk($id)
    {
        $this->db->where('kode_bis', $id);
        $this->db->delete('bis');
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }
    
    public function update_data($table,$data,$where)
    {
        $this->db->update($table,$data,$where);
    }
    
    public function delete_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($where, $table)
    {
        //Query Mencari record berdasarkan ID-nya
        $hasil = $this->db->where('kode_bis', $where)
                ->limit(1)
                ->get($table);
        if($hasil->num_rows() > 0){
            return $hasil->row();
        }else{
            return array();
        }
    }
    public function kode_otomatis()
    {
        $this->db->select('right(id_pesan,3) as kode', false);
        $this->db->order_by('id_pesan','desc');
        $this->db->limit(1);
        $query=$this->db->get('pemesanan');
        if($query->num_rows()<>0){
            $data=$query->row();
            $kode=intval($data->kode)+1;
        }else{
            $kode=1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = 'ABTB'.$kodemax;

        return $kodejadi;
    }
}