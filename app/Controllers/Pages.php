<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Tutorial_11',
            'tes' => ['satu', 'dua', 'tigas'],
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me | Tutorial_11'
        ];
        echo view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us | Tutorial_11',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. jalan',
                    'kota' => 'bandung'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'Jl. kantor',
                    'kota' => 'bandung'
                ],
            ]
        ];
        return view('pages/contact', $data);
    }
}
