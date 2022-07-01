<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\AdminModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->swModel = new SiswaModel();
        $this->adModel = new AdminModel();
        helper('form', 'url');
    }

    public function index()
    {
        if($this->session->has('logged_in')){
            return redirect()->to('/home/home');
        }
        $course = $this->swModel->getCourse();
        $data = [
            'course' => $course,
        ];
        return view('index', $data);
    }
    
    public function home()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'user'){
            return redirect()->to('admin/index');
        }
        return view('home');
    }

    public function login()
    {
        if($this->session->has('logged_in')){
            return redirect()->to('/home/home');
        }
        $data['validation'] = \Config\Services::validation();
        return view('auth/login', $data);
    }

    public function loginAuth()
    {
        $session     = session();
        $username    = $this->request->getVar('username');
        $password    = $this->request->getVar('password');

        $data = $this->swModel->Login($username);

        if ($data != NULL) {
            $pass        = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                // cek jika user login sebagai admin
                if ($data['role'] == "admin") {

                    // buat session login dan username
                    $ses_data = [
                        'nama'    => $data['nama'],
                        'role'    => $data['role'],
                        'logged_in' => TRUE
                    ];

                    // alihkan ke halaman dashboard admin
                    $session->set($ses_data);
                    return redirect()->to('admin/index');

                    // cek jika user login sebagai user
                } else if ($data['role'] == "user") {
                    // buat session login dan username
                    $ses_data = [
                        'nama'    => $data['nama'],
                        'role'    => $data['role'],
                        'logged_in' => TRUE
                    ];
                    // alihkan ke halaman dashboard user
                    $session->set($ses_data);
                    return redirect()->to('home/home');
                } else {
                    // alihkan ke halaman login kembali
                    return redirect()->to('home/login');
                }
            }
            $session->setFlashdata('msg', 'Password yang dimasukkan salah');
            return redirect()->to('home/login');
        } else {
            $session->setFlashdata('msg', 'Username yang dimasukkan salah');
            return redirect()->to('home/login');
        }
    }

    public function register()
    {
        $data['validation'] = \Config\Services::validation();
        return view('auth/register', $data);
    }

    public function save_account()
    {
        $nama         = $this->request->getPost('nama');
        $username     = $this->request->getPost('username');
        $email        = $this->request->getPost('email');
        $password     = $this->request->getPost('password');
        $password2    = $this->request->getPost('password2');
        $password     = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'nama'         => $nama,
            'username'     => $username,
            'email'        => $email,
            'password'     => $password,
            'role'         => 'user',
        ];

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required'    => 'Nama Harus Diisi',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required'    => 'Username Harus Diisi',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required'    => 'Email Harus Diisi',
                    'valid_email' => 'Format Email Harus Valid'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[20]',
                'errors' => [
                    'required'   => 'Password Harus Diisi',
                    'min_length' => 'Password minimal 8 huruf',
                    'max_length' => 'Password maksimal 20 huruf'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required'    => 'Confirm Password Harus Diisi',
                    'matches'     => 'Password Harus Sama',
                ]
            ],
        ])) {
            session()->setFlashdata('danger', 'Gagal Melakukan Registrasi');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->swModel->Register($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Melakukan Registrasi');
            return redirect()->to(base_url('home/login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('home');
    }

    public function course()
    {
        if($this->session->has('logged_in')){
            return redirect()->to('/home/courselog');
        }
        $course = $this->swModel->getCourse();
        $data = [
            'course' => $course,
        ];
        return view('course', $data);
    }

    public function courselog()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'user'){
            return redirect()->to('admin/index');
        }
        $course = $this->swModel->getCourse();
        $data = [
            'course' => $course,
        ];
        return view('courselog', $data);
    }

    public function daftarcourse($id_pengajar)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }
        if($this->session->get('role') != 'user'){
            return redirect()->to('admin/index');
        }
        $max = $this->adModel->nextIdSiswa();
        $pengajar = $this->adModel->getPengajar();
        $course = $this->adModel->getEditPengajar($id_pengajar);
        $data = [
            'validation'    => \Config\Services::validation(),
            'max'           => $max,
            'pengajar'      => $pengajar,
            'id_pengajar'   => $id_pengajar,
            'course'        => $course
        ];
        return view('daftarcourse', $data);
    }

    public function addstudent()
    {
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
            session()->setFlashdata('danger', 'Gagal Melakukan Pendaftaran');
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $simpan = $this->adModel->insertSiswa($data);
        $simpan2 = $this->adModel->insertTransaksi($data2);
        if ($simpan && $simpan2) {
            session()->setFlashdata('success', 'Berhasil Melakukan Pendaftaran');
            return redirect()->to(base_url('Home/bayarcourse/' . $id_siswa));
        }
    }

    public function cetakkwitansi($id_siswa)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'user'){
            return redirect()->to('admin/index');
        }
        $kwitansi = $this->swModel->getKwitansiSB($id_siswa);
        $data = [
            'validation'    => \Config\Services::validation(),
            'kwitansi'      => $kwitansi,
        ];
        return view('cetakkwitansi', $data);
    }

    public function bayarcourse($id_siswa)
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'user'){
            return redirect()->to('admin/index');
        }
        $kwitansi = $this->swModel->getKwitansiBB($id_siswa);
        $data = [
            'validation'    => \Config\Services::validation(),
            'kwitansi'      => $kwitansi,
        ];
        if ($kwitansi == true) {
            return view('bayarcourse', $data);
        } else {
            session()->setFlashdata('success', 'Anda Sudah Melakukan Pembayaran');
            return redirect()->to(base_url('Home/cetakkwitansi/' . $id_siswa));
        }
    }

    public function aboutus()
    {
        if($this->session->has('logged_in')){
            return redirect()->to('/home/aboutuslog');
        }
        return view('aboutus');
    }

    public function aboutuslog()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'user'){
            return redirect()->to('admin/index');
        }
        return view('aboutuslog');
    }

    public function contact()
    {
        if($this->session->has('logged_in')){
            return redirect()->to('/home/contactlog');
        }
        return view('contact');
    }

    public function contactlog()
    {
        if(!$this->session->has('logged_in')){
            return redirect()->to('/home/login');
        }

        if($this->session->get('role') != 'user'){
            return redirect()->to('admin/index');
        }
        return view('contactlog');
    }
}
