<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Utils\Slugger;

/**
 * Trabajo
 *
 * @ORM\Table(name="Trabajo", uniqueConstraints={@ORM\UniqueConstraint(name="UTrabajoSlug", columns={"slug"}), @ORM\UniqueConstraint(name="UQ__Trabajo__32DD1E4CEA32DE3C", columns={"slug"})}, indexes={@ORM\Index(name="IDX_326B8196B2FA397B", columns={"idCategoria"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Trabajo
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
     * @ORM\Column(name="tipo", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Choice(choices={"A tiempo completo","A tiempo parcial","Freelance"},message="Seleccione una opcion")
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="puesto", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $puesto;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=255, nullable=false)
     */
    private $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=4000, nullable=false)
     * @Assert\NotBlank()
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="comoSolicitar", type="string", length=4000, nullable=false)
     * @Assert\NotBlank()
     */
    private $comosolicitar;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esPublico", type="boolean", nullable=false)
     */
    private $espublico = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estaActivado", type="boolean", nullable=false)
     */
    private $estaactivado = false;

    /**
     * @var string
     *
     * @ORM\Column(name="eCorreo", type="string", length=255, nullable=false)
     */
    private $ecorreo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires_at", type="datetime", nullable=false)
     */
    private $expiresAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategoria", referencedColumnName="id")
     * })
     */
    private $idcategoria;



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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Trabajo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Trabajo
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
        $this->slug = Slugger::getSlug($empresa);
        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Trabajo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Trabajo
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
     * Set puesto
     *
     * @param string $puesto
     *
     * @return Trabajo
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return string
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     *
     * @return Trabajo
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Trabajo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set comosolicitar
     *
     * @param string $comosolicitar
     *
     * @return Trabajo
     */
    public function setComosolicitar($comosolicitar)
    {
        $this->comosolicitar = $comosolicitar;

        return $this;
    }

    /**
     * Get comosolicitar
     *
     * @return string
     */
    public function getComosolicitar()
    {
        return $this->comosolicitar;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Trabajo
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
     * Set espublico
     *
     * @param boolean $espublico
     *
     * @return Trabajo
     */
    public function setEspublico($espublico)
    {
        $this->espublico = $espublico;

        return $this;
    }

    /**
     * Get espublico
     *
     * @return boolean
     */
    public function getEspublico()
    {
        return $this->espublico;
    }

    /**
     * Set estaactivado
     *
     * @param boolean $estaactivado
     *
     * @return Trabajo
     */
    public function setEstaactivado($estaactivado)
    {
        $this->estaactivado = $estaactivado;

        return $this;
    }

    /**
     * Get estaactivado
     *
     * @return boolean
     */
    public function getEstaactivado()
    {
        return $this->estaactivado;
    }

    /**
     * Set ecorreo
     *
     * @param string $ecorreo
     *
     * @return Trabajo
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
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return Trabajo
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Trabajo
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Trabajo
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set idcategoria
     *
     * @param \AppBundle\Entity\Categoria $idcategoria
     *
     * @return Trabajo
     */
    public function setIdcategoria(\AppBundle\Entity\Categoria $idcategoria = null)
    {
        $this->idcategoria = $idcategoria;

        return $this;
    }

    /**
     * Get idcategoria
     *
     * @return \AppBundle\Entity\Categoria
     */
    public function getIdcategoria()
    {
        return $this->idcategoria;
    }

    /**
     *  @ORM\PrePersist
     */
    public function setCreateAtValue(){
      if(!$this->getCreatedAt()){
        $this->createdAt = new \DateTime();
      }
    }

    /**
     *  @ORM\PreUpdate
     */
    public function setUpdateAtValue(){
      if(!$this->getUpdatedAt()){
        $this->updatedAt = new \DateTime();
      }
    }

    /**
     *  @ORM\PrePersist
     */
    public function setExpiresAtValue(){
      if(!$this->getExpiresAt()){
        $ahora = $this->getCreatedAt() ? $this->getCreatedAt()->format('U') : time();
        $this->expiresAt = new \Datetime(date('Y-m-d H:i:s',$ahora + 84200 * 30));
      }
    }
}
