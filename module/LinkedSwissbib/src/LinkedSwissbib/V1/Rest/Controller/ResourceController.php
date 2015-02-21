<?php
/**
 * Created by PhpStorm.
 * User: swissbib
 * Date: 21.02.15
 * Time: 19:04
 */

namespace LinkedSwissbib\V1\Rest\Controller;

use ZF\Rest\RestController;
use Zend\Mvc\MvcEvent;


class ResourceController extends RestController
{


    /**
     * @var array
     * accept types from Firefox
     * //application/xhtml+xml, text/html, application/xml;q=0.9, *\/*;q=0.8
     */
    protected $acceptTypesNotTerminal = [
        'application/xhtml+xml',
        'text/html',
        //'application/xml' => not accepted in general
    ]

    ;

    public function onDispatch(MvcEvent $e)
    {
        $viewModel =  parent::onDispatch($e);

        $acceptedHeadersFromClient =  preg_split('/,/',$this->getRequest()->getHeader('accept')->getFieldValue());
        foreach ( $acceptedHeadersFromClient as $header) {
            if (in_array($header,$this->acceptTypesNotTerminal)) {
                $viewModel->setTerminal(false);
                $this->layout('layout/layoutAPI');
                break;
            }
        }

        return $viewModel;

    }

}