<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function debug($data, $isDie = true, $html = false) {
        if ($html) echo '<pre>' . var_export($data, return: true) . '</pre>';
        else echo "\n" . var_export($data, true) . "\n";
        if ($isDie) {
            die();
        }
    }
    $realpath = realpath('');
    include($realpath . '/autoload.php');

    $trees = [];
    // инициализируем деревья
    foreach ($config['trees_count'] as $trees_type => $trees_count) {
        for ($i = 0; $i < $trees_count; $i++) {
            $tree = new tree($trees_type, $config);
            array_push($trees, $tree->get_tree_data());
        }
    }

    $robot = new robot($trees);
    // общее количество собранных фруктов
    $result = $robot->get_fruits_count();
    echo("Было собрано фруктов\n");
    echo("    яблок: " . $result['apples_count'] . " шт\n");
    echo("    груш : " . $result['pears_count'] . " шт\n");
    echo("    всего: " . $result['fruits_count'] . " шт\n");

    // общий вес собранных фруктов каждого вида
    $result = $robot->get_fruits_wieght();
    echo("Вес всех фруктов\n");
    echo("    яблок: " . $result['apples_weight'] . " гр\n");
    echo("    груш : " . $result['pears_weight'] . " гр\n");
    echo("    всего: " . $result['fruits_weight'] . " гр\n");

    // самый тяжелый фрукт
    $result = $robot->get_heaviest_fruit();
    echo("Самый тяжелый фрукт: ");
    switch ($result['tree_type']) {
        case 'pear':
            echo("груша ");
            break;
        case 'apple':
            echo("яблоко ");
            break;
    }
    echo($result['fruit_weight'] . " (id дерева: " . $result['tree_id'] . ")\n");