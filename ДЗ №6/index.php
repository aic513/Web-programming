<?php

//Прописали UTF-8 хедер,чтобы распозновал кодировку
header('Content-type: text/html; charset=utf-8');

//Настроили распознование всех ошибок с выводом на экран
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

// Подключили файл с функциями с помощью инструкции require_once
//т.к. при каждом использовании команды require - она (инструкция require_once)
//снова вставит нужный файл, даже если он уже был вставлен 
require_once 'functions.php';
require_once 'data-info.php';

session_start();

