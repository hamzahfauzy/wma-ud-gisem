<?php
namespace App\Controllers;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AdminMiddleware;
use App\Models\Stok;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Trend;

class HomeController
{
	function __construct()
	{
		// new AdminMiddleware;
		$this->stok = new Stok;
		$this->trend = new Trend;
		$this->transaksi = new Transaksi;
		$this->pelanggan = new Pelanggan;
	}

	function index()
	{
		if(!session()->get('id'))
		{
			redirect('/auth/login');
			return;
		}
		return view("home.index",[
			'stok'  => $this->stok->orderby('tanggal','desc')->first(),
			'trend' => $this->trend->count(),
			'transaksi' => $this->transaksi->count(),
			'pelanggan' => $this->pelanggan->count(),
		]);
	}
}