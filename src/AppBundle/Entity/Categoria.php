<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Utils\Slugger;

/**
 * Categoria
 *
 * @ORM\Table(name="Categoria", uniqueConstraints={@ORM\UniqueConstraint(name="UCategoriaNombre", columns={"nombre"})})
 * @ORM\Entity
 */
class Categoria
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
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Afiliado", inversedBy="idcategoria")
     * @ORM\JoinTable(name="categoriaafiliado",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IdCategoria", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IdAfiliado", referencedColumnName="id")
     *   }
     * )
     */
    private $idafiliado;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idafiliado = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Categoria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        $this->slug = Slugger::getSlug($nombre);
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Categoria
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
     * Add idafiliado
     *
     * @param \AppBundle\Entity\Afiliado $idafiliado
     *
     * @return Categoria
     */
    public function addIdafiliado(\AppBundle\Entity\Afiliado $idafiliado)
    {
        $this->idafiliado[] = $idafiliado;

        return $this;
    }

    /**
     * Remove idafiliado
     *
     * @param \AppBundle\Entity\Afiliado $idafiliado
     */
    public function removeIdafiliado(\AppBundle\Entity\Afiliado $idafiliado)
    {
        $this->idafiliado->removeElement($idafiliado);
    }

    /**
     * Get idafiliado
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdafiliado()
    {
        return $this->idafiliado;
    }

    /**
     * @get nombre
     * @return String
     */
    public function __toString(){
      return $this->nombre;
    }
}
