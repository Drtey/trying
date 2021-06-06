<?php

namespace App\Controller;

use App\Entity\Cita;
use App\Entity\Reserva;
use App\Repository\ReservaRepository;
use App\Repository\CitaRepository;

//use App\Form\CitaType;


use Symfony\Component\Form\Extension\Core\Type\{TextType,ButtonType,EmailType,HiddenType,PasswordType,TextareaType,SubmitType,NumberType,DateType,MoneyType,BirthdayType};

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Validator\Constraints\TelefonoMovil;
use App\Validator\Constraints\Dni;

/**
 * @Route("/citas")
 */
class CitasController extends AbstractController
{
    private $citaRepository;
    private $reservaRepository;

    public function __construct(CitaRepository $citaRepository, ReservaRepository $reservaRepository)
    {
           $this->citaRepository = $citaRepository;
           $this->reservaRepository = $reservaRepository;
    }
    
    
    /**
     * @Route("/listar", name="cita_listar")
     */
    public function listar()
    {
        
        $citas = $this->citaRepository->findCitasLibres();
        
        
        return $this->render('citas/listar.html.twig', [
            'citas' => $citas
        ]);
    }

       /**
     * @Route("/reserva/{id}", name="citas_reserva")
     */
    public function reserva( $id, Request $request )
    {
        $cita = $this->citaRepository->find($id);
        
        $citasReservadas = $this->citaRepository->findCitaLibre();

        foreach($citasReservadas as $citaReservada){
            if($cita == $citaReservada){
                return $this->render('citas/error.html.twig');
            }
        }

        $form = $this->createFormBuilder();
        $form->add('nif', TextType::class, ['constraints' => [new Dni()]]);
        $form->add('nombre', TextType::class );
        $form->add('apellidos', TextType::class);
        $form->add('email', TextType::class);
        $form->add('telefono', TextType::class, ['constraints' => [new TelefonoMovil()]]);
        $form->add('Aceptar', SubmitType::class );
        
        $form = $form->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $data = $form->getData();
            
            $reserva = new Reserva();
            $reserva->setNif($data['nif']);
            $reserva->setNombre($data['nombre']);
            $reserva->setApellidos($data['apellidos']);
            $reserva->setTelefono($data['telefono']);
            $reserva->setEmail($data['email']);
            
            $reserva->setCita( $cita );
            
            $reserva = $this->reservaRepository->save($reserva);
            /* $reserva[$this->reservaRepository->save($reserva)]; */

			return new Response( "save" );
    
        }

        return $this->render('citas/form.html.twig', ['form' => $form->createView(),]);
    }


}





    

