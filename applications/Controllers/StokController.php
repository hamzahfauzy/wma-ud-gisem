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
		$request = request()->post();
		if($request)
		{
			$stok = $this->stok->save([
				'jumlah' => $request->jumlah,
				'tanggal' => date('Y-m-d H:i:s')
			]);
			session()->set('success','Stok Berhasil di Update');
			redirect('/stok');
			return;
		}
		$stok = $this->stok->orderby('tanggal','desc')->first();
		return view('stok.index',[
			'stok' => $stok
		]);
	}
}