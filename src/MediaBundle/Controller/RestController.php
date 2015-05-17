<?php

namespace MediaBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class RestController extends FOSRestController
{
    public function getAudioPlaylistAction()
    {
        $data = $this->get('doctrine.orm.default_entity_manager')->getRepository('MediaBundle:Media')->getAllAudios();
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }
}