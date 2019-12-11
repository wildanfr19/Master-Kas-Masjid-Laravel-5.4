<?php  


if (!function_exists('format_rupiah')) {
	function format_rupiah($amount)
	{
		 return number_format($amount, 0, "Rp. ,",".");
	}


}
