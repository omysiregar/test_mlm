<?php
function currencyToNumber($x) {
    $cvt = 0;
    if (!empty($x)) {
        $cvt = str_replace(",", ".", str_replace(".", "", $x));
    }
    return $cvt;
}

function numberToCurrency($jml) {
    $dcm_cvt = explode('.', $jml);
    $dcm_param = 0;
    if (count($dcm_cvt) == 2) {
        if (strlen((int) $dcm_cvt[1]) > 3) {
            $dcm_param = 3;
        } else {
            if ((int) $dcm_cvt[1] > 0) {
                $dcm_param = strlen($dcm_cvt[1]);
            }
        }
    }
    $int = empty($jml) ? 0 : number_format($jml, $dcm_param, ',', '.');
    return $int;
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   
        'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal); 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil;
}
 
if( ! function_exists('implode_array_elements') )
{
	function implode_array_elements($array,$delimiter,$elemen)
	{
		$result = '';
		
		if ( ! is_array($array))
		{
			$array = array($array);
		}
		
		$no=0;
		foreach ($array as $key=>$value)
		{
			if($elemen == 'key')
			{
				if (isset($key))
				{
					$result .= ((empty($no)) ? '':$delimiter) . $key;
					++$no;
				}
			}
			else
			{
				if (isset($value))
				{
					$result .= ((empty($no)) ? '':$delimiter) . $value;
					++$no;
				}
			}
			
		}

		return $result;
	}
}

if( ! function_exists('time_format') )
{
	function time_format($time,$format=NULL)
	{
		$result = '';
		$format = (($format == NULL) ? 'H:i' : $format );
		$result = date($format, strtotime($time));
		return $result;
	}
}

if( ! function_exists('diff_datetime') )
{
	function diff_datetime($start,$end,$get_format)
	{
		$start = new DateTime($start);
		$end = new DateTime($end);
		$interval = $start->diff($end);
		$result = $interval->format($get_format);
		return $result;
	}
}

if( ! function_exists('dateformat') )
{
	function dateformat($date,$format=NULL)
	{
		$result = '';
		$format = (($format == NULL) ? 'd/m/Y' : $format );
		$result = date($format, strtotime($date));
		return $result;
	}
}

if( ! function_exists('generate_qrcode') )
{
	function generate_qrcode($params)
	{
		$CI =& get_instance();		
		//generate qr code
        $qrcode_path= $params['patch'];    
        $qrcode_name= $params['name'];
        $CI->ciqrcode->initialize(array(
            'imagedir' => $qrcode_path,
            'size' => '5',
            'black'=> array(224,255,255),
            'white'=> array(70,130,180)
        ));

        $qr_data = $params['data'];

		//reset params
		$params = array();

        $params['data']  = $qr_data; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size']  = 1.6;
        $params['savename'] = FCPATH.$qrcode_path.$qrcode_name; //simpan image QR CODE ke folder 
        $CI->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        //end generate qrcode
	}

}