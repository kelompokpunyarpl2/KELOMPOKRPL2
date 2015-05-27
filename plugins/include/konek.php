<?PHP
	$conn=pg_connect("host=localhost port=5432 dbname=RPL user=postgres password=08126749280");
	function ganti($a)
	{
		$name=str_replace("'","&#768;",$a);
		return $name;
	}
?>