<?php
/**
 * DoctrineStorageAdapterFactoryTest
 *
 * @category  AxalianAchievementsTest\ServiceFactory\StorageAdapter
 * @package   AxalianAchievementsTest\ServiceFactory\StorageAdapter
 * @author    Michel Maas <michel@michelmaas.com>
 */
 
namespace AxalianAchievementsTest\ServiceFactory\StorageAdapter;

use AxalianAchievementsDoctrine\ServiceFactory\StorageAdapter\DoctrineStorageAdapterFactory;
use PHPUnit_Framework_TestCase;

class DoctrineStorageAdapterFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DoctrineStorageAdapterFactory
     */
    protected $adapterFactory;

    public function setUp()
    {
        $this->adapterFactory = new DoctrineStorageAdapterFactory();
    }

    public function testIfServiceCreated()
    {
        $serviceLocatorMock = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');

        $serviceLocatorMock->shouldReceive('get')
                           ->with('AxalianAchievementsDoctrine\Repository\UserAchievementRepository')
                           ->andReturn(
                               \Mockery::mock('AxalianAchievementsDoctrine\Repository\UserAchievementRepository')
                           )
                           ->getMock();


        $serviceLocatorMock->shouldReceive('get')
            ->with('Doctrine\ORM\EntityManager')
            ->andReturn(\Mockery::mock('Doctrine\ORM\EntityManager'))
            ->getMock();

        $service = $this->adapterFactory->createService($serviceLocatorMock);

        $this->assertInstanceOf('AxalianAchievementsDoctrine\StorageAdapter\DoctrineStorageAdapter', $service);
    }
}
