<?php
/**
 * Created by PhpStorm.
 * User: swissbib
 * Date: 17.02.15
 * Time: 14:28
 */

namespace LinkedSwissbib\V1\Rest\Resource;


use Elasticsearch\Client;

class SearchResultAdapter implements SearchResultAdapterInterface
{


    /**
     * @var SearchResultCollectionInterface
     */
    protected $documents = null;


    public function __construct(SearchResultCollectionInterface $iterator)
    {

        $this->documents = $iterator;

    }



    /**
     * Returns a collection of items for a page.
     *
     * @param  int $offset Page offset
     * @param  int $itemCountPerPage Number of items per page
     * @return array
     */
    public function getItems($offset, $itemCountPerPage)
    {

        return $this->documents;


    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     */
    public function count()
    {
        return $this->documents != null ? $this->documents->count() : 0;
    }








}