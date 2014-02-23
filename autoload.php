<?php
/**
 * Setup autoloading
 */

include_once __DIR__ . '/../../autoload.php';

$loader = new Zend\Loader\StandardAutoloader(
    array(
        Zend\Loader\StandardAutoloader::LOAD_NS => array(
            'AxalianAchievementsDoctrine' => __DIR__ . '/src/AxalianAchievementsDoctrine',
            'AxalianAchievementsDoctrineTest' => __DIR__ . '/tests/AxalianAchievementsDoctrineTest',
        ),
    )
);
$loader->register();