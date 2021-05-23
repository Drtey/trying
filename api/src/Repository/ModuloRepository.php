<?php

namespace App\Repository;

use App\Entity\Modulo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Modulo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Modulo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Modulo[]    findAll()
 * @method Modulo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager )
    {
        parent::__construct($registry, Modulo::class);
        $this->manager = $manager;
    }

    public function saveModulo( $nombre, $codigo, $curso, $horas )
    {
        $modulo = new Modulo();
        $modulo->setNombre( $nombre );
        $modulo->setCodigo( $codigo );
        $modulo->setCurso( $curso );
        $modulo->setHoras( $horas );
       
        
        $this->manager->persist( $modulo );
        $this->manager->flush();
        
    }
    
    
    public function updateModulo(Modulo $modulo): Modulo
    {
        $this->manager->persist($modulo);
        $this->manager->flush();

        return $modulo;
    }


    public function removeModulo(Modulo $modulo)
    {
        $this->manager->remove($modulo);
        $this->manager->flush();
    }
    
    // /**
    //  * @return Modulo[] Returns an array of Modulo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Modulo
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
