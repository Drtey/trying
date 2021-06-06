<?php

namespace App\Repository;

use App\Entity\Cita;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


use Doctrine\ORM\Query\ResultSetMappingBuilder;

use Doctrine\ORM\Query\ResultSetMapping;
/**
 * @method Cita|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cita|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cita[]    findAll()
 * @method Cita[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CitaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cita::class);
    }

    // /**
    //  * @return Cita[] Returns an array of Cita objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cita
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    
     // nativeSQL utiliza SQL nativo para devolver objetos
    public function findCitasLibres( )
    {
        $em = $this->getEntityManager();
            
        
        //$rsm = new ResultSetMapping();
        
        
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('App:Cita', 'c');
        // build rsm here

        $query = $em->createNativeQuery('SELECT c.* from citas_citas as c WHERE c.id not in ( select citas_reservas.cita_id from citas_reservas ) ORDER BY c.fecha, c.hora', $rsm);
           

        $citas = $query->getResult(); 
        var_dump( serialize( $citas ));
        return( $citas );
        
        
       
           
    }

    public function findCitaLibre( )
    {
        $em = $this->getEntityManager();
            
        
        //$rsm = new ResultSetMapping();
        
        
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('App:Cita', 'c');
        // build rsm here

        $query = $em->createNativeQuery('SELECT c.* from citas_citas as c WHERE c.id in ( select citas_reservas.cita_id from citas_reservas ) ORDER BY c.fecha, c.hora', $rsm);
           

        $cita = $query->getResult(); 
        return( $cita );
        
        
       
           
    }
    
}
