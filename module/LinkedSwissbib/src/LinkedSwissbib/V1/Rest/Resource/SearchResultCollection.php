<?php
/**
 * Created by PhpStorm.
 * User: swissbib
 * Date: 17.02.15
 * Time: 18:20
 */

namespace LinkedSwissbib\V1\Rest\Resource;




class SearchResultCollection implements  SearchResultCollectionInterface
{


    protected $esResult = null;
    protected $position = 0;


    public function __construct(array $esResult)
    {
        $this->esResult = $esResult;
    }


    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return $this->esResult['hits']['hits'][$this->position];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return $this->position < $this->getFetchedCollectionSize();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->position = 0;
    }

    public function count()
    {
        return $this->esResult != null && count($this->esResult) > 0 && array_key_exists('hits', $this->esResult) ?
            $this->esResult['hits']['total'] : 0;
    }

    protected function getFetchedCollectionSize()
    {

        return $this->esResult != null && count($this->esResult) > 0 && array_key_exists('hits', $this->esResult)
        && array_key_exists('hits', $this->esResult['hits']) ? count($this->esResult['hits']['hits']) : 0;

    }

}