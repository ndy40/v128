<?php
    if(!defined('XML')) 
        define('XML', '_xml');
    if(!defined('DB')) 
        define('DB', '_db');
    
    //$db_type = XML;
	$db_type = "_db";
	//echo $_SERVER['DOCUMENT_ROOT'];
    $baseUrl =  "http://".$_SERVER['HTTP_HOST']."/Sites/v12.8/"; 
    $documentRoot = $_SERVER['DOCUMENT_ROOT'] ; 
	$assetsUrl = "http://".$_SERVER['HTTP_HOST']. "/Sites/v12.8/assets/";
	//Get environment variable from AppFog for db parameters
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
	$databaseName = "rchdb";//$mysql_config["name"];
	$databaseUrl = "localhost"; //$mysql_config["hostname"];
	$databaseLoginId = "root"; //$mysql_config["username"];
	$databaseLoginPassword = "mysql"; //$mysql_config["password"];
	$group_url = "https://www.facebook.com/groups/saloneheritage/";
	
	// ARCODB = 
		//App ID/API Key: 198579593521219	
		//App Secret: 6f45ae533ff7fc0b856bbcd6d13576f9
	
	$AppId = '110061579084393';// Sierra leone heritage id '441476852570053';
	$AppSecret = '49d12e5c8efd9f5bdc4f49db75348a3f'; // Sierra leone heritage secrete key '4be40f9897bd061e6a44e78d0b2b0817';
	$PageId = '473379929370894';//'637319982949707';// Sierraleoneheritage group id: '473379929370894';// Sierra leone heritage fan page id: '104060172993181';
	/*
	//Photogallery application (not this is used temporarily
	//App ID/API Key: 140491396014630
	// App Secret: 4f8c129ea4acdf3ccbbd8fea91baa7c9
	
	
	$AppId = '140491396014630';
	$AppSecret = '4f8c129ea4acdf3ccbbd8fea91baa7c9';
	$PageId = '104060172993181';
	*/
    
?>
