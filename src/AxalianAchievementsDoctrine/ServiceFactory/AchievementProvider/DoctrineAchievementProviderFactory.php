<?php
/**
 * DoctrineAchievementsProviderFactory
 *
 * @category  AxalianAchievementsDoctrine\ServiceFactory\AchievementsProvider
 * @package   AxalianAchievementsDoctrine\ServiceFactory\AchievementsProvider
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsDoctrine\ServiceFactory\AchievementProvider;

use AxalianAchievementsDoctrine\AchievementProvider\DoctrineAchievementProvider;
use AxalianAchievementsDoctrine\Repository\AchievementRepository;
use AxalianAchievementsDoctrine\Repository\CategoryRepository;
use AxalianAchievementsDoctrine\ServiceFactory\Repository\RepositoryFactory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DoctrineAchievementProviderFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return DoctrineAchievementProvider
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var ServiceLocatorInterface $rootServiceLocator */
        $rootServiceLocator = $serviceLocator->getServiceLocator();

        /** @var RepositoryFactory $abstractFactory */
        $abstractFactory = $rootServiceLocator->get(
            'AxalianAchievementsDoctrine\ServiceFactory\Repository\RepositoryFactory'
        );

        /** @var AchievementRepository $achievementRepository */
        $achievementRepository = $abstractFactory->createServiceWithName(
            $rootServiceLocator,
            'axalianachievementsdoctrinerepositoryachievementrepository',
            'AxalianAchievementsDoctrine\Repository\AchievementRepository'
        );

        /** @var CategoryRepository $categoryRepository */
        $categoryRepository = $abstractFactory->createServiceWithName(
            $rootServiceLocator,
            'axalianachievementsdoctrinerepositorycategoryrepository',
            'AxalianAchievementsDoctrine\Repository\CategoryRepository'
        );

        return new DoctrineAchievementProvider($achievementRepository, $categoryRepository);
    }
}
