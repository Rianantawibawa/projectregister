<?php

namespace App\Controllers;

use App\Models\UserModel;

class Landing extends BaseController
{
    protected $helpers = ['auth'];
    protected $validation;

    public function __construct()
    {
        $this->validation = service('validation');
    }

    public function login()
    {

        echo  view('login/login');
    }

    public function register()
    {
        if($this->request->is('get')) {
            return view('login/register');
        }

        $authorize = $auth = service('authorization');

        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'pass_confirm' => $this->request->getVar('pass_confirm'),
            // 'role'     => $this->request->getVar('role'),
        ];

        // dd($data);

        $userModel = new \App\Models\UserModel();
        $user = new \App\Entities\User($data);

        // Membuat pengguna baru dan menyimpan ID pengguna
        // $userId = $userModel->insert($data);
        $val1 = $userModel->withGroup($this->request->getVar('role'))->save($user);

        // $tmp = [
        //     'val1' => $val1,
        //     'val2' => $userModel->getInsertID(),
        //     'val3' => $userModel->errors()
        // ];

        if(!$val1) {
            return view('login/register');
        }

        return view('login/login');
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(session()->get('redirectTo'));
        }

        $data['username'] = user();
        return  view('landing/index');
    }

    public function penjadwalan()
    {

        $PenjadwalanModel = new \App\Models\PenjadwalanModel();
        $jadwal = $PenjadwalanModel ->findAll(); //mengambil smua data daftarguru menggunakan find all
        $data['penjadwalan'] = $jadwal;
        $data['user'] = user();
        return  view('landing/penjadwalan', $data);
    }



    /////////////////////////// GURU PENGGANTI /////////////////////////////////////////////////////
    public function daftarguru()
    {
        $authorize = $auth = service('authorization');
        return  view('landing/daftarguru');
    }

    public function gurupengganti()
    {
        return  view('landing/gurupengganti');
    }

    public function dashboard_gurupengganti()
    {
        $DaftarguruModel = new \App\Models\DaftarguruModel();
        $daftarguru = $DaftarguruModel ->findAll(); //mengambil smua data daftarmitrasekolah menggunakan find all
        $data['daftarguru'] = $daftarguru;

        return  view('landing/dashboard_gurupengganti', $data);
    }

    public function proses_add_guru()
    {
        $DaftarguruModel = new \App\Models\DaftarguruModel(); //memangil model datanya

        $fileIjazah = $this->request->getFile('ijazah');
        $namaijazah = $fileIjazah->getname();
        $fileIjazah->move("img", $namaijazah);

        $fileKtp = $this->request->getFile('ktp');
        $namaktp = $fileKtp->getname();
        $fileKtp->move("img", $namaktp);

        $fileCv = $this->request->getFile('cv');
        $namacv = $fileCv->getname();
        $fileCv->move("img", $namacv);

        $DaftarguruModel->insert(['namaguru' => $this->request->getPost('namaguru'),
                            'alamatguru' => $this->request->getPost('alamatguru'),
                            'ttl' => $this->request->getPost('ttl'),
                            'hp' => $this->request->getPost('hp'),
                            'pendidikan' => $this->request->getPost('pendidikan'),
                            'ijazah' => $namaijazah,
                            'ktp' => $namaktp,
                            'cv' => $namacv,
        ]);
        return redirect()->to(base_url('dashboard_gurupengganti'));
    }

    public function edit_data_guru($id = false)
    {
        $DaftarguruModel = new \App\Models\DaftarguruModel();
        $daftarguru = $DaftarguruModel ->find($id); //mengambil hanya satu data daftarguru berdasarkan id menggunakan find id
        return view('landing/edit_gurupengganti', ['daftarguru' => $daftarguru]);
    }

    public function proses_edit_guru()
    {
        $DaftarguruModel = new \App\Models\DaftarguruModel(); //memangil model datanya
        $DaftarguruModel->update($this->request->getPost('id_guru'), $this->request->getPost());
        return redirect()->to(base_url('dashboard_gurupengganti'));
    }

    public function delete_guru($id)
    {
        $DaftarguruModel = new \App\Models\DaftarguruModel();
        $daftarguru = $DaftarguruModel->find($id);
        $ijazah_file = $daftarguru->ijazah;
        $ktp_file = $daftarguru->ktp;
        $cv_file = $daftarguru->cv;

        $ijazah_file_path = FCPATH . 'img/' . $ijazah_file;
        $ktp_file_path = FCPATH . 'img/' . $ktp_file;
        $cv_file_path = FCPATH . 'img/' . $cv_file;

        if (file_exists($ijazah_file_path)) {
            unlink($ijazah_file_path); // Hapus file ijazah
        }
        if (file_exists($ktp_file_path)) {
            unlink($ktp_file_path); // Hapus file ktp
        }
        if (file_exists($cv_file_path)) {
            unlink($cv_file_path); // Hapus file cv
        }

        $DaftarguruModel->delete($id);
        return redirect()->to(base_url('dashboard_gurupengganti'));
    }

    public function detail_gurupengganti($id)
    {
        $DaftarguruModel = new \App\Models\DaftarguruModel();
        $data['daftarguru'] = $DaftarguruModel->find($id);
        return view('landing/detail_gurupengganti', $data);

    }





    ///////////////////////////// MITRA SEKOLAH //////////////////////////////////////////////////////
    public function daftarmitrasekolah()
    {
        return  view('landing/daftarmitrasekolah');
    }

    public function mitrasekolah()
    {
        return  view('landing/mitrasekolah');
    }

    public function dashboard_mitrasekolah()
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel();
        $daftarmitrasekolah = $DaftarmitrasekolahModel ->findAll(); //mengambil smua data daftarmitrasekolah menggunakan find all
        $data['daftarmitrasekolah'] = $daftarmitrasekolah;
        return  view('landing/dashboard_mitrasekolah', $data);
    }

    public function proses_add_sekolah()
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel(); //memangil model datanya
        $fileFotosekolah = $this->request->getFile('fotosekolah');
        if (!$fileFotosekolah->isValid()) {
            // Handle invalid file error
            return redirect()->to(base_url('dashboard_mitrasekolah'))->with('error', 'Invalid file: fotosekolah');
        }        $namafotosekolah = $fileFotosekolah->getname();
        $fileFotosekolah->move("img", $namafotosekolah);
        $DaftarmitrasekolahModel->insert(['namasekolah' => $this->request->getPost('namasekolah'),
                                'alamatsekolah' => $this->request->getPost('alamatsekolah'),
                                'tglberdiri' => $this->request->getPost('tglberdiri'),
                                'kepsek' => $this->request->getPost('kepsek'),
                                'operator' => $this->request->getPost('operator'),
                                'fotosekolah' => $namafotosekolah,
    ]);
        return redirect()->to(base_url('dashboard_mitrasekolah'));
    }

    public function edit_mitrasekolah($id = false)
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel();
        $daftarmitrasekolah = $DaftarmitrasekolahModel ->find($id);
        return view('landing/edit_mitrasekolah', ['daftarmitrasekolah' => $daftarmitrasekolah]);
    }

    public function proses_edit_mitrasekolah()
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel();
        ;
        $DaftarmitrasekolahModel->update($this->request->getPost('id_sekolah'), $this->request->getPost());
        return redirect()->to(base_url('dashboard_mitrasekolah'));
    }


    public function delete_mitrasekolah($id)
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel();
        $daftarmitrasekolah = $DaftarmitrasekolahModel->find($id);
        $foto_file = $daftarmitrasekolah->fotosekolah;
        $file_path = FCPATH . 'img/' . $foto_file;
        if (file_exists($file_path)) {
            unlink($file_path); // Hapus file gambar
        }

        $DaftarmitrasekolahModel->delete($id);
        return redirect()->to(base_url('dashboard_mitrasekolah'));
    }

    public function detail_mitrasekolah($id)
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel();
        $data['mitrasekolah'] = $DaftarmitrasekolahModel->find($id);
        return view('landing/detail_mitrasekolah', $data);

    }

}
