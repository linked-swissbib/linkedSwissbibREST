<?php
/**
 * Created by PhpStorm.
 * User: swissbib
 * Date: 24.02.15
 * Time: 22:31
 */

namespace LinkedSwissbib\V1\Rest\View\Helpers;


use Zend\View\Helper\AbstractHelper;

class ConvertRDF extends AbstractHelper {


    protected $possibleFormats = [
        'json', 'jsonld', 'ntriples', 'php', 'turtle', 'rdfxml', 'dot', 'json-triples',
        'n3', 'rdfa', 'sparql-xml', 'sparql-json', 'png', 'gif', 'svg'
    ];


    public function convertToTurtle($source, $format = 'rdfxml')
    {
        $rdfGraph = new \EasyRdf_Graph();
        $rdfGraph->parse($source,$format);
        return $rdfGraph->serialise('turtle');

    }


    public function convertToNTriples($source, $format = 'rdfxml')
    {
        $rdfGraph = new \EasyRdf_Graph();
        $rdfGraph->parse($source,$format);
        return $rdfGraph->serialise('ntriples');

    }


    public function convertToJsonLD($source, $format = 'rdfxml')
    {
        $rdfGraph = new \EasyRdf_Graph();
        $rdfGraph->parse($source,$format);
        return $rdfGraph->serialise('jsonld');

    }


}