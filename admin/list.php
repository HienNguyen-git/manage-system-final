<?php 
    $countries = array (
        'Vietnam',
        'Laos',
        'ThaiLand',
        'Campochia',
        'China',
        'Singapore'
    );

    $res = array();
    if(isset($_GET['search-text'])){
        $res = array_filter($countries, function($country){
            return strpos($country,$_GET['search-text']);
        });
    }
    echo json_encode(array_values($res));
?>