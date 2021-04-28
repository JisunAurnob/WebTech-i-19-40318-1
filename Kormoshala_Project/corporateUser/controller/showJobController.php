<?php 

require_once ('../model/model.php');

function fetchAllJobs($tableName){
	return showAllJob($tableName);

}

function fetchJob($tableName, $id){
	return showJob($tableName, $id);

}