<?php
/**
 * DoctrineStorageAdapterTest
 *
 * @category  AxalianAchievementsTest\StorageAdapter
 * @package   AxalianAchievementsTest\StorageAdapter
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsTest\StorageAdapter;

use AxalianAchievementsDoctrine\StorageAdapter\DoctrineStorageAdapter;
use Mockery\Mock;
use PHPUnit_Framework_TestCase;

class DoctrineStorageAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DoctrineStorageAdapter
     */
    protected $adapter;

    /**
     * @var Mock
     */
    protected $user;

    public function setUp()
    {
        $userAchievementRepositoryMock = \Mockery::mock('AxalianAchievementsDoctrine\Repository\UserAchievementRepository');
        $entityManagerMock = \Mockery::mock('Doctrine\ORM\EntityManager');

        $entityManagerMock->shouldReceive('persist')->getMock();
        $entityManagerMock->shouldReceive('flush')->getMock();
        $entityManagerMock->shouldReceive('clear')->getMock();
        $entityManagerMock->shouldReceive('remove')->getMock();

        $this->user = \Mockery::mock('AxalianAchievements\User\UserInterface')->shouldReceive('getUserID')->andReturn(1)->getMock();

        $this->adapter = new DoctrineStorageAdapter($userAchievementRepositoryMock, $entityManagerMock);
    }

    public function testIfConstructsCorrectly()
    {
        $this->assertInstanceOf('AxalianAchievementsDoctrine\Repository\UserAchievementRepository', $this->adapter->getUserAchievementRepository());
        $this->assertInstanceOf('Doctrine\ORM\EntityManager', $this->adapter->getEntityManager());
    }

    public function testIfGetAchievementsForUserReturnsAchievements()
    {
        $expectedAchievements = array(
            \Mockery::mock('AxalianAchievementsDoctrine\Entity\UserAchievement'),
            \Mockery::mock('AxalianAchievementsDoctrine\Entity\UserAchievement')
        );

        $this->adapter->getUserAchievementRepository()->shouldReceive('findBy')->andReturn($expectedAchievements)->getMock();

        $achievements = $this->adapter->getAchievementsForUser($this->user);

        $this->assertEquals($expectedAchievements, $achievements);
    }

    public function testIfAchievementCanBeAwardedOnValidAchievement()
    {
        $achievement = \Mockery::mock('AxalianAchievementsDoctrine\Entity\Achievement');
        $this->adapter->getUserAchievementRepository()->shouldReceive('findBy')->andReturn($achievement);

        $this->assertTrue($this->adapter->awardAchievementToUser($achievement, $this->user));
    }

    public function testIfAchievementCanBeRemovedOnValidAchievement()
    {
        $achievement = \Mockery::mock('AxalianAchievementsDoctrine\Entity\Achievement');
        $this->adapter->getUserAchievementRepository()->shouldReceive('findOneBy')->andReturn($achievement);

        $this->assertTrue($this->adapter->removeAchievementFromUser($achievement, $this->user));
    }

    /**
     * @expectedException \AxalianAchievementsDoctrine\Exception\EntityNotFoundException
     * @expectedExceptionMessage Entity was not found
     */
    public function testIfExceptionThrownWhenAchievementNotFoundOnRemove()
    {
        $achievement = \Mockery::mock('AxalianAchievementsDoctrine\Entity\Achievement');
        $this->adapter->getUserAchievementRepository()->shouldReceive('findOneBy')->andReturn(null);

        $this->assertTrue($this->adapter->removeAchievementFromUser($achievement, $this->user));
    }
}
