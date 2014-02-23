<?php
/**
 * DoctrineAchievementProviderTest
 *
 * @category  AxalianAchievementsTest\AchievementProvider
 * @package   AxalianAchievementsTest\AchievementProvider
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsTest\AchievementProvider;

use AxalianAchievementsDoctrine\AchievementProvider\DoctrineAchievementProvider;
use AxalianAchievementsDoctrine\Entity\Achievement;
use AxalianAchievementsDoctrine\Entity\Category;
use PHPUnit_Framework_TestCase;

class DoctrineAchievementProviderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DoctrineAchievementProvider
     */
    protected $provider;

    public function setUp()
    {
        $achievementRepository = \Mockery::mock('AxalianAchievementsDoctrine\Repository\AchievementRepository');
        $categoryRepository = \Mockery::mock('AxalianAchievementsDoctrine\Repository\CategoryRepository');

        $this->provider = new DoctrineAchievementProvider($achievementRepository, $categoryRepository);
    }

    public function testIfAchievementsCanBeRetrieved()
    {
        $achievement1 = new Achievement(1, array());
        $achievement2 = new Achievement(2, array());

        $expectedAchievements = array(
            1 => $achievement1,
            2 => $achievement2
        );

        $this->provider->getAchievementRepository()->shouldReceive('findAll')->andReturn($expectedAchievements);

        $achievements = $this->provider->getAchievements();

        $this->assertEquals($expectedAchievements, $achievements);
    }

    public function testIfCategoriesCanBeRetrieved()
    {
        $category1 = new Category(1, array());
        $category2 = new Category(2, array());

        $expectedCategories = array(
            1 => $category1,
            2 => $category2
        );

        $this->provider->getCategoryRepository()->shouldReceive('findAll')->andReturn($expectedCategories);

        $categories = $this->provider->getCategories();

        $this->assertEquals($expectedCategories, $categories);
    }
}
 