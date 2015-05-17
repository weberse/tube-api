<?php

namespace MediaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MediaRepository
 */
class MediaRepository extends EntityRepository
{
    public function getAllAudios()
    {
        return $this->findBy(array('type' => Media::MEDIA_TYPE_AUDIO));
    }
}
