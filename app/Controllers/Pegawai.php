<?php

namespace App\Controllers;

class Pegawai extends BaseController
{
    function _construct()
    {
        $this->model = new \App\Models\ModelPegawai();
    }
    public function simpan()
    {
        $validasi  = \Config\Services::validation();
        $aturan = [
            'nama' =>[
                'label' => 'Nama',
                'rules' =>'required|min_lenght[5]',
                'errors' => [
                    'required' =>'{field} harus diisi',
                    'min_length' => 'Minmum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|min_lenght[5]|valid_email',
                'errors' => [
                    'required' =>'{field} harus diisi',
                    'min_length' => 'Minmum karakter untuk field {field} adalah 5 karakter',
                    'valid_email' => 'Email yang kamu masukkan tidak valid'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required|min_lenght[5]',
                'errors' => [
                    'required' =>'{field} harus diisi',
                    'min_length' => 'Minmum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
        ];

        $validasi->setRules($aturan);
        if($validasi->withRequest($this->request)->run()) {
            $nama = $this->request->getPost('nama');
            $email = $this->request->getPost('email');
            $bidang = $this->request->getPost('bidang');
            $alamat = $this->request->getPost('alamat');
            
            $data = [
                'nama'=>$nama,
                'email'=>$email,
                'bidang'=>$bidang,
                'alamat'=>$alamat,
            ];

            $this->model->save($data);

            $hasil['sukses'] = "Berhasil memasukkan data";
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }


        
        return json_encode($hasil);
    }
    public function index()
    {
        return view('pegawai_view');
    }
}
