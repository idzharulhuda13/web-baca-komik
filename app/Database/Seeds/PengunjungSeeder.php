<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PengunjungSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama' => 'Idzharul Huda',
				'alamat'    => 'huda.huda@huda.com',
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			],
			[
				'nama' => 'Huda',
				'alamat'    => 'huda@huda.com',
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			],
			[
				'nama' => 'idzharul',
				'alamat'    => 'idzharul@huda.com',
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			],
		];

		// Simple Queries
		// $this->db->query("INSERT INTO pengunjung (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)", $data);

		// Using Query Builder
		// $this->db->table('pengunjung')->insert($data);
		$this->db->table('pengunjung')->insertBatch($data);
		//insert cuma bisa masukkin satu data diakalin pake looping atau cari query buat masukkin banyak

		//buat data banyak pake faker, cari faker library tapi gabisa dipake di php8
	}
}
