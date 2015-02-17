<?php
namespace LinkedSwissbib\V1\Rest\Resource;



class ResourceResourceFactory
{
    public function __invoke($services)
    {

        //todo:
        //refactor this into separate Factories or closures
        $mapper = new ResourceMapper();
        return new ResourceResource($mapper);
    }
}
