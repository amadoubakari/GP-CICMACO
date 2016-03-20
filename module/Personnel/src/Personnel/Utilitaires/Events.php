<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Personnel\Utilitaires;

require '../Utilitaires/Evenements.php';
require PDO::class;

$db = new PDO('mysql:host=localhost;dbname=cicmaoc', 'root', '');
$evenements = new Evenements($db);

$events = $evenements->getAllEvenements();

foreach ($events as $event) {
    echo $event['type'];
}