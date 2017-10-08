<?php

namespace ECommBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
* CategoryRepository
*
* This class was generated by the Doctrine ORM. Add your own custom
* repository methods below.
*/
class CategoryRepository extends EntityRepository
{
  /**
   * @param string $order
   * @param string $sort
   * @return array
   */
  public function getAllCategories($sort = 'name', $order = 'ASC')
  {
      $qb = $this->getEntityManager()
          ->createQueryBuilder()
          ->select('c')
          ->from('ECommBundle:Category', 'c');

      $qb->orderBy('c.' . $sort, $order);

      return $qb->getQuery()->getResult();
  }

  /**
  * @param $slug string
  * @return mixed (null or slu)
  */
  public function findBySlug($slug)
  {
    return $this->getEntityManager()
    ->createQueryBuilder()
    ->select('c')
    ->from('ECommBundle:Category', 'c')
    ->where('c.slug = :slug')
    ->setParameter('slug', $slug)
    ->getQuery()
    ->getOneOrNullResult();
  }
}
