<?php
/**
 * DoctrineStorageAdapterFactory
 *
 * @category  AxalianAchievementsDoctrine\ServiceFactory\StorageAdapter
 * @package   AxalianAchievementsDoctrine\ServiceFactory\StorageAdapter
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsDoctrine\ServiceFactory\StorageAdapter;

use AxalianAchievementsDoctrine\Repository\UserAchievementRepository;
use AxalianAchievementsDoctrine\StorageAdapter\DoctrineStorageAdapter;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DoctrineStorageAdapterFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var UserAchievementRepository $userAchievementRepository */
        $userAchievementRepository = $serviceLocator->get(
            'AxalianAchievementsDoctrine\Repository\UserAchievementRepository'
        );

        /** @var EntityManager $entityManager */
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');

        return new DoctrineStorageAdapter($userAchievementRepository, $entityManager);
    }
}
