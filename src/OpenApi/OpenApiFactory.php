<?php

namespace App\OpenApi;

use ApiPlatform\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\OpenApi\OpenApi;
use ApiPlatform\OpenApi\Model;
use ApiPlatform\OpenApi\Model\Operation;
use ApiPlatform\OpenApi\Model\PathItem;

class OpenApiFactory implements OpenApiFactoryInterface
{

    public function __construct(private OpenApiFactoryInterface $decorated)
    {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context);
        $paths = $openApi->getPaths();

        $openApi->getPaths()->addPath('/custom', (new PathItem(get: new Operation(
            summary: "Ceci est ma desxription",
            description: "Ceci est ma desxription",
            tags: ['Customize'],
            responses: []
        ))));


        $openApi = $openApi->withInfo((new Model\Info('Test Ariking Api', 'v1', 'Api de test'))->withExtensionProperty('info-key', 'Info value'));
        $openApi = $openApi->withExtensionProperty('key', 'Custom x-key value');
        $openApi = $openApi->withExtensionProperty('x-value', 'Custom x-value value');

        // to define base path URL
        // $openApi = $openApi->withServers([new Model\Server('https://foo.bar')]);

        return $openApi;
    }
}
