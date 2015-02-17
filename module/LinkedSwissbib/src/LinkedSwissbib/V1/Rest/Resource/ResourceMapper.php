<?php
namespace LinkedSwissbib\V1\Rest\Resource;

use Elasticsearch\Client;


class ResourceMapper
{
    /**
     * @var SearchResultAdapter
     */
    protected $searchAdapter;


    public function fetchAll($params)
    {

        $client = new Client();
        $getParams = array();
        $getParams['index'] = 'swissbib';
        $getParams['type'] = 'RDF';
        $getParams['body']['query']['match']['title'] = 'katalog';
        $documents =  $client->search($getParams);

        $adapter = new SearchResultAdapter(new SearchResultCollection($documents));
        return  new ResourceCollection($adapter);

    }

    public function fetchOne($resourceId)
    {

        //we need a data array

        $entity = new ResourceEntity();
        $entity->populate(array());

        return $entity;
    }

    public function save($data, $id = 0)
    {
        $data = (array)$data;
        if ($id > 0) {
            $data['id'] = $id;
        }
        

        //we need logic to update the SearchEngine

        $entity = new ResourceEntity();
        $entity->populate($data);
        return $entity;
    }
}
