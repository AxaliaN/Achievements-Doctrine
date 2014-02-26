<?php
/**
 * EntityNotFoundException
 *
 * @category  AxalianAchievementsDoctrine\Exception
 * @package   AxalianAchievementsDoctrine\Exception
 * @author    Michel Maas <michel@michelmaas.com>
 */

namespace AxalianAchievementsDoctrine\Exception;

use \Doctrine\ORM\EntityNotFoundException as DoctrineEntityNotFoundException;

class EntityNotFoundException extends DoctrineEntityNotFoundException
{

}
