<?php

namespace App\Controllers;
use App\Models\UserModel;

class Admin extends BaseController
{

//////////////////////// AUTH ////////////////////////////////
   protected $helpers = ['auth'];
   public  function login()
   {
       
        echo  view('login/login');
   }

//    public  function register()
//    {
//     $userModel = new UserModel();

//     $data = [
//         'username' => $this->request->getVar('username'),
//         'email'    => $this->request->getVar('email'),
//         'password' => $this->request->getVar('password'),
//         'role'     => $this->request->getVar('role'),
//     ];
//     echo  view('login/register', $data);
//    }

   public  function admin()
   {
    
        $DaftarguruModel = new \App\Models\DaftarguruModel();
        $data['daftarguru'] = $DaftarguruModel->findAll(); //mengambil smua data daftarguru menggunakan find all
        $data['total_guru'] = $DaftarguruModel->countAllResults(); // count the total number of records in the table
        
        $PenjadwalanModel = new \App\Models\PenjadwalanModel();
        $data['penjadwalan'] = $PenjadwalanModel->findAll(); 
        $data['total_jadwal'] = $PenjadwalanModel->countAllResults();

        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel();
        $daftarmitrasekolah = $DaftarmitrasekolahModel ->findAll(); 
        $data['total_mitrasekolah'] = $DaftarmitrasekolahModel->countAllResults();
        $data['user'] = user(); // Ambil informasi pengguna yang sedang login
        return  view('admin/index',$data);
   }

   public function logout()
   {
       // Logout pengguna
       auth()->logout();
       
       // Redirect ke halaman login
       return redirect()->to('/login')->with('message', 'You have been logged out.');
   }



/////////////////////////// PENJADWALAN ///////////////////////////////////////////////////

    public  function penjadwalan_guru()
    {
        $PenjadwalanModel = new \App\Models\PenjadwalanModel();
        $jadwal = $PenjadwalanModel ->findAll(); //mengambil smua data daftarguru menggunakan find all
        $data['penjadwalan']=$jadwal;
        $data['user'] = user();

        return  view('admin/penjadwalan_guru',$data);
    }

    public  function save_jadwal()
    {
        $PenjadwalanModel = new \App\Models\PenjadwalanModel();

             $PenjadwalanModel->insert([
            'namaguru' => $this->request->getPost('namaguru'),
            'sekolah' => $this->request->getPost('sekolah'),
            'kelas' => $this->request->getPost('kelas'),
            'tanggal' => $this->request->getPost('tanggal'),
        ]);
        return redirect()->to(base_url('admin/penjadwalan_guru'));
    }

    public function edit_data_jadwal($id = false)
    {
        $PenjadwalanModel = new \App\Models\PenjadwalanModel();
        $penjadwalan = $PenjadwalanModel ->find($id);
        return view ('admin/edit_jadwal', ['penjadwalan' => $penjadwalan]);
    }

    public function proses_edit_jadwal()
    {
        $PenjadwalanModel = new \App\Models\PenjadwalanModel();
        $PenjadwalanModel->update($this->request->getPost('id_jadwal'), $this->request->getPost());
        return redirect()->to(base_url('admin/penjadwalan_guru'));
    }

    public function delete_jadwal($id)
    {
        $PenjadwalanModel = new \App\Models\PenjadwalanModel();
        $PenjadwalanModel->delete($id);
        return redirect ()->to(base_url('admin/penjadwalan_guru'));
    }



//////////////////// GURU PENGGANTI ///////////////////////////////////////////////

    public  function gurupengganti()
    {
        $DaftarguruModel = new \App\Models\DaftarguruModel();
        $daftarguru = $DaftarguruModel ->findAll(); //mengambil smua data daftarguru menggunakan find all
        $data['daftarguru']=$daftarguru;
        $data['user'] = user();

        return  view('admin/gurupengganti', $data);
    }

    public function admin_delete_guru($id)
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
        return redirect ()->to(base_url('admin/gurupengganti'));
    }
    public function detail_guru($id)
    {
        $DaftarguruModel = new \App\Models\DaftarguruModel();
        $data['daftarguru'] = $DaftarguruModel->find($id);
        $data['user'] = user();
        return view ('admin/detail_guru', $data);
    }

    public function download_pdf($id, $type)
    {
        $DaftarguruModel = new \App\Models\DaftarguruModel();
        $guru = $DaftarguruModel->find($id);        
        $pdf_file = '';
        if ($type == 'ijazah') {
            $pdf_file = $guru->ijazah;
        } elseif ($type == 'ktp') {
            $pdf_file = $guru->ktp;
        } elseif ($type == 'cv') {
            $pdf_file = $guru->cv;
        }
    $file_path = FCPATH . 'img/' . $pdf_file;
    if (file_exists($file_path)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $pdf_file . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($file_path);
        exit;
    } else {
        return redirect()->to(base_url('admin/gurupengganti'))->with('error', 'File not found');
    }
        return view('admin/view_pdf_iframe', ['pdf_file' => $pdf_file]);
    }



/////////////////////// MITRA SEKOLAH ///////////////////////////////////////
    public  function mitrasekolah()
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel();
        $daftarmitrasekolah = $DaftarmitrasekolahModel ->findAll(); //mengambil smua data daftarmitrasekolah menggunakan find all
        $data['daftarmitrasekolah']=$daftarmitrasekolah;
        $data['user'] = user();

         return  view('admin/mitrasekolah', $data);
    }

    public function admin_delete_mitrasekolah($id)
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel();
        $daftarmitrasekolah = $DaftarmitrasekolahModel->find($id);
        $foto_file = $daftarmitrasekolah->fotosekolah;

        $file_path = FCPATH . 'img/' . $foto_file;
        if (file_exists($file_path)) {
            unlink($file_path); // Hapus file gambar
        }
        $DaftarmitrasekolahModel->delete($id);

            // $DaftarguruModel->delete($id);
            return redirect ()->to(base_url('admin/mitrasekolah'));
    }

    public function detail_mitrasekolah($id)
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel(); 
        $data['mitrasekolah'] = $DaftarmitrasekolahModel->find($id);
        $data['user'] = user();


        return view ('admin/detail_sekolah', $data);

    }
    public function download_foto($id, $type)
    {
        $DaftarmitrasekolahModel = new \App\Models\DaftarmitrasekolahModel(); 
        $mitrasekolah =  $DaftarmitrasekolahModel->find($id);        
        $foto_file = '';

            if($type == 'fotosekolah') {
            $foto_file = $mitrasekolah->fotosekolah;
            }

    $file_path = FCPATH . 'img/' . $foto_file;
    if (file_exists($file_path)) {
        header('Content-Type: image/' . mime_content_type($file_path));
        header('Content-Disposition: attachment; filename="' . $foto_file . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($file_path);
        exit;
    } else {
        return redirect()->to(base_url('admin/detailsekolah'))->with('error', 'File not found');
    }
    }





}