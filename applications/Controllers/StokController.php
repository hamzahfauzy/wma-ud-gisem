<?php
namespace App\Controllers;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AdminMiddleware;
use App\Models\Stok;

class StokController
{
	function __construct()
	{
		new AdminMiddleware;
		$this->stok = new Stok;
	}

	function index()
	{
		return view('stok.index',[
			'stok' => $this->stok->orderby('tanggal','desc')->get()
		]);
	}

	function tambah()
	{
		$request = request()->post();
		if($request)
		{
			$current_stok = Stok::orderby('tanggal','desc')->first();
			$jumlah = 0;
			if(!empty($current_stok))
				$jumlah = $current_stok->jumlah;
			$stok = $this->stok->save([
				'jumlah' => $request->jumlah,
				'sisa'   => $jumlah+$request->jumlah,
				'keterangan' => 'penambahan stok',
				'tanggal' => date('Y-m-d H:i:s')
			]);
			session()->set('success','Stok Berhasil di Update');
			redirect('/stok');
			return;
		}
		return view('stok.tambah');
	}
}