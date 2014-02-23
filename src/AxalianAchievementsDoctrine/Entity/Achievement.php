<?php
/**
 * Achievement
 *
 * @category  AxalianAchievements\Entity
 * @package   AxalianAchievements\Entity
 * @author    Michel Maas <michel@michelmaas.com>
 * @codeCoverageIgnore
 */

namespace AxalianAchievementsDoctrine\Entity;

use \AxalianAchievements\Entity\Achievement as BaseAchievement;
use Doctrine\ORM\Mapping as ORM;

/**
 * Achievement
 *
 * @ORM\Table(name="AxalianAchievementsDoctrine_Achievements", indexes={@ORM\Index(name="categoryID", columns={"categoryID"})})
 * @ORM\Entity(repositoryClass="AxalianAchievementsDoctrine\Repository\AchievementRepository")
 */
class Achievement extends BaseAchievement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="achievementID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="event", type="string", length=50, nullable=false)
     */
    protected $event;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer", nullable=true)
     */
    protected $points = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="multiple", type="boolean", nullable=true)
     */
    protected $multiple = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    protected $image;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoryID", referencedColumnName="categoryID")
     * })
     */
    protected $category;
}
 