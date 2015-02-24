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


    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function populate($data)
    {
        foreach ($data['_source'] as $key => $value) {
            if (property_exists($this,$key)) {

                $this->{$key} = is_array($value) ? $value[0] : $value;
            }
        }
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




}
