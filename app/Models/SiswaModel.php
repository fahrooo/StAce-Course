<?php

namespace App\Models;

use CodeIgniter\Model;


class SiswaModel extends Model
{
    public function getCourse()
    {
        return
            $this->db->table('data_pengajar')
            ->JOIN('data_mapel', 'data_pengajar.kode_mapel=data_mapel.kode_mapel')
            ->get()->getResultArray();
    }

    public function getKwitansi($id_siswa)
    {
        return
            $this->db->table('data_transaksi')
            ->JOIN('data_siswa', 'data_transaksi.id_siswa=data_siswa.id_siswa')
            ->JOIN('data_pengajar', 'data_siswa.id_pengajar=data_pengajar.id_pengajar')
            ->JOIN('data_mapel', 'data_pengajar.kode_mapel=data_mapel.kode_mapel')
            ->where(['data_transaksi.id_siswa' => $id_siswa])
            ->get()->getRowArray();
    }

    public function getKwitansiBB($id_siswa)
    {
        return
            $this->db->table('data_transaksi')
            ->JOIN('data_siswa', 'data_transaksi.id_siswa=data_siswa.id_siswa')
            ->JOIN('data_pengajar', 'data_siswa.id_pengajar=data_pengajar.id_pengajar')
            ->JOIN('data_mapel', 'data_pengajar.kode_mapel=data_mapel.kode_mapel')
            ->where(['data_transaksi.id_siswa' => $id_siswa, 'data_transaksi.status' => 'Belum Bayar'])
            ->get()->getRowArray();
    }

    public function getKwitansiSB($id_siswa)
    {
        return
            $this->db->table('data_transaksi')
            ->JOIN('data_siswa', 'data_transaksi.id_siswa=data_siswa.id_siswa')
            ->JOIN('data_pengajar', 'data_siswa.id_pengajar=data_pengajar.id_pengajar')
            ->JOIN('data_mapel', 'data_pengajar.kode_mapel=data_mapel.kode_mapel')
            ->where(['data_transaksi.id_siswa' => $id_siswa, 'data_transaksi.status' => 'Sudah Bayar'])
            ->get()->getRowArray();
    }

    public function Register($data)
    {
        return $this->db->table('login')->insert($data);
    }

    public function Login($username)
    {
        return $this->db->table('login')
        ->where(['username' => $username])
        ->get()->getRowArray();
    }
}