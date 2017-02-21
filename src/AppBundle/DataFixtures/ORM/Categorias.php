<?php
//src/AppBundle/DataFixtures/ORM/Categorias.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Categoria;
//use Doctrine\Common\DataFixtures\FixtureInterface;
//use Symfony\Component\DependencyInjection\ContainerAwareInterface;
//use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Crea los datos de prueba para la entidad Categoría
 */
 /*
 * Implementa OrderedFixtureInterface, que le dice a Doctrine que queremos
 * controlar el orden en el que se cargan los fixtures a través del método
 * getOrder()
 *
 * Esta clase hereda de AbstractFixture, que permite crear objetos y luego
 * establecerlos como referencias para que se puedan usar más tarde en otros
 * fixtures. Por ejemplo el objeto $categoria se puede referenciar via
 * referencia categoria: $this->addReference('categoria', $categoria)
 * aunque aquí se van a utilizar los repositorios
 */
class Categorias extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    { // orden en el se que cargaran los datos fijos
      // cuanto menor es el número más pronto se cargan estos datos
      // es bueno dejar huecos para intercalar nuevas clases entre las ya
      // creadas

      return 10;
    }

  public function load(ObjectManager $em)
  {
    $disenio = new Categoria();
    $disenio->setNombre('Diseño');
    $em->persist($disenio);

    $programacion = new Categoria();
    $programacion->setNombre('Programación');
    $em->persist($programacion);

    $manager = new Categoria();
    $manager->setNombre('Manager');
    $em->persist($manager);

    $administrador = new Categoria();
    $administrador->setNombre('Administrador');
    $em->persist($administrador);

    $em->flush();

    $this->addReference('cat-disenio', $disenio);
    $this->addReference('cat-programacion', $programacion);
    $this->addReference('cat-manager', $manager);
    $this->addReference('cat-administrator', $administrador);

  }
}
