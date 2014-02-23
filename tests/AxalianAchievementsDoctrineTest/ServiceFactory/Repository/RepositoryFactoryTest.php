<?php
/**
 * RepositoryFactoryTest
 *
 * @category  AxalianAchievementsTest\ServiceFactory\Repository
 * @package   AxalianAchievementsTest\ServiceFactory\Repository
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsTest\ServiceFactory\Repository;

use AxalianAchievementsDoctrine\ServiceFactory\Repository\RepositoryFactory;
use PHPUnit_Framework_TestCase;

class RepositoryFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RepositoryFactory
     */
    protected $repositoryFactory;

    public function setUp()
    {
        $this->repositoryFactory = new RepositoryFactory();
    }

    public function testIfCanCreateServiceWithNameReturnsTrue()
    {
        $serviceLocator = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');

        $this->assertTrue($this->repositoryFactory->canCreateServiceWithName($serviceLocator, 'foobarrepositoryfoobarrepository', 'Foo\Bar\Repository\FooBarRepository'));
    }

    public function testIfCanCreateServiceWithNameReturnsFalse()
    {
        $serviceLocator = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');

        $this->assertFalse($this->repositoryFactory->canCreateServiceWithName($serviceLocator, 'foobarentityfoobarentity', 'Foo\Bar\Entity\FooBarEntity'));
    }

    public function testIfCreateServiceWithNameReturnsRepository()
    {
        $repositoryMock = \Mockery::mock('AxalianAchievementsDoctrine\Repository\AchievementRepository');
        $serviceLocator = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $entityManagerMock = \Mockery::mock('Doctrine\ORM\EntityManagerInterface');

        $entityManagerMock->shouldReceive('getRepository')->andReturn($repositoryMock);

        $serviceLocator->shouldReceive('get')->with("doctrine.entitymanager.orm_default")->andReturn($entityManagerMock);

        $repository = $this->repositoryFactory->createServiceWithName($serviceLocator, 'axalianachievementsdoctrinerepositoryachievementrepository', 'AxalianAchievementsDoctrine\Repository\AchievementRepository');

        $this->assertInstanceOf('AxalianAchievementsDoctrine\Repository\AchievementRepository', $repository);
    }
}
 