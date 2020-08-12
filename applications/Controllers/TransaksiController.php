<?php
namespace App\Controllers;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AdminMiddleware;
use App\Models\Stok;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Trend;

class TransaksiController
{
	function __construct()
	{
		new AdminMiddleware;
		$this->stok = new Stok;
		$this->trend = new Trend;
		$this->transaksi = new Transaksi;
		$this->pelanggan = new Pelanggan;
	}

	function index()
	{
		$transaksi = $this->transaksi->orderby('tanggal','desc')->get();
		return view('transaksi.index',[
			'transaksi' => $transaksi
		]);
	}

	function tambah()
	{
		$request = request()->post();
		if($request)
		{
			$pelanggan = $this->pelanggan->save([
				'nama' => $request->nama
			]);

			$transaksi = $this->transaksi->save([
				'id_pelanggan' => $pelanggan,
				'jumlah'       => $request->jumlah,
				'tanggal'      => date('Y-m-d H:i:s')
			]);

			$stok = $this->stok->orderby('tanggal','desc')->first();
			$stok->save([
				'jumlah' => $stok->jumlah - $request->jumlah
			]);

			$trend = Trend::where('bulan',date('m'))->where('tahun',date('Y'))->first();
			if(empty($trend))
			{
				$this->trend->save([
					'bulan' => date('m'),
					'tahun' => date('Y'),
					'jumlah' => $request->jumlah
				]);
			}
			else
			{
				$trend->save([
					'bulan' => date('m'),
					'tahun' => date('Y'),
					'jumlah' => $trend->jumlah+$request->jumlah
				]);
			}

			session()->set('success','Transaksi Berhasil di Simpan');
			redirect('/transaksi');
			return;
		}
		return view('transaksi.tambah');
	}
}