<?php 

    $autoload = [
        '' => ['/config.php'],
        '/engine' => ['/tree.php', '/apple_tree.php', '/pear_tree.php', '/apple.php', '/pear.php', '/robot.php']
    ];

    foreach ($autoload as $dir => $files) {
        foreach ($files as $key => $file) {
            $path = $realpath . $dir . $file;
            include($path);
        }
    }