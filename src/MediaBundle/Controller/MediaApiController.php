<?php

namespace MediaBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use MediaBundle\Entity\Media;
use MediaBundle\Form\MediaType;
use Symfony\Component\HttpFoundation\Request;

class MediaApiController extends FOSRestController
{
    public function getAudioPlaylistAction()
    {
        $data = $this->get('doctrine.orm.default_entity_manager')->getRepository('MediaBundle:Media')->getAllAudios();
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }

    /**
     * Creates a new Media entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Media();
        $form = $this->createForm(new MediaType(), $entity);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $data =  $entity->getId();
            $view = $this->view($data, 200);
            return $this->handleView($view);
        }

        $view = $this->view(array('error' => $form->getErrors()), Codes::HTTP_INTERNAL_SERVER_ERROR);
        return $this->handleView($view);

    }
}