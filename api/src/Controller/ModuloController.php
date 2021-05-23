<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Modulo;
use App\Repository\ModuloRepository;
use App\Form\ModuloType;
/**
 * Class ModuloController
 * @package App\Controller
 *
 * @Route(path="/api/")
 */
class ModuloController extends AbstractController
{
    private $ModuloRepository;

    public function __construct(ModuloRepository $ModuloRepository)
    {
           $this->ModuloRepository = $ModuloRepository;
    }

    /**
     * @Route("modulo", name="add_modulo", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        //var_dump( serialize( $request->getContent() ) );
        
        $data = json_decode($request->getContent(), true);

        var_dump( serialize( $data ) );
        
        $nombre = $data['nombre'];
        $codigo= $data['codigo'];
		$curso = $data['curso'];
        $horas = $data['horas'];
        

        if (empty($nombre) || empty($curso)|| empty($codigo) || empty($horas)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }
        
        $this->ModuloRepository->saveModulo($nombre, $curso, $codigo, $horas);
        
        return new JsonResponse(['status' => 'Modulo created!'], Response::HTTP_CREATED);
    }
    
    

    /**
     * @Route("modulo/{id}", name="get_one_Modulo", methods={"GET"})
     */
    public function get($id): JsonResponse
    {
        $Modulo = $this->ModuloRepository->findOneBy(['id' => $id]);
        if( $Modulo )
        { 
            $data[] = [
                'id' => $Modulo->getId(),
                'nombre' => $Modulo->getNombre(),
                'curso' => $Modulo->getcurso(),
                'codigo' => $Modulo->getcodigo(),
                'horas' => $Modulo->gethoras(),
            ];

            return new JsonResponse($data, Response::HTTP_OK);
        }
        else
        {
           
            
             return new JsonResponse(
                    ['code' => 204, 'message' => 'No articles found for this query.'],
                    Response::HTTP_NO_CONTENT);
            
        }
    }

    /**
     * @Route("modulos", name="get_all_modulos", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $Modulos = $this->ModuloRepository->findAll();
       

       
        
        if( $Modulos )
        { 
             $data = [];

            foreach ($Modulos as $Modulo) {
                $data[] = [
                'id' => $Modulo->getId(),
                'nombre' => $Modulo->getNombre(),
                'curso' => $Modulo->getcurso(),
                'codigo' => $Modulo->getcodigo(),
                'horas' => $Modulo->gethoras(),
            ];
        }

            return new JsonResponse($data, Response::HTTP_OK);
        }
        else
        {
             return new JsonResponse(
                    ['code' => 204, 'message' => 'No articles found for this query.'],
                    Response::HTTP_NO_CONTENT);
         
        }
    }

    /**
     * @Route("modulo/{id}", name="update_modulo", methods={"PUT"})
     */
    public function update($id, Request $request): JsonResponse
    {
        $Modulo = $this->ModuloRepository->findOneBy(['id' => $id]);
        
        if( $Modulo )
        {
            $data = json_decode($request->getContent(), true);
            empty($data['nombre']) ? true : $Modulo->setNombre($data['nombre']);
            empty($data['curso']) ? true : $Modulo->setcurso($data['curso']);
			empty($data['codigo']) ? true : $Modulo->setcodigo($data['codigo']);
            empty($data['horas']) ? true : $Modulo->setcodigo($data['horas']);
           

            $updatedModulo = $this->ModuloRepository->updateModulo($Modulo);
            return new JsonResponse(['status' => 'Modulo updated!'], Response::HTTP_OK);
        }
        else
        {
            
        }
        
    }

    /**
     * @Route("Modulo/{id}", name="delete_Modulo", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    {
        $Modulo = $this->ModuloRepository->findOneBy(['id' => $id]);

        $this->ModuloRepository->removeModulo($Modulo);

        return new JsonResponse(['status' => 'Modulo deleted'], Response::HTTP_OK);
    }
}

?>
