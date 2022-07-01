<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\SiswaModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->adModel = new AdminModel();
        $this->swModel = new SiswaModel();
        helper('form', 'url');
    }

    public function index()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $teacher     = $this->adModel->countDataTeacher();
        $student     = $this->adModel->countDataStudent();
        $subject     = $this->adModel->countDataSubject();
        $transaction = $this->adModel->countDataTransaction();
        $data = [
            'teacher'     => $teacher,
            'student'     => $student,
            'subject'     => $subject,
            'transaction' => $transaction
        ];
        return view('dashboard', $data);
    }

    //Mata Pelajaran
    public function listsubject()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $mapel = $this->adModel->getMapel();
        $data = ['mapel' => $mapel];
        return view('listsubject', $data);
    }

    public function createsubject()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $max = $this->adModel->nextKodeMapel();
        $data = [
            'validation' => \Config\Services::validation(),
            'max'        => $max
        ];
        return view('createsubject', $data);
    }

    public function addsubject()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $kode_mapel    = $this->request->getPost('kode_mapel');
        $nama_mapel    = $this->request->getPost('nama_mapel');
        $harga_course  = $this->request->getPost('harga_course');
        $foto_course   = $this->request->getFile('foto_course');
        $foto_course->move('../public/imagescourse/', $foto_course->getName());

        $data = [
            'kode_mapel'   => $kode_mapel,
            'nama_mapel'   => $nama_mapel,
            'harga_course' => $harga_course,
            'foto_course'  => $foto_course->getName()
        ];

        if (!$this->validate([
            'kode_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Subject Harus Diisi'
                ]
            ],
            'nama_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Subject Harus Diisi'
                ]
            ],
            'harga_course' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nama Subject Harus Diisi',
                    'numeric'  => 'Hanya Bisa Input Angka'
                ]
            ],
        ])) {
            session()->setFlashdata('danger', 'Gagal Menambahkan Course');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->insertMapel($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambahkan Course');
            return redirect()->to(base_url('admin/listsubject'));
        }
    }

    public function editsubject($kode_mapel)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $mapel = $this->adModel->getEditMapel($kode_mapel);
        if (empty($mapel)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Siswa Tidak ditemukan !');
        }
        $data['mapel'] = $mapel;
        $data['validation'] = \Config\Services::validation();
        return view('editsubject', $data);
    }

    public function updatesubject()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $kode_mapel    = $this->request->getPost('kode_mapel');
        $nama_mapel    = $this->request->getPost('nama_mapel');
        $harga_course  = $this->request->getPost('harga_course');
        $foto_course   = $this->request->getFile('foto_course');
        $foto_course->move('../public/imagescourse/', $foto_course->getName());

        $data = [
            'kode_mapel'   => $kode_mapel,
            'nama_mapel'   => $nama_mapel,
            'harga_course' => $harga_course,
            'foto_course'  => $foto_course->getName()
        ];

        if (!$this->validate([
            'kode_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Subject Harus Diisi'
                ]
            ],
            'nama_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Subject Harus Diisi'
                ]
            ],
            'harga_course' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nama Subject Harus Diisi',
                    'numeric'  => 'Hanya Bisa Input Angka'
                ]
            ]
        ])) {
            session()->setFlashdata('danger', 'Gagal Mengubah Course');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->updateMapel($data, $kode_mapel);
        if ($simpan) {
            session()->setFlashdata('info', 'Berhasil Mengubah Course');
            return redirect()->to(base_url('admin/listsubject'));
        }
    }

    public function deletesubject($kode_mapel)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $hapus = $this->adModel->deleteMapel($kode_mapel);
        if ($hapus) {
            session()->setFlashdata('danger', 'Berhasil Menghapus Course');
            return redirect()->to(base_url('admin/listsubject'));
        }
    }
    //End

    //Pengajar
    public function listteacher()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $pengajar = $this->adModel->getPengajar();
        $data = ['pengajar' => $pengajar];
        return view('listteacher', $data);
    }

    public function createteacher()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $mapel = $this->adModel->getMapel();
        $max = $this->adModel->nextIdPengajar();
        $data = [
            'validation' => \Config\Services::validation(),
            'max'        => $max,
            'mapel'      => $mapel
        ];
        return view('createteacher', $data);
    }

    public function addteacher()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $id_pengajar    = $this->request->getPost('id_pengajar');
        $nama_pengajar  = $this->request->getPost('nama_pengajar');
        $jk             = $this->request->getPost('jk');
        $no_hp          = $this->request->getPost('no_hp');
        $email          = $this->request->getPost('email');
        $alamat         = $this->request->getPost('alamat');
        $kode_mapel     = $this->request->getPost('kode_mapel');

        $data = [
            'id_pengajar'   => $id_pengajar,
            'nama_pengajar' => $nama_pengajar,
            'jk'            => $jk,
            'no_hp'         => $no_hp,
            'email'         => $email,
            'alamat'        => $alamat,
            'kode_mapel'    => $kode_mapel
        ];

        if (!$this->validate([
            'id_pengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode teacher Harus Diisi'
                ]
            ],
            'nama_pengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Salah Satu Jenis Kelamin'
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Telephone Harus Diisi',
                    'numeric'  => 'Hanya Bisa Input Angka'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Harus Diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'kode_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Subject Harus Dipilih'
                ]
            ],
        ])) {
            session()->setFlashdata('danger', 'Gagal Menambahkan Teacher');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->insertPengajar($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambahkan Teacher');
            return redirect()->to(base_url('admin/listteacher'));
        }
    }

    public function editteacher($id_pengajar)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $pengajar = $this->adModel->getEditPengajar($id_pengajar);
        if (empty($pengajar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengajar Tidak ditemukan !');
        }
        $mapel = $this->adModel->getMapel();
        $data['mapel'] = $mapel;
        $data['pengajar'] = $pengajar;
        $data['validation'] = \Config\Services::validation();
        return view('editteacher', $data);
    }

    public function updateteacher()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $id_pengajar    = $this->request->getPost('id_pengajar');
        $nama_pengajar  = $this->request->getPost('nama_pengajar');
        $jk             = $this->request->getPost('jk');
        $no_hp          = $this->request->getPost('no_hp');
        $email          = $this->request->getPost('email');
        $alamat         = $this->request->getPost('alamat');
        $kode_mapel     = $this->request->getPost('kode_mapel');

        $data = [
            'id_pengajar'   => $id_pengajar,
            'nama_pengajar' => $nama_pengajar,
            'jk'            => $jk,
            'no_hp'         => $no_hp,
            'email'         => $email,
            'alamat'        => $alamat,
            'kode_mapel'    => $kode_mapel
        ];

        if (!$this->validate([
            'id_pengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode teacher Harus Diisi'
                ]
            ],
            'nama_pengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Salah Satu Jenis Kelamin'
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Telephone Harus Diisi',
                    'numeric'  => 'Hanya Bisa Input Angka'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Harus Diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'kode_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Subject Harus Diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('danger', 'Gagal Mengubah Data Teacher');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->updatePengajar($data, $id_pengajar);
        if ($simpan) {
            session()->setFlashdata('info', 'Berhasil Mengubah Data Teacher');
            return redirect()->to(base_url('admin/listteacher'));
        }
    }

    public function detailteacher($id_pengajar)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $pengajar = $this->adModel->getDetailPengajar($id_pengajar);
        if (empty($pengajar)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pengajar Tidak ditemukan !');
        }
        $data['pengajar'] = $pengajar;
        $data['validation'] = \Config\Services::validation();
        return view('detailteacher', $data);
    }

    public function deleteteacher($id_pengajar)
    {
        $hapus = $this->adModel->deletePengajar($id_pengajar);
        if ($hapus) {
            session()->setFlashdata('danger', 'Berhasil Menghapus Data Teacher');
            return redirect()->to(base_url('admin/listteacher'));
        }
    }
    //End

    //Siswa
    public function liststudent()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $siswa = $this->adModel->getSiswa();
        $data = [
            'siswa'    => $siswa,
        ];
        return view('liststudent', $data);
    }

    public function createstudent()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $max = $this->adModel->nextIdSiswa();
        $pengajar = $this->adModel->getPengajar();
        $data = [
            'validation' => \Config\Services::validation(),
            'max'        => $max,
            'pengajar'   => $pengajar
        ];
        return view('createstudent', $data);
    }

    public function addstudent()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }

        $id_siswa      = $this->request->getPost('id_siswa');
        $id_pengajar   = $this->request->getPost('id_pengajar');
        $nama_siswa    = $this->request->getPost('nama_siswa');
        $jk            = $this->request->getPost('jk');
        $tmpt_lahir    = $this->request->getPost('tmpt_lahir');
        $tgl_lahir     = $this->request->getPost('tgl_lahir');
        $alamat        = $this->request->getPost('alamat');
        $email         = $this->request->getPost('email');
        $no_hp_siswa   = $this->request->getPost('no_hp_siswa');
        $nama_ortu     = $this->request->getPost('nama_ortu');
        $no_hp_ortu    = $this->request->getPost('no_hp_ortu');

        $data = [
            'id_siswa'      => $id_siswa,
            'id_pengajar'   => $id_pengajar,
            'nama_siswa'    => $nama_siswa,
            'jk'            => $jk,
            'tmpt_lahir'    => $tmpt_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'alamat'        => $alamat,
            'email'         => $email,
            'no_hp_siswa'   => $no_hp_siswa,
            'nama_ortu'     => $nama_ortu,
            'no_hp_ortu'    => $no_hp_ortu
        ];

        $data2 = [
            'id_siswa'      => $id_siswa,
            'tgl_transaksi' => date("d F Y"),
            'status'        => "Belum Bayar",
        ];

        if (!$this->validate([
            'id_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID Siswa Harus Diisi'
                ]
            ],
            'id_pengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Course Harus Dipilih'
                ]
            ],
            'nama_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Salah Satu Jenis Kelamin'
                ]
            ],
            'tmpt_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Harus Diisi'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus Diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Harus Diisi'
                ]
            ],
            'no_hp_siswa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Telephone Harus Diisi',
                    'numeric'  => 'Hanya Bisa Input Angka'
                ]
            ],
            'nama_ortu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Orang Tua Harus Diisi'
                ]
            ],
            'no_hp_ortu' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Telephone Harus Diisi',
                    'numeric'  => 'Hanya Bisa Input Angka'
                ]
            ],
        ])) {
            session()->setFlashdata('danger', 'Gagal Menambahkan Data Student');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->insertSiswa($data);
        $simpan2 = $this->adModel->insertTransaksi($data2);
        if ($simpan && $simpan2) {
            session()->setFlashdata('success', 'Berhasil Menambahkan Data Student');
            return redirect()->to(base_url('admin/liststudent'));
        }
    }

    public function detailstudent($id_siswa)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $siswa = $this->adModel->getDetailSiswa($id_siswa);
        if (empty($siswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Siswa Tidak ditemukan !');
        }
        $data['siswa'] = $siswa;
        $data['validation'] = \Config\Services::validation();
        return view('detailstudent', $data);
    }

    public function editstudent($id_siswa)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $siswa = $this->adModel->getEditSiswa($id_siswa);
        if (empty($siswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Siswa Tidak ditemukan !');
        }
        $data['siswa'] = $siswa;
        $data['validation'] = \Config\Services::validation();
        return view('editstudent', $data);
    }

    public function updatestudent()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }

        $id_siswa      = $this->request->getPost('id_siswa');
        $id_pengajar   = $this->request->getPost('id_pengajar');
        $nama_siswa    = $this->request->getPost('nama_siswa');
        $jk            = $this->request->getPost('jk');
        $tmpt_lahir    = $this->request->getPost('tmpt_lahir');
        $tgl_lahir     = $this->request->getPost('tgl_lahir');
        $alamat        = $this->request->getPost('alamat');
        $email         = $this->request->getPost('email');
        $no_hp_siswa   = $this->request->getPost('no_hp_siswa');
        $nama_ortu     = $this->request->getPost('nama_ortu');
        $no_hp_ortu    = $this->request->getPost('no_hp_ortu');

        $data = [
            'id_siswa'      => $id_siswa,
            'id_pengajar'   => $id_pengajar,
            'nama_siswa'    => $nama_siswa,
            'jk'            => $jk,
            'tmpt_lahir'    => $tmpt_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'alamat'        => $alamat,
            'email'         => $email,
            'no_hp_siswa'   => $no_hp_siswa,
            'nama_ortu'     => $nama_ortu,
            'no_hp_ortu'    => $no_hp_ortu
        ];

        if (!$this->validate([
            'id_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID Siswa Harus Diisi'
                ]
            ],
            'id_pengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Course Harus Dipilih'
                ]
            ],
            'nama_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Salah Satu Jenis Kelamin'
                ]
            ],
            'tmpt_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Lahir Harus Diisi'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus Diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Harus Diisi'
                ]
            ],
            'no_hp_siswa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Telephone Harus Diisi',
                    'numeric'  => 'Hanya Bisa Input Angka'
                ]
            ],
            'nama_ortu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Orang Tua Harus Diisi'
                ]
            ],
            'no_hp_ortu' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Telephone Harus Diisi',
                    'numeric'  => 'Hanya Bisa Input Angka'
                ]
            ],
        ])) {
            session()->setFlashdata('danger', 'Gagal Mengubah Data Student');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->updateSiswa($data, $id_siswa);
        if ($simpan) {
            session()->setFlashdata('info', 'Berhasil Mengubah Data Student');
            return redirect()->to(base_url('admin/liststudent'));
        }
    }

    public function deletestudent($id_siswa)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $hapus = $this->adModel->deleteSiswa($id_siswa);
        if ($hapus) {
            session()->setFlashdata('danger', 'Berhasil Menghapus Data Student');
            return redirect()->to(base_url('admin/liststudent'));
        }
    }
    //End

    //Transaksi
    public function listtransaction()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $transaksi = $this->adModel->getTransaksi();
        $data = [
            'transaksi'  => $transaksi,
        ];
        return view('listtransaction', $data);
    }

    public function createtransaction()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $siswa = $this->adModel->getSiswa();
        $pengajar = $this->adModel->getPengajar();
        $transaksi = $this->adModel->getTransaksi();
        $data['siswa'] = $siswa;
        $data['pengajar'] = $pengajar;
        $data['transaksi'] = $transaksi;
        $data['validation'] = \Config\Services::validation();
        return view('createtransaction', $data);
    }

    public function addtransaction()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $id_siswa      = $this->request->getPost('id_siswa');
        $id_pengajar   = $this->request->getPost('id_pengajar');
        $tgl_transaksi = $this->request->getPost('tgl_transaksi');
        $status        = $this->request->getPost('status');

        $data = [
            'id_pengajar'   => $id_pengajar,
        ];

        $data2 = [
            'id_siswa'      => $id_siswa,
            'tgl_transaksi' => $tgl_transaksi,
            'status'        => $status,
        ];

        if (!$this->validate([
            'id_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Siswa Harus Dipilih'
                ]
            ],
            'id_pengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Salah Satu Course'
                ]
            ],
            'tgl_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Transaksi Harus Diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Salah Satu Status Pembayaran'
                ]
            ],
        ])) {
            session()->setFlashdata('danger', 'Gagal Menambahkan Data Transaction');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->insertTransaksi2($data2);
        $simpan2 = $this->adModel->updateTransaksi2($data, $id_siswa);
        if ($simpan && $simpan2) {
            session()->setFlashdata('success', 'Berhasil Menambahkan Data Transaction');
            return redirect()->to(base_url('admin/listtransaction'));
        }
    }

    public function edittransaction($id_transaksi)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $pengajar = $this->adModel->getPengajar();
        $transaksi = $this->adModel->getEditTransaksi($id_transaksi);
        if (empty($transaksi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Transaksi Tidak ditemukan !');
        }
        $data['pengajar'] = $pengajar;
        $data['transaksi'] = $transaksi;
        $data['validation'] = \Config\Services::validation();
        return view('edittransaction', $data);
    }

    public function updatetransaction()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }

        $id_transaksi  = $this->request->getPost('id_transaksi');
        $id_siswa      = $this->request->getPost('id_siswa');
        $id_pengajar   = $this->request->getPost('id_pengajar');
        $tgl_transaksi = $this->request->getPost('tgl_transaksi');
        $status        = $this->request->getPost('status');

        $data = [
            'id_pengajar'   => $id_pengajar,
            'id_siswa'      => $id_siswa,
        ];

        $data2 = [
            'id_transaksi'  => $id_transaksi,
            'tgl_transaksi' => $tgl_transaksi,
            'status'        => $status,
        ];

        if (!$this->validate([
            'id_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID Siswa Harus Diisi'
                ]
            ],
            'id_pengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Salah Satu Course'
                ]
            ],
            'tgl_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Transaksi Harus Diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Salah Satu Status Pembayaran'
                ]
            ],
        ])) {
            session()->setFlashdata('danger', 'Gagal Mengubah Data Transaction');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->updateTransaksi($data2, $id_transaksi);
        $simpan2 = $this->adModel->updateTransaksi2($data, $id_siswa);
        if ($simpan && $simpan2) {
            session()->setFlashdata('info', 'Berhasil Mengubah Data Transaction');
            return redirect()->to(base_url('admin/listtransaction'));
        }
    }

    public function deletetransaction($id_transaksi)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $hapus = $this->adModel->deleteTransaksi($id_transaksi);
        if ($hapus) {
            session()->setFlashdata('danger', 'Berhasil Menghapus Data Transaction');
            return redirect()->to(base_url('admin/listtransaction'));
        }
    }

    public function cetakkwitansi($id_siswa)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $kwitansi = $this->swModel->getKwitansi($id_siswa);
        $data = [
            'validation'    => \Config\Services::validation(),
            'kwitansi'      => $kwitansi,
        ];
        return view('admincetakkwi', $data);
    }
    //End

    //Akun
    public function listaccount()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $akun = $this->adModel->getAkun();
        $data = [
            'akun'  => $akun,
        ];
        return view('listaccount', $data);
    }

    public function editaccount($id_user)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $akun = $this->adModel->getEditAkun($id_user);
        if (empty($akun)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Akun Tidak ditemukan !');
        }
        $data['akun'] = $akun;
        $data['validation'] = \Config\Services::validation();
        return view('editaccount', $data);
    }

    public function updateaccount()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }

        $id_user     = $this->request->getPost('id_user');
        $nama        = $this->request->getPost('nama');
        $username    = $this->request->getPost('username');
        $email       = $this->request->getPost('email');
        $role        = $this->request->getPost('role');

        $data = [
            'nama'       => $nama,
            'username'   => $username,
            'email'      => $email,
            'role'       => $role
        ];

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Harus Diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Harus Diisi',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role Harus Dipilih',
                ]
            ]
        ])) {
            session()->setFlashdata('danger', 'Gagal Mengubah Account');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->updateAkun($data, $id_user);
        if ($simpan) {
            session()->setFlashdata('info', 'Berhasil Mengubah Account');
            return redirect()->to(base_url('admin/listaccount'));
        }
    }

    public function deleteaccount($id_user)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'admin'){
            return redirect()->to('home/home');
        }
        $hapus = $this->adModel->deleteAkun($id_user);
        if ($hapus) {
            session()->setFlashdata('danger', 'Berhasil Menghapus Data Account');
            return redirect()->to(base_url('admin/listaccount'));
        }
    }
}
