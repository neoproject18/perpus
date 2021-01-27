<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Date_format
{
	// Tipe Date
	public function full_date_dmy($date)
	{
		if($date != "")
		{
			$ubah = gmdate($date, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tanggal = $pecah[2];
			$bulan = bulan($pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun;
		} return "-";
	}

	public function full_date_dmy2($date)
	{
		if($date != "")
		{
			$ubah = gmdate($date, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tanggal = $pecah[2];
			$bulan = $pecah[1];
			$tahun = $pecah[0];
			return $tanggal.'/'.$bulan.'/'.$tahun;
		} return "-";
	}

	public function short_date_dmy($date)
	{
		if($date != "")
		{
			$ubah = gmdate($date, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tanggal = $pecah[2];
			$bulan = medium_bulan($pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun;
		} return "-";
	}

	public function short_date_dmy2($date)
	{
		if($date != "")
		{
			$ubah = gmdate($date, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tanggal = $pecah[2];
			$bulan = medium_bulan($pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.'/'.$bulan.'/'.$tahun;
		} return "-";
	}

	// TIpe Datetime
	public function full_datetime($datetime)
	{
		if($datetime != "")
		{
			$getDate = date('Y-m-d', strtotime($datetime));
			$getTime = date('H:i:s', strtotime($datetime));
			$pecah = explode("-", $getDate);
			$tanggal = $pecah[2];
			$bulan = bulan($pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun . ' - ' . $getTime;
		} return "-";
	}

	public function short_datetime($datetime)
	{
		if($datetime != "")
		{
			$getDate = date('Y-m-d', strtotime($datetime));
			$getTime = date('H:i:s', strtotime($datetime));
			$pecah = explode("-", $getDate);
			$tanggal = $pecah[2];
			$bulan = medium_bulan($pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun . ' - ' . $getTime;
		} return "-";
	}

	public function full_datetime_dmy($datetime)
	{
		if($datetime != "")
		{
			$getDate = date('Y-m-d', strtotime($datetime));
			$getTime = date('H:i:s', strtotime($datetime));
			$pecah = explode("-", $getDate);
			$tanggal = $pecah[2];
			$bulan = bulan($pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun;
		} return "-";
	}

	public function short_datetime_dmy($datetime)
	{
		if($datetime != "")
		{
			$getDate = date('Y-m-d', strtotime($datetime));
			$getTime = date('H:i:s', strtotime($datetime));
			$pecah = explode("-", $getDate);
			$tanggal = $pecah[2];
			$bulan = medium_bulan($pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun;
		} return "-";
	}

	// Full Tanggal Indonesia
	public function longdatetime_indo($datetime)
	{
		if($datetime != "")
		{
			$getDate = date('Y-m-d', strtotime($datetime));
			$getTime = date('H:i:s', strtotime($datetime));
			$pecah = explode("-", $getDate);
			$tanggal = $pecah[2];
			$bulan = bulan($pecah[1]);
			$tahun = $pecah[0];

			$nama_hari = nama_hari($getDate);
			return $nama_hari.', '.$tanggal.' '.$bulan.' '.$tahun;
		} return "-";
	}

	public function longdate_indo($tanggal)
	{
		if($tanggal != "")
		{
			$ubah = gmdate($tanggal, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$date = $pecah[2];
			$bln = $pecah[1];
			$thn = $pecah[0];
			$bulan = bulan($pecah[1]);

			$nama_hari = nama_hari($ubah);
			return $nama_hari.', '.$date.' '.$bulan.' '.$thn;
		}
		return "-";
	}

	public function bulan($bln)
	{
		switch ($bln)
		{
			case 1: return "Januari"; break;
			case 2: return "Februari"; break;
			case 3: return "Maret"; break;
			case 4: return "April"; break;
			case 5: return "Mei"; break;
			case 6: return "Juni"; break;
			case 7: return "Juli"; break;
			case 8: return "Agustus"; break;
			case 9: return "September"; break;
			case 10: return "Oktober"; break;
			case 11: return "November"; break;
			case 12: return "Desember"; break;
		}
	}

	public function medium_bulan($bln)
	{
		switch ($bln)
		{
			case 1: return "Jan"; break;
			case 2: return "Feb"; break;
			case 3: return "Mar"; break;
			case 4: return "Apr"; break;
			case 5: return "Mei"; break;
			case 6: return "Jun"; break;
			case 7: return "Jul"; break;
			case 8: return "Ags"; break;
			case 9: return "Sep"; break;
			case 10: return "Okt"; break;
			case 11: return "Nov"; break;
			case 12: return "Des"; break;
		}
	}

	public function nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$date = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$date,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}

	private function hitung_mundur($wkt)
	{
		$waktu=array(	365*24*60*60	=> "tahun",
			30*24*60*60		=> "bulan",
			7*24*60*60		=> "minggu",
			24*60*60		=> "hari",
			60*60			=> "jam",
			60				=> "menit",
			1				=> "detik");

		$hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
		$hasil = array();
		if($hitung<5)
		{
			$hasil = 'kurang dari 5 detik yang lalu';
		}
		else
		{
			$stop = 0;
			foreach($waktu as $periode => $satuan)
			{
				if($stop>=6 || ($stop>0 && $periode<60)) break;
				$bagi = floor($hitung/$periode);
				if($bagi > 0)
				{
					$hasil[] = $bagi.' '.$satuan;
					$hitung -= $bagi*$periode;
					$stop++;
				}
				else if($stop>0) $stop++;
			}
			$hasil=implode(' ',$hasil).' yang lalu';
		}
		return $hasil;
	}
}