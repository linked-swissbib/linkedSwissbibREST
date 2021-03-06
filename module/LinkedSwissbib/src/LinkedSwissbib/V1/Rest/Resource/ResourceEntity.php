<?php
namespace LinkedSwissbib\V1\Rest\Resource;

class ResourceEntity
{

    protected $title;
    protected $contentType;
    protected $mediaType;
    protected $language;
    protected $issued;
    protected $placeOfPublication;
    protected $isbn13;
    protected $isbn10;
    protected $issn;
    protected $id;
    protected $fullRecord;
    protected $recordJSON_LD;
    protected $nTriples;
    protected $turtle;




    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function populate($data)
    {

        $rdfGraph = new \EasyRdf_Graph();
        $rdfGraph->parse(json_encode($data['_source']),'jsonld');
        $this->turtle = $rdfGraph->serialise('turtle');
        $this->nTriples = $rdfGraph->serialise('ntriples');
        $this->recordJSON_LD = $rdfGraph->serialise('jsonld');
        $result = $rdfGraph->serialise('rdfxml');
        $this->fullRecord = $result;
        /*
        foreach ($data['_source'] as $key => $value) {
            if (property_exists($this,$key)) {

                if ($key == 'fullRecord') {
                    //$rdfGraph = new \EasyRdf_Graph('http://www.woz.ch', $value,'rdfxml');
                    //$foaf = new \EasyRdf_Graph("http://njh.me/foaf.rdf");
                    //$foaf->load();

                    foreach (\EasyRdf_Format::getFormats() as $format) {
                        $test = "";
                    }

                    $rdfGraph = new \EasyRdf_Graph();
                    //\EasyRdf_Format::
                    $result = $rdfGraph->parse($value,'rdfxml');
                    $turtle = $rdfGraph->serialise('turtle');
                    $ntriples = $rdfGraph->serialise('ntriples');
                    $jsonld = $rdfGraph->serialise('jsonld');
                    //$rdfa = $rdfGraph->serialise('rdfa');


                }


                $this->{$key} = is_array($value) ? $value[0] : $value;
            }
        }
        */
        $this->id = $data['_id'];
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param mixed $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return mixed
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * @param mixed $mediaType
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getIssued()
    {
        return $this->issued;
    }

    /**
     * @param mixed $issued
     */
    public function setIssued($issued)
    {
        $this->issued = $issued;
    }

    /**
     * @return mixed
     */
    public function getPlaceOfPublication()
    {
        return $this->placeOfPublication;
    }

    /**
     * @param mixed $placeOfPublication
     */
    public function setPlaceOfPublication($placeOfPublication)
    {
        $this->placeOfPublication = $placeOfPublication;
    }

    /**
     * @return mixed
     */
    public function getIsbn13()
    {
        return $this->isbn13;
    }

    /**
     * @param mixed $isbn13
     */
    public function setIsbn13($isbn13)
    {
        $this->isbn13 = $isbn13;
    }

    /**
     * @return mixed
     */
    public function getIsbn10()
    {
        return $this->isbn10;
    }

    /**
     * @param mixed $isbn10
     */
    public function setIsbn10($isbn10)
    {
        $this->isbn10 = $isbn10;
    }

    /**
     * @return mixed
     */
    public function getIssn()
    {
        return $this->issn;
    }

    /**
     * @param mixed $issn
     */
    public function setIssn($issn)
    {
        $this->issn = $issn;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFullRecord()
    {
        return $this->fullRecord;
    }

    /**
     * @param mixed $fullRecord
     */
    public function setFullRecord($fullRecord)
    {
        $this->fullRecord = $fullRecord;
    }

    /**
     * @return mixed
     */
    public function getRecordJSONLD()
    {
        return $this->recordJSON_LD;
    }

    /**
     * @return mixed
     */
    public function getNTriples()
    {
        return $this->nTriples;
    }

    /**
     * @return mixed
     */
    public function getTurtle()
    {
        return $this->turtle;
    }




}
