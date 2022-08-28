<?php
$path = plugin_dir_path(__FILE__);
$diretorio = dir($path);

while($arquivo = $diretorio -> read()){
	if($arquivo != '.' && $arquivo != '..'){
		require_once $arquivo;
	}
}
$diretorio -> close();
?>