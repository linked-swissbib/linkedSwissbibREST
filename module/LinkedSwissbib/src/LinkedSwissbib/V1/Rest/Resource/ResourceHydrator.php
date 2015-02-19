<?php
/**
 * Created by PhpStorm.
 * User: swissbib
 * Date: 19.02.15
 * Time: 21:14
 */

namespace LinkedSwissbib\V1\Rest\Resource;


use Zend\Stdlib\ArrayObject;
use Zend\Stdlib\Hydrator\HydratorInterface;

class ResourceHydrator implements HydratorInterface
{
    /**
     * Extract values from an object
     *
     * @param  object $object
     * @return array
     */
    public function extract($object)
    {
        // TODO: Implement extract() method.
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return object
     */
    public function hydrate(array $data,$object)
    {
        if ($object instanceof ArrayObject) {

            foreach ($data['hits']['hits'] as $hit) {

                $resourceEntity = new ResourceEntity();
                $resourceEntity->populate($hit);
                $object->append($resourceEntity);


            }

        }


    }


}