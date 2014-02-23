<?php
/**
 * Module
 *
 * @category  AxalianAchievements
 * @package   AxalianAchievements
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsDoctrine;

use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ServiceProviderInterface
{

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }


    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'AxalianAchievementsDoctrine\AchievementProvider\DoctrineAchievementRepository' => 'AxalianAchievementsDoctrine\ServiceFactory\AchievementProvider\DoctrineAchievementRepositoryFactory',
                'AxalianAchievementsDoctrine\Repository\AchievementRepository' => 'AxalianAchievementsDoctrine\Repository\AchievementRepository',
                'AxalianAchievementsDoctrine\Repository\CategoryRepository' => 'AxalianAchievementsDoctrine\Repository\CategoryRepository',
            ),
            'abstract_factories' => array(
                'AxalianAchievementsDoctrine\ServiceFactory\Repository\RepositoryFactory',
            ),
            'invokables' => array(
                'AxalianAchievementsDoctrine\ServiceFactory\Repository\RepositoryFactory' => 'AxalianAchievementsDoctrine\ServiceFactory\Repository\RepositoryFactory',
            )
        );
    }
}
