<?php
require 'lib/nusoap.php'; //include file for nusoap server functions
require 'db_connection.php'; //include file for function to be registered (fetch)

$server = new nusoap_server(); // create a instance for nusoap server
$server->configureWSDL("Fetch The Service","urn:students"); // configure WSDL file
$server->register(
    $name = 'fetch',   //name of function
    $in = array('admNo' => 'xsd:string'), //input values
    $out = array('return' =>'xsd:string'), //output values
    $namespace = 'urn:fetchDetailswsdl',  //service namespace
    $soapaction ='urn:fetchDetailswsdl#fetch',  //SOAPAction
    $style = 'rpc',       //style
    $documentation = 'Function to fetch student details based on their admission number' //service description
);

$server->service(file_get_contents("php://input")); //process request from input (admNo from search form)
