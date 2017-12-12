<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\SecurityBundle\Tests\Functional\Bundle\CsrfFormLoginBundle\Form\UserLoginType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use TicketBundle\Entity\Usuario;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use TicketBundle\Form\UsuarioType;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\BrowserKit\Response;


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

    /**
     * @Route("guardar_usuario", name="guardar_usuario", options={"expose"=true})
     *@param Request $request
     * @Method({"POST"})
     * @return JsonResponse
     */
    public function postUser(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        //creando nuevo usuario
        $user = new Usuario();
        $user->setNombres($data['nombres']);
        $user->setApellidos($data['apellidos']);
        $user->setUsername($data['username']);
        $user->setPassword($data['password']);
        $user->setTipoUsuario($data['tipoUsuario']);
        $user->setRolId($data['rolId']);
        $user->setEstado($data['estado']);
        $user->setFechaRegistro(new \DateTime($data['fechaRegistro']));

        //$user->setFechaRegistro(new \DateTime());

        //dump($user);
        //die;
        //guardar en la base de datos
        //hay que crear las tablas y los campos
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        //retur json
        $newUser = json_decode($this->get('serializer')->serialize($user,'json'),true);

        return new JsonResponse($newUser);

    }

    /**
     * @Route("usuario/{id}", name="get_usuario", requirements={"id"="\d+"} )
     * @Method("GET")
     * @param Request $request
     * @param Usuario $user
     * @return JsonResponse
     * */
    public function getUsuario(Request $request, Usuario $user)
    {
        $userJ = json_decode($this->get('serializer')->serialize($user, 'json'), true);
        return new JsonResponse($userJ);


    }

}
