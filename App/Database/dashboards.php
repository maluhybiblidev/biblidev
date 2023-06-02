<?php
require_once '../auth.php';
require_once '../Models/dashboards.class.php';

$Post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$PostFilters = array_map("strip_tags", $Post);

if ($PostFilters['identCall'] == 'getLocacaoLivros'){
	$FilterStartDate = $PostFilters['filterStartDate'];
	$FilterEndDate = $PostFilters['filterEndDate'];
	
	$resp_json = $dashboards->GetLocacaoLivros($FilterStartDate,$FilterEndDate);
	$message = json_decode($resp_json, true);
	
	echo json_encode($message);

} elseif ($PostFilters['identCall'] == 'getLivrosLocados') {
	
	$resp_json = $dashboards->GetLivrosLocados();
	$message = json_decode($resp_json, true);
	
	echo json_encode($message);	
}