<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Utils\Slugger;

/**
 * Afiliado
 *
 * @ORM\Table(name="Afiliado", uniqueConstraints={@ORM\UniqueConstraint(name="UAfiliadoECorreo", columns={"eCorreo"}), @ORM\UniqueConstraint(name="UQ__Afiliado__251EE393F2855199", columns={"eCorreo"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Afiliado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     * @Assert\Url(
     *  message = "La url '{{ value }}' no es valida",
     *  protocols = {"http", "https"}
     * )
     * @Assert\NotBlank()
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="eCorreo", type="string", length=255, nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "El email '{{ value }}' no es valido.",
     *     checkMX = true
     * )
     */
    private $ecorreo;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estaActivo", type="boolean", nullable=false)
     */
    private $estaactivo = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categoria", mappedBy="idafiliado")
     */
    private $idcategoria;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcategoria = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return Afiliado
     */
    public function setUrl($url)
    {
        $this->url = $url;
        $this->slug = Slugger::getSlug($url);
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
     * Set ecorreo
     *
     * @param string $ecorreo
     *
     * @return Afiliado
     */
    public function setEcorreo($ecorreo)
    {
        $this->ecorreo = $ecorreo;

        return $this;
    }

    /**
     * Get ecorreo
     *
     * @return string
     */
    public function getEcorreo()
    {
        return $this->ecorreo;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Afiliado
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set estaactivo
     *
     * @param boolean $estaactivo
     *
     * @return Afiliado
     */
    public function setEstaactivo($estaactivo)
    {
        $this->estaactivo = $estaactivo;

        return $this;
    }

    /**
     * Get estaactivo
     *
     * @return boolean
     */
    public function getEstaactivo()
    {
        return $this->estaactivo;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Afiliado
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add idcategorium
     *
     * @param \AppBundle\Entity\Categoria $idcategorium
     *
     * @return Afiliado
     */
    public function addIdcategoria(\AppBundle\Entity\Categoria $idcategorium)
    {
        $this->idcategoria[] = $idcategorium;

        return $this;
    }

    /**
     * Remove idcategorium
     *
     * @param \AppBundle\Entity\Categoria $idcategorium
     */
    public function removeIdcategorium(\AppBundle\Entity\Categoria $idcategorium)
    {
        $this->idcategoria->removeElement($idcategorium);
    }

    /**
     * Get idcategoria
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdcategoria()
    {
        return $this->idcategoria;
    }

    public function __toString(){
      return $this->url;
    }

    /**
     *  @ORM\PrePersist
     */
    public function setCreateAtValue(){
      if(!$this->getCreatedAt()){
        $this->createdAt = new \DateTime();
      }
    }
}
