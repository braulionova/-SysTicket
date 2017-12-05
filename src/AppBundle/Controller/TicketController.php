<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TicketBundle\Entity\Usuario;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TicketController extends Controller
{
    /**
     * @Route("ticket", name="ticket")
     */
    public function indexAction(Request $request)
    {


        return $this->render('Ticket/ticket.html.twig');
    }

    /**
     * @Route("lista_ticket", name="lista_ticket")
     */
    public function listaTicketAction(Request $request)
    {


        return $this->render('Ticket/lista_ticket.html.twig');
    }
}
