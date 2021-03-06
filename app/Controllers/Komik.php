<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    //memanggil database komik menggunakan model
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Komik | BACA KOMIK',
            'komik' => $this->komikModel->getKomik()
        ];

        //cara konek db tanpa model (manual)
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // };

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan');
        };

        return view('komik/detail', $data);
    }

    public function create()
    {
        // Karena memanggil validation dengan redirect yang tersimpan di session maaka harus memanggil session
        // session(); //biar engga lupa masukkin session maka session dimasukkin di baseController
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];
        return view('komik/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            // 'judul' => 'required|is_unique[komik.judul]',
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar tidak boleh lebih dari 1mb',
                    'is_image' => 'masukkan gambar bertipe png,jpg, atau jpeg',
                    'mime_in' => 'masukkan gambar bertipe png,jpg, atau jpeg',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();

            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        };

        // dd('berhasil'); sebelum ke database alangkah baiknya dicoba dulu

        //ambil gambar
        $fileSampul = $this->request->getFile('sampul');

        //is_gambarAda
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {

            //ambil nama file
            $namaSampul = $fileSampul->getName();

            // // generate nama sampul random
            // $namaSampul = $fileSampul->getRandomName();

            //pindahkan file ke assets
            $fileSampul->move('assets/images', $namaSampul);
        };



        $slug = url_title($this->request->getVar('judul'), '-', 'true');
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        //cari gambar
        $komik = $this->komikModel->find($id);

        if ($komik['sampul'] != 'default.jpg') {
            //hapus gambar
            unlink('assets/images/' . $komik['sampul']);
        }

        $this->komikModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('komik/edit', $data);
    }

    public function update($id)
    {

        $komiklama = $this->komikModel->getKomik($this->request->getVar('slug'));

        if ($komiklama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        };

        if (!$this->validate([
            // 'judul' => 'required|is_unique[komik.judul]',
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar tidak boleh lebih dari 1mb',
                    'is_image' => 'masukkan gambar bertipe png,jpg, atau jpeg',
                    'mime_in' => 'masukkan gambar bertipe png,jpg, atau jpeg',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();

            // return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        };

        $fileSampul = $this->request->getFile('sampul');

        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getName();

            $fileSampul->move('assets/images', $namaSampul);

            if ($this->request->getVar('sampulLama') != 'default.jpg') {
                unlink('assets/images/' . $this->request->getVar('sampulLama'));
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', 'true');
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul,

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/komik');
    }
}
