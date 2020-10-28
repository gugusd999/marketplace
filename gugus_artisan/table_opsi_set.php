<?php 


function ai($value='')
{
	return 'INT('.$value.') AUTO_INCREMENT PRIMARY KEY';
}

function char($value='')
{
	return 'VARCHAR('.$value.')';
}

function text()
{
	return 'TEXT';
}

function textlong()
{
	return 'LONGTEXT';
}