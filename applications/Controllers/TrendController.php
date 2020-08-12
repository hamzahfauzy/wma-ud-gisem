<?php
namespace App\Controllers;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AdminMiddleware;
use App\Models\Trend;

class TrendController
{
	function __construct()
	{
		new AdminMiddleware;
		$this->trend = new Trend;
	}

	function index()
	{
		$trend = $this->trend->orderby('tahun','asc, bulan asc')->get();
		return view('trend.index',[
			'trend' => $trend
		]);
	}

	function tambah()
	{
		$request = request()->post();
		if($request)
		{
			$this->trend->save([
				'bulan' => $request->bulan,
				'tahun' => $request->tahun,
				'jumlah' => $request->jumlah
			]);
			session()->set('success','Trend Data Penjualan Berhasil di Simpan');
			redirect('/trend');
			return;
		}
		return view('trend.tambah');
	}

	function edit($id)
	{
		$request = request()->post();
		$trend = $this->trend->find($id);
		if($request)
		{
			$trend->save([
				'bulan' => $request->bulan,
				'tahun' => $request->tahun,
				'jumlah' => $request->jumlah
			]);
			session()->set('success','Trend Data Penjualan Berhasil di Update');
			redirect('/trend');
			return;
		}
		return view('trend.edit',[
			'trend' => $trend
		]);
	}

	function hapus($id)
	{
		$trend = $this->trend->delete($id);
		session()->set('success','Trend Data Penjualan Berhasil di Hapus');
		redirect('/trend');
	}

	function hasil()
	{
		$trend = $this->trend->orderby('tahun','asc, bulan asc')->get();
		return view('trend.hasil',[
			'trend' => $trend
		]);
	}
}