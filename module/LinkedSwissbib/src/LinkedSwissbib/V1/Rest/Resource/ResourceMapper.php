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
        $qPar = $params->get('q');

        $queryAll = $params->count() > 0 && !empty($qPar) ? $qPar : null;
        $client = new Client();
        $getParams = array();
        $getParams['index'] = 'swissbib';
        $getParams['type'] = 'RDF';

        if ($queryAll) {
            $getParams['body'] = array(
                "query" => array(
                    //"match_all" => $queryAll != null ? [$queryAll] : []
                    "multi_match" => array(
                        'query' => $queryAll,
                        'fields' => array(
                            'title', 'bibliographicCitation','isssued', 'format', 'publicationStatement'
                        )
                    )
                ));
        } else {
            $getParams['body'] = array(
            "query" => array(
                'match_all' => [])
            );
        }





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
