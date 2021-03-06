<?php
// src/ECommBundle/Entity/Media

namespace ECommBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ECommBundle\Entity\MediaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Media
{
  /**
   * @ORM\ManyToOne(targetEntity="ECommBundle\Entity\Product", inversedBy="medias")
   * @ORM\JoinColumn(nullable=false)
   */
  private $produit;
  public function setProduit(Product $produit)
  {
    $this->produit = $produit;

    return $this;
  }
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="url", type="string", length=255)
   */
  private $url;

  /**
   * @ORM\Column(name="alt", type="string", length=255)
   */
  private $alt;

  /**
   * Get id
   *
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set url
   *
   * @param string $url
   *
   * @return Media
   */
  public function setUrl($url)
  {
    $this->url = $url;

    return $this;
  }

  /**
   * Get url
   *
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }

  /**
   * Set alt
   *
   * @param string $alt
   *
   * @return Media
   */
  public function setAlt($alt)
  {
    $this->alt = $alt;

    return $this;
  }

  /**
   * Get alt
   *
   * @return string
   */
  public function getAlt()
  {
    return $this->alt;
  }

}
