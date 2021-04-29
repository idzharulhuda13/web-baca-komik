<?php

namespace App\Controllers;

use App\Models\PengunjungModel;

class Pengunjung extends BaseController
{
    //memanggil database komik menggunakan model
    protected $pengunjungModel;
    public function __construct()
    {
        $this->pengunjungModel = new PengunjungModel();
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_pengunjung') ? $this->request->getVar('page_pengunjung') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $pengunjung = $this->pengunjungModel->search($keyword);
        } else {
            $pengunjung = $this->pengunjungModel;
        };

        $data = [
            'title' => 'Daftar Komik',
            // 'pengunjung' => $this->pengunjungModel->findAll()
            'pengunjung' => $pengunjung->paginate(10, 'pengunjung'),
            'pager' => $pengunjung->pager,
            'currentPage' => $currentPage,
        ];

        return view('pengunjung/index', $data);
    }
}
