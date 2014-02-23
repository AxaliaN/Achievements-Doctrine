<?php
/**
 * Category
 *
 * @category  AxalianAchievements\Entity
 * @package   AxalianAchievements\Entity
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsDoctrine\Entity;

use AxalianAchievements\Entity\Category as BaseCategory;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="AxalianAchievementsDoctrine_Category")
 * @ORM\Entity(repositoryClass="AxalianAchievementsDoctrine\Repository\CategoryRepository")
 */
class Category extends BaseCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="categoryID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
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
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    protected $image;
}
 