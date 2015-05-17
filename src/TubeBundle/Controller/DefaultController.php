<?php

namespace TubeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TubeBundle:Default:index.html.twig');
    }
}
