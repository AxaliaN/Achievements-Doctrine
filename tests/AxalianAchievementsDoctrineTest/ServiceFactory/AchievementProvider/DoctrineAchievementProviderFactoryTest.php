<?php
/**
 * DoctrineAchievementProviderFactoryTest
 *
 * @category  AxalianAchievementsTest\ServiceFactory\AchievementProvider
 * @package   AxalianAchievementsTest\ServiceFactory\AchievementProvider
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsTest\ServiceFactory\AchievementProvider;

use AxalianAchievementsDoctrine\ServiceFactory\AchievementProvider\DoctrineAchievementProviderFactory;
use PHPUnit_Framework_TestCase;

class DoctrineAchievementProviderFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DoctrineAchievementProviderFactory
     */
    protected $providerFactory;

    public function setUp()
    {
        $this->providerFactory = new DoctrineAchievementProviderFactory();
    }

    public function testIfServiceCreated()
    {
        $rootServiceLocatorMock = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceLocatorMock = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $repositoryFactoryMock = \Mockery::mock('AxalianAchievementsDoctrine\ServiceFactory\Repository\RepositoryFactory');

        $repositoryFactoryMock
            ->shouldReceive('createServiceWithName')
            ->with(
                $rootServiceLocatorMock,
                'axalianachievementsdoctrinerepositoryachievementrepository',
                'AxalianAchievementsDoctrine\Repository\AchievementRepository'
            )
            ->andReturn(
                \Mockery::mock('AxalianAchievementsDoctrine\Repository\AchievementRepository')
            );

        $repositoryFactoryMock
            ->shouldReceive('createServiceWithName')
            ->with(
                $rootServiceLocatorMock,
                'axalianachievementsdoctrinerepositorycategoryrepository',
                'AxalianAchievementsDoctrine\Repository\CategoryRepository'
            )
            ->andReturn(
                \Mockery::mock('AxalianAchievementsDoctrine\Repository\CategoryRepository')
            );

        $rootServiceLocatorMock->shouldReceive('get')->with('AxalianAchievementsDoctrine\ServiceFactory\Repository\RepositoryFactory')->andReturn($repositoryFactoryMock);
        $serviceLocatorMock->shouldReceive('getServiceLocator')->andReturn($rootServiceLocatorMock);

        $service = $this->providerFactory->createService($serviceLocatorMock);
    }
}
 