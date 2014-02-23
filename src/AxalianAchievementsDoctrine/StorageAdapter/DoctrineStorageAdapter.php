<?php
/**
 * DoctrineStorageAdapter
 *
 * @category  AxalianAchievementsDoctrine\StorageAdapter
 * @package   AxalianAchievementsDoctrine\StorageAdapter
 * @author    Michel Maas <michel@michelmaas.com>
 */
 

namespace AxalianAchievementsDoctrine\StorageAdapter;


use AxalianAchievements\Entity\Achievement;
use AxalianAchievements\StorageAdapter\StorageAdapterInterface;
use AxalianAchievements\User\UserInterface;

class DoctrineStorageAdapter implements StorageAdapterInterface
{

    /**
     * @param UserInterface $user
     * @return array
     */
    public function getAchievementsForUser(UserInterface $user)
    {
        // TODO: Implement getAchievementsForUser() method.
    }

    /**
     * @param UserInterface $user
     * @param Achievement $achievement
     * @return bool
     */
    public function awardAchievementToUser(Achievement $achievement, UserInterface $user)
    {
        // TODO: Implement awardAchievementToUser() method.
    }

    /**
     * @param UserInterface $user
     * @param Achievement $achievement
     * @return bool
     */
    public function removeAchievementFromUser(Achievement $achievement, UserInterface $user)
    {
        // TODO: Implement removeAchievementFromUser() method.
    }
}
 