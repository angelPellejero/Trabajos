<?php
//src/AppBundle/DataFixtures/ORM/Afiliados.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Afiliado;

class Afiliados extends AbstractFixture implements OrderedFixtureInterface
{
  public function getOrder()
  {
    return 30;
  }

  public function load(ObjectManager $em)
  {
    $afiliado = new Afiliado();

    $afiliado->setUrl('http://sensio-labs.com/');
    $afiliado->setEcorreo('direccion1@ejemplo.com');
    $afiliado->setEstaactivo(true);
    $afiliado->addIdCategoria($em->merge($this->getReference('cat-programacion')));

    $em->persist($afiliado);
    
    $afiliado = new Afiliado();

    $afiliado->setUrl('http://sensio-labs.com/');
    $afiliado->setEcorreo('direccion2@ejemplo.com');
    $afiliado->setEstaactivo(false);
    $afiliado->addIdCategoria($em->merge($this->getReference('cat-disenio')));

    $em->persist($afiliado);

    $em->flush();

    $this->addReference('afiliado', $afiliado);
  }
}
