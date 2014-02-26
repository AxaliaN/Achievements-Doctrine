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
use AxalianAchievementsDoctrine\Entity\UserAchievement;
use AxalianAchievementsDoctrine\Exception\EntityNotFoundException;
use AxalianAchievementsDoctrine\Repository\UserAchievementRepository;
use Doctrine\ORM\EntityManager;

class DoctrineStorageAdapter implements StorageAdapterInterface
{
    /**
     * @var UserAchievementRepository
     */
    protected $userAchievementRepository;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @param UserAchievementRepository $userAchievementRepository
     * @param EntityManager $entityManager
     */
    public function __construct(UserAchievementRepository $userAchievementRepository, EntityManager $entityManager)
    {
        $this->setUserAchievementRepository($userAchievementRepository);
        $this->setEntityManager($entityManager);
    }

    /**
     * @param UserInterface $user
     * @return array
     */
    public function getAchievementsForUser(UserInterface $user)
    {
        return $this->getUserAchievementRepository()->findBy(
            array(
                'userID' => $user->getUserID()
            )
        );
    }

    /**
     * @param UserInterface $user
     * @param Achievement $achievement
     * @return bool
     */
    public function awardAchievementToUser(Achievement $achievement, UserInterface $user)
    {
        $userAchievement = new UserAchievement();
        $userAchievement->setUserID($user->getUserID())
                        ->setAchievement($achievement);

        $this->getEntityManager()->persist($userAchievement);
        $this->getEntityManager()->flush();
        $this->getEntityManager()->clear();

        return true;
    }

    /**
     * @param Achievement $achievement
     * @param UserInterface $user
     * @throws \AxalianAchievementsDoctrine\Exception\EntityNotFoundException
     * @return bool
     */
    public function removeAchievementFromUser(Achievement $achievement, UserInterface $user)
    {
        /** @var UserAchievement $userAchievement */
        $userAchievement = $this->getUserAchievementRepository()->findOneBy(
            array(
                'userID' => $user->getUserID(),
                'achievement' => $achievement
            )
        );

        if ($userAchievement) {
            $this->getEntityManager()->remove($userAchievement);
            $this->getEntityManager()->flush();
            $this->getEntityManager()->clear();

            return true;
        } else {
            throw new EntityNotFoundException('Achievement not found for user');
        }
    }

    /**
     * @return \AxalianAchievementsDoctrine\Repository\UserAchievementRepository
     */
    public function getUserAchievementRepository()
    {
        return $this->userAchievementRepository;
    }

    /**
     * @param \AxalianAchievementsDoctrine\Repository\UserAchievementRepository $userAchievementRepository
     * @return DoctrineStorageAdapter
     */
    public function setUserAchievementRepository($userAchievementRepository)
    {
        $this->userAchievementRepository = $userAchievementRepository;

        return $this;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     * @return DoctrineStorageAdapter
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }
}
