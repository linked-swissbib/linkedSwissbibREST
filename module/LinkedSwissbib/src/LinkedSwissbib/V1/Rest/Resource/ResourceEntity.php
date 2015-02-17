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


    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function populate($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }


}
