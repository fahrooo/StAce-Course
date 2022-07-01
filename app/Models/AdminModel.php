<?php

namespace App\Models;

use CodeIgniter\Model;


class AdminModel extends Model
{
    //Count
    public function countDataTeacher()
    {
        return $this->db->table('data_pengajar')->countAll();
    }

    public function countDataStudent()
    {
        return $this->db->table('data_siswa')->countAll();
    }

    public function countDataSubject()
    {
        return $this->db->table('data_mapel')->countAll();
    }

    public function countDataTransaction()
    {
        return $this->db->table('data_transaksi')->countAll();
    }
    //End

    //Mata Pelajaran
    public function getMapel()
    {
        return
            $this->db->table('data_mapel')
            ->get()->getResultArray();
    }

    public function insertMapel($data)
    {
        return $this->db->table('data_mapel')->insert($data);
    }

    public function getEditMapel($kode_mapel)
    {
        return
            $this->db->table('data_mapel')
            ->where(['kode_mapel' => $kode_mapel])
            ->get()->getRowArray();
    }

    public function updateMapel($data, $kode_mapel)
    {
        return $this->db->table('data_mapel')->update($data, ['kode_mapel' => $kode_mapel]);
    }

    public function deleteMapel($kode_mapel)
    {
        return $this->db->table('data_mapel')->delete(['kode_mapel' => $kode_mapel]);
    }

    public function nextKodeMapel()
    {
        $builder = $this->db->table('data_mapel');
        $builder->selectMax('kode_mapel');
        $query = $builder->get()->getRowArray();
        return $query;
    }
    //End

    //Pengajar
    public function getPengajar()
    {
        return
            $this->db->table('data_pengajar')
            ->JOIN('data_mapel', 'data_pengajar.kode_mapel=data_mapel.kode_mapel')
            ->get()->getResultArray();
    }

    public function nextIdPengajar()
    {
        $builder = $this->db->table('data_pengajar');
        $builder->selectMax('id_pengajar');
        $query = $builder->get()->getRowArray();
        return $query;
    }

    public function insertPengajar($data)
    {
        return $this->db->table('data_pengajar')->insert($data);
    }

    public function getEditPengajar($id_pengajar)
    {
        return
            $this->db->table('data_pengajar')
            ->JOIN('data_mapel', 'data_pengajar.kode_mapel=data_mapel.kode_mapel')
            ->where(['id_pengajar' => $id_pengajar])
            ->get()->getRowArray();
    }

    public function getDetailPengajar($id_pengajar)
    {
        return
            $this->db->table('data_pengajar')
            ->JOIN('data_mapel', 'data_pengajar.kode_mapel=data_mapel.kode_mapel')
            ->where(['id_pengajar' => $id_pengajar])
            ->get()->getRowArray();
    }

    public function updatePengajar($data, $id_pengajar)
    {
        return $this->db->table('data_pengajar')->update($data, ['id_pengajar' => $id_pengajar]);
    }

    public function deletePengajar($id_pengajar)
    {
        return $this->db->table('data_pengajar')->delete(['id_pengajar' => $id_pengajar]);
    }
    //End

    //Siswa
    public function getSiswa()
    {
        return
            $this->db->table('data_siswa')
            ->get()->getResultArray();
    }

    public function nextIdSiswa()
    {
        $builder = $this->db->table('data_siswa');
        $builder->selectMax('id_siswa');
        $query = $builder->get()->getRowArray();
        return $query;
    }

    public function insertSiswa($data)
    {
        return $this->db->table('data_siswa')->insert($data);
    }

    
    public function getDetailSiswa($id_siswa)
    {
        return
        $this->db->table('data_siswa')
        ->where(['id_siswa' => $id_siswa])
        ->get()->getRowArray();
    }

    public function getEditSiswa($id_siswa)
    {
        return
            $this->db->table('data_siswa')
            ->where(['id_siswa' => $id_siswa])
            ->get()->getRowArray();
    }

    public function updateSiswa($data, $id_siswa)
    {
        return $this->db->table('data_siswa')->update($data, ['id_siswa' => $id_siswa]);
    }

    public function deleteSiswa($id_siswa)
    {
        return $this->db->table('data_siswa')->delete(['id_siswa' => $id_siswa]);
    }
    
    public function insertTransaksi($data2)
    {
        return $this->db->table('data_transaksi')->insert($data2);
    }
    //End

    //Transaksi
    public function getTransaksi()
    {
        return
            $this->db->table('data_transaksi')
            ->JOIN('data_siswa', 'data_transaksi.id_siswa=data_siswa.id_siswa')
            ->JOIN('data_pengajar', 'data_siswa.id_pengajar=data_pengajar.id_pengajar')
            ->JOIN('data_mapel', 'data_pengajar.kode_mapel=data_mapel.kode_mapel')
            ->get()->getResultArray();
    }

    public function insertTransaksi2($data2)
    {
        return $this->db->table('data_transaksi')->insert($data2);
    }
    
    public function getEditTransaksi($id_transaksi)
    {
        return
            $this->db->table('data_transaksi')
            ->JOIN('data_siswa', 'data_transaksi.id_siswa=data_siswa.id_siswa')
            ->JOIN('data_pengajar', 'data_siswa.id_pengajar=data_pengajar.id_pengajar')
            ->JOIN('data_mapel', 'data_pengajar.kode_mapel=data_mapel.kode_mapel')
            ->where(['id_transaksi' => $id_transaksi])
            ->get()->getRowArray();
    }

    public function updateTransaksi($data2, $id_transaksi)
    {
        return
            $this->db->table('data_transaksi')->update($data2, ['id_transaksi' => $id_transaksi]);
    } 

    public function updateTransaksi2($data, $id_siswa)
    {
        return
            $this->db->table('data_siswa')->update($data, ['id_siswa' => $id_siswa]);
    }

    public function deleteTransaksi($id_transaksi)
    {
        return $this->db->table('data_transaksi')->delete(['id_transaksi' => $id_transaksi]);
    }
    //End

    //Akun
    public function getAkun()
    {
        return
            $this->db->table('login')
            ->get()->getResultArray();
    }

    public function getEditAkun($id_user)
    {
        return
            $this->db->table('login')
            ->where(['id_user' => $id_user])
            ->get()->getRowArray();
    }

    public function updateAkun($data, $id_user)
    {
        return
            $this->db->table('login')->update($data, ['id_user' => $id_user]);
    }

    public function deleteAkun($id_user)
    {
        return $this->db->table('login')->delete(['id_user' => $id_user]);
    }
}
