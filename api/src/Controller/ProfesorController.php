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

use App\Entity\Profesor;
use App\Repository\ProfesorRepository;
use App\Form\ProfesorType;
/**
 * Class ProfesorController
 * @package App\Controller
 *
 * @Route(path="/api/")
 */
class ProfesorController extends AbstractController
{
    private $profesorRepository;

    public function __construct(ProfesorRepository $profesorRepository)
    {
           $this->profesorRepository = $profesorRepository;
    }

    /**
     * @Route("profesor", name="add_profesor", methods={"POST"})
     */
    public function add(Request $request): JsonResponse
    {
        //var_dump( serialize( $request->getContent() ) );
        
        $data = json_decode($request->getContent(), true);

        var_dump( serialize( $data ) );
        
        $nombre = $data['nombre'];
        $sapellido = $data['sapellido'];
		$papellido = $data['papellido'];
        

        if (empty($nombre) || empty($papellido)|| empty($sapellido)) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }
        
        $this->profesorRepository->saveProfesor($nombre, $papellido, $sapellido );
        
        return new JsonResponse(['status' => 'Profesor created!'], Response::HTTP_CREATED);
    }
    
    

    /**
     * @Route("profesor/{id}", name="get_one_profesor", methods={"GET"})
     */
    public function get($id): JsonResponse
    {
        $profesor = $this->profesorRepository->findOneBy(['id' => $id]);
        if( $profesor )
        { 
            $data[] = [
                'id' => $profesor->getId(),
                'nombre' => $profesor->getNombre(),
                'papellido' => $profesor->getPapellido(),
                'sapellido' => $profesor->getSapellido(),
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
     * @Route("profesors", name="get_all_profesors", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $profesors = $this->profesorRepository->findAll();
       

       
        
        if( $profesors )
        { 
             $data = [];

            foreach ($profesors as $profesor) {
                $data[] = [
                'id' => $profesor->getId(),
                'nombre' => $profesor->getNombre(),
                'papellido' => $profesor->getPapellido(),
                'sapellido' => $profesor->getSapellido(),
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
     * @Route("profesor/{id}", name="update_profesor", methods={"PUT"})
     */
    public function update($id, Request $request): JsonResponse
    {
        $profesor = $this->profesorRepository->findOneBy(['id' => $id]);
        
        if( $profesor )
        {
            $data = json_decode($request->getContent(), true);
            empty($data['nombre']) ? true : $profesor->setNombre($data['nombre']);
            empty($data['papellido']) ? true : $profesor->setPapellido($data['papellido']);
			empty($data['sapellido']) ? true : $profesor->setSapellido($data['sapellido']);
           

            $updatedProfesor = $this->profesorRepository->updateProfesor($profesor);
            return new JsonResponse(['status' => 'Profesor updated!'], Response::HTTP_OK);
        }
        else
        {
            
        }
        
    }

    /**
     * @Route("profesor/{id}", name="delete_profesor", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    {
        $profesor = $this->profesorRepository->findOneBy(['id' => $id]);

        $this->profesorRepository->removeProfesor($profesor);

        return new JsonResponse(['status' => 'Profesor deleted'], Response::HTTP_OK);
    }
}

?>
