<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TicketBundle\Entity\Usuario;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsuarioController extends Controller
{
    /**
     * @Route("usuario", name="usuario")
     */
    public function indexAction(Request $request)
    {
        /*
        $usuario = new Usuario();
        $usuario->setNombres("Braulio Ricardo");
        $usuario->setApellidos("Nova Gonzalez");
        $usuario->setUsername("braulionova");
        $usuario->setPassword("ticket123");
        $usuario->setTipoUsuario("Creador de ticket");
        $usuario->setRolId(1);
        $usuario->setEstado("Activo");
        $usuario->setFechaRegistro(new \DateTime('now'));

        $form = $this->createFormBuilder($usuario)
            ->add('nombres', TextType::class)
            ->add('apellidos', TextType::class)
            ->add('username', TextType::class)
            ->add('password', TextType::class)
            ->add('tipoUsuario', TextType::class)
            ->add('rolId', TextType::class)
            ->add('estado', TextType::class)
            ->add('fechaRegistro', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Crear Usuario'))
            ->getForm();


        return $this->render('default/ticket.html.twig', array(
            'form' => $form->createView(),
        ));

        */
        return $this->render('Usuario/usuario.html.twig'
        );
    }

    /**
     * @Route("lista_usuario", name="lista_usuario")
     */
    public function listausuarioAction(Request $request)
    {

        return $this->render('Usuario/lista_usuario.html.twig');
    }
}
