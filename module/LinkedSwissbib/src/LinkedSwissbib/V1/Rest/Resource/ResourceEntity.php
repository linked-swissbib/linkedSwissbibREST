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


    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function populate($data)
    {
        foreach ($data['_source'] as $key => $value) {
            if (property_exists($this,$key)) {
                $this->{$key} = $value[0];
            }
        }
        $this->id = $data['_id'];
    }


}
