<?php
/**
 * Created by PhpStorm.
 * User: swissbib
 * Date: 17.02.15
 * Time: 19:07
 */

namespace LinkedSwissbib\V1\Rest\Resource;


interface SearchResultCollectionInterface extends \Iterator
{

    public function count();

}