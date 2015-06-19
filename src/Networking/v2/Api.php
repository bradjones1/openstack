<?php

namespace OpenStack\Networking\v2;

use OpenStack\Common\Api\ApiInterface;

/**
 * A representation of the Neutron (Nova) v2 REST API.
 *
 * @internal
 * @package OpenStack\Networking\v2
 */
class Api implements ApiInterface
{
    private $pathPrefix = 'v2.0';

    private $idParam = [
        'type' => 'string',
        'required' => true,
        'location' => 'url',
        'description' => 'The unique ID of the remote resource.',
    ];

    private $nameParam = [
        'type' => 'string',
        'location' => 'json',
        'description' => 'The name of the resource',
    ];

    public function getNetwork()
    {
        return [
            'method' => 'GET',
            'path'   => $this->pathPrefix . '/networks/{id}',
            'params' => ['id' => $this->idParam],
        ];
    }

    public function postNetwork()
    {
        return [
            'path' => $this->pathPrefix . '/networks',
            'method' => 'POST',
            'jsonKey' => 'network',
            'params' => [
                'name' => $this->nameParam
            ]
        ];
    }

    public function deleteNetwork()
    {
        return [
            'method' => 'DELETE',
            'path'   => $this->pathPrefix . '/networks/{id}',
            'params' => ['id' => $this->idParam]
        ];
    }
}
