<?php
//src/AppBundle/DataFixtures/ORM/Trabajos.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Trabajo;

class Trabajos extends AbstractFixture implements OrderedFixtureInterface
{ public function getOrder()
  { // orden en el se que cargaran los datos fijos
    // cuanto menor es el número más pronto se cargan estos datos
    // es bueno dejar huecos para intercalar nuevas clases entre las ya
    // creadas

    return 20;
  }

  public function load(ObjectManager $em)
  { $trabajo = new Trabajo();

    $trabajo->setIdcategoria($em->merge($this->getReference('cat-programacion')));
    $trabajo->setTipo('A tiempo completo');
    $trabajo->setEmpresa('Sensio Labs');
    $trabajo->setUrl('http://www.sensiolabs.com/');
    $trabajo->setPuesto('Desarrollador Web');
    $trabajo->setUbicacion('París, Francia');
    $trabajo->setDescripcion('Ya has desarrollado sitios web con symfony y quieres trabajar con tecnologías de código abierto. Tienes un mínimo de 3 años de experiencia en desarrollo web con PHP y Java y deseas participar en desarrollos de sitios Web 2.0 con los mejores marcos de trabajo disponibles');
    $trabajo->setComosolicitar('Mandar currículum a fabien.potencier@sensio.com');
    $trabajo->setEspublico(true);
    $trabajo->setEstaactivado(true);
    $trabajo->setEcorreo('trabajo@ejemplo.com');
    $trabajo->setExpiresAt(new \DateTime('+30 days'));

    $em->persist($trabajo);

    $trabajo = new Trabajo();
    $trabajo->setIdcategoria($em->merge($this->getReference('cat-disenio')));
    $trabajo->setTipo('A tiempo parcial');
    $trabajo->setEmpresa('Extreme Sensio');
    $trabajo->setUrl('http://www.extreme-sensio.com/');
    $trabajo->setPuesto('Diseñador Web');
    $trabajo->setUbicacion('París, Francia');
    $trabajo->setDescripcion('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
    enim ad minim veniam, quis nostrud exercitation ullamco laboris
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
    in reprehenderit in.
 
    Voluptate velit esse cillum dolore eu fugiat nulla pariatur.
    Excepteur sint occaecat cupidatat non proident, sunt in culpa
    qui officia deserunt mollit anim id est laborum.');
    $trabajo->setComosolicitar('Mandar currículum a fabien.potencier@sensio.com');
    $trabajo->setEspublico(true);
    $trabajo->setEstaactivado(true);
    $trabajo->setEcorreo('trabajo@ejemplo.com');
    $trabajo->setExpiresAt(new \DateTime('+30 days'));
    $em->persist($trabajo);

    $em->flush();
  }
}
