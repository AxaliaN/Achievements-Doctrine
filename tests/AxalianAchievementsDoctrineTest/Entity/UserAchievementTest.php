<?php
/**
 * UserAchievementTest
 *
 * @category  AxalianAchievementsTest\Entity
 * @package   AxalianAchievementsTest\Entity
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsTest\Entity;

use AxalianAchievementsDoctrine\Entity\UserAchievement;
use PHPUnit_Framework_TestCase;

class UserAchievementTest extends PHPUnit_Framework_TestCase
{
    public function testGettersAndSetters()
    {
        $entity = new UserAchievement();

        $achievement = \Mockery::mock('AxalianAchievementsDoctrine\Entity\Achievement');

        $entity->setUserAchievementID(1)
               ->setAchievement($achievement)
               ->setUserID(2)
               ->setCreatedAt(new \DateTime('02-12-1984 07:00:00'))
               ->setUpdatedAt(new \DateTime('02-12-2014 07:00:00'));

        $this->assertEquals(1, $entity->getUserAchievementID());
        $this->assertEquals($achievement, $entity->getAchievement());
        $this->assertEquals(2, $entity->getUserID());
        $this->assertEquals(new \DateTime('02-12-1984 07:00:00'), $entity->getCreatedAt());
        $this->assertEquals(new \DateTime('02-12-2014 07:00:00'), $entity->getUpdatedAt());
    }
}
