<?php
namespace ECommBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ECommBundle\Entity\Product;
use ECommBundle\Entity\Media;
use Eshop\ShopBundle\Entity\Category;

class ProductData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $categoryRepository = $manager->getRepository('ECommBundle:Category');

    $produit1 = new Product();
    $produit1->setDescription("excellent cidre");
    // $produit1->setDisponible('1');
    $produit1->setNom('cidre');
    $produit1->setPrix('1.99');
    $produit1->setCategory($categoryRepository->findByName('cidre'));
    $produit1->setQuantity(mt_rand(1, 10));
    // Création de l'entité Image
    $image = new Media();
    $image->setUrl('http://placehold.it/800x400');
    $image->setAlt('cidre');
    // On lie l'image à l'annonce
    $produit1->addMedias($image);

    $image2 = new Media();
    $image2->setUrl('http://placehold.it/700x400');
    $image2->setAlt('cidre');
    // On lie l'image à l'annonce
    $produit1->addMedias($image2);

    $manager->persist($produit1);

    $produit2 = new Product();
    $produit2->setDescription("excellent vin");
    // $produit2->setDisponible('1');
    $produit2->setNom('vin');
    $produit2->setPrix('1.99');
    $produit2->setCategory($categoryRepository->findByName('vin'));
    $produit2->setQuantity(mt_rand(1, 10));
    $manager->persist($produit2);

    $produit3 = new Product();
    $produit3->setDescription("excellent vin");
    // $produit3->setDisponible('1');
    $produit3->setNom('vin2');
    $produit3->setPrix('1.99');
    $produit3->setCategory($categoryRepository->findByName('vin'));
    $produit3->setQuantity(mt_rand(1, 10));
    // Création de l'entité Image
    $image3 = new Media();
    $image3->setUrl('http://placehold.it/900x1000');
    $image3->setAlt('vin');

    // On lie l'image à l'annonce
    $produit3->addMedias($image3);
    $manager->persist($produit3);

    $manager->flush();
  }

  /**
  * @return int
  */
  public function getOrder()
  {
    return 3; // the order in which fixtures will be loaded
  }
}
