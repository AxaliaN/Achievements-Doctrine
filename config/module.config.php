<?php
/**
 * AxalianAchievements Configuration
 *
 * @category  AxalianAchievements
 * @package
 * @author    Michel Maas <michel@michelmaas.com>
 */
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => [
        'driver' => [
            'axalian_achievements_doctrine_driver' =>[
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => [
                    __DIR__ .'/../src/AxalianAchievementsDoctrine/Entity'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'AxalianAchievementsDoctrine\Entity'  =>  'axalian_achievements_doctrine_driver'
                ]
            ]
        ],
    ],
);