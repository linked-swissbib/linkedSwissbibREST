<?php
return array(
    'router' => array(
        'routes' => array(
            'linked-swissbib.rest.resource' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/resource[/:resource_id]',
                    'defaults' => array(
                        'controller' => 'LinkedSwissbib\\V1\\Rest\\Resource\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'linked-swissbib.rest.resource',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'LinkedSwissbib\\V1\\Rest\\Resource\\ResourceResource' => 'LinkedSwissbib\\V1\\Rest\\Resource\\ResourceResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'LinkedSwissbib\\V1\\Rest\\Resource\\Controller' => array(
            'listener' => 'LinkedSwissbib\\V1\\Rest\\Resource\\ResourceResource',
            'route_name' => 'linked-swissbib.rest.resource',
            'route_identifier_name' => 'resource_id',
            'collection_name' => 'resource',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array('q','sort','from','format'),
            'page_size' => '5',
            'page_size_param' => null,
            'entity_class' => 'LinkedSwissbib\\V1\\Rest\\Resource\\ResourceEntity',
            'collection_class' => 'LinkedSwissbib\\V1\\Rest\\Resource\\ResourceCollection',
            'service_name' => 'Resource',
            'controller_class'  => 'LinkedSwissbib\\V1\\Rest\\Controller\\ResourceController'
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            //das geht so nicht mehr wenn ich verschiedene Typen bedienen möchte
            //'LinkedSwissbib\\V1\\Rest\\Resource\\Controller' => 'HalJson',

            'LinkedSwissbib\\V1\\Rest\\Resource\\Controller' => array(
                //ich muss hier den Modelltyp komplett angeben
                //ohne Array war HalJson ausreicheichend - warum?
                //'HalJson' => array(
                'ZF\Hal\View\HalJsonModel' => array(
                    'application/json',
                    'application/*+json',
                ),
                'ZF\ContentNegotiation\ViewModel' => array(
                    'text/html'
                )
            )


        ),
        'accept_whitelist' => array(
            'LinkedSwissbib\\V1\\Rest\\Resource\\Controller' => array(
                0 => 'application/vnd.linked-swissbib.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
                3   =>  'text/html'
            ),
        ),
        'selectors' => array(

            'HalJson' => array(
                'ZF\ContentNegotiation\JsonModel' => array(
                    'application/json',
                    'application/*+json',
                ),
                'ZF\ContentNegotiation\ViewModel' => array(
                    'text/html',
                ),
            ),
        ),
        'content_type_whitelist' => array(
            'LinkedSwissbib\\V1\\Rest\\Resource\\Controller' => array(
                0 => 'application/vnd.linked-swissbib.v1+json',
                1 => 'application/json',
                2   => 'text/html'
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'LinkedSwissbib\\V1\\Rest\\Resource\\ResourceEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'linked-swissbib.rest.resource',
                'route_identifier_name' => 'resource_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'LinkedSwissbib\\V1\\Rest\\Resource\\ResourceCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'linked-swissbib.rest.resource',
                'route_identifier_name' => 'resource_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'LinkedSwissbib\\V1\\Rest\\Resource\\Controller' => array(
            'input_filter' => 'LinkedSwissbib\\V1\\Rest\\Resource\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'LinkedSwissbib\\V1\\Rest\\Resource\\Validator' => array(
            0 => array(
                'name' => 'title',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => true,
                'error_message' => 'something is wrong with the title',
            ),
            1 => array(
                'name' => 'contentType',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => true,
                'error_message' => 'something is wrong with contentType',
            ),
            2 => array(
                'name' => 'mediaType',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => true,
            ),
            3 => array(
                'name' => 'language',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            4 => array(
                'name' => 'issued',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            5 => array(
                'name' => 'placeOfPublication',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            6 => array(
                'name' => 'isbn13',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            7 => array(
                'name' => 'isbn10',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
                'file_upload' => false,
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            8 => array(
                'name' => 'issn',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'linked-swissbib/resource/get-list'    => __DIR__ . '/../view/zf/rest/get-list.phtml',
            'layout/layoutAPI'           => __DIR__ . '/../view/zf/layout/layout-api.phtml',

        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

);
