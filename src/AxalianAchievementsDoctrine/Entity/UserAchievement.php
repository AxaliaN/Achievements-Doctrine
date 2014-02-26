<?php
/**
 * UserAchievement
 *
 * @category  AxalianAchievementsDoctrine\Entity
 * @package   AxalianAchievementsDoctrine\Entity
 * @author    Michel Maas <michel@michelmaas.com>
 */
 
namespace AxalianAchievementsDoctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAchievements
 *
 * @ORM\Table(
 *      name="AxalianAchievementsDoctrine_UserAchievements",
 *      indexes={@ORM\Index(name="achievementID", columns={"achievementID"}),
 *      @ORM\Index(name="userID", columns={"userID"})}
 * )
 * @ORM\Entity(repositoryClass="AxalianAchievementsDoctrine\Repository\UserAchievementRepository")
 */
class UserAchievement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="userAchievementID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $userAchievementID;

    /**
     * @var integer
     *
     * @ORM\Column(name="userID", type="integer", nullable=false)
     */
    protected $userID = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var Achievement
     *
     * @ORM\ManyToOne(targetEntity="Achievement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="achievementID", referencedColumnName="achievementID")
     * })
     */
    protected $achievement;

    /**
     * @return int
     */
    public function getUserAchievementID()
    {
        return $this->userAchievementID;
    }

    /**
     * @param int $userAchievementID
     * @return UserAchievement
     */
    public function setUserAchievementID($userAchievementID)
    {
        $this->userAchievementID = $userAchievementID;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param int $userID
     * @return UserAchievement
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \AxalianAchievementsDoctrine\Entity\Achievement
     */
    public function getAchievement()
    {
        return $this->achievement;
    }

    /**
     * @param \AxalianAchievementsDoctrine\Entity\Achievement $achievement
     * @return UserAchievement
     */
    public function setAchievement($achievement)
    {
        $this->achievement = $achievement;

        return $this;
    }
}
