<?php
namespace App\Controllers;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AdminMiddleware;
use App\Models\Pelanggan;

class PelangganController
{
	function __construct()
	{
		new AdminMiddleware;
		$this->pelanggan = new Pelanggan;
	}

	function index()
	{
		$pelanggan = $this->pelanggan->get();
		return view('pelanggan.index',[
			'pelanggan' => $pelanggan
		]);
	}

}