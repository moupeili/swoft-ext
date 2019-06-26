<?php declare(strict_types=1);


namespace Swoft\Consul;


use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Consul\Contract\CatalogInterface;
use Swoft\Consul\Helper\OptionsResolver;

/**
 * Class Catalog
 *
 * @since 2.0
 *
 * @Bean()
 */
class Catalog implements CatalogInterface
{
    /**
     * @Inject()
     *
     * @var Consul
     */
    private $consul;

    /**
     * @param string $node
     *
     * @return Response
     */
    public function register(string $node): Response
    {
        $params = [
            'body' => $node,
        ];

        return $this->consul->get('/v1/catalog/register', $params);
    }

    /**
     * @param string $node
     *
     * @return Response
     */
    public function deregister(string $node): Response
    {
        $params = [
            'body' => $node,
        ];

        return $this->consul->put('/v1/catalog/deregister', $params);
    }

    /**
     * @return Response
     */
    public function datacenters(): Response
    {
        return $this->consul->get('/v1/catalog/datacenters');
    }

    /**
     * @param array $options
     *
     * @return Response
     */
    public function nodes(array $options = []): Response
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];

        return $this->consul->get('/v1/catalog/nodes', $params);
    }

    /**
     * @param string $node
     * @param array  $options
     *
     * @return Response
     */
    public function node(string $node, array $options = []): Response
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];

        return $this->consul->get('/v1/catalog/node/' . $node, $params);
    }

    /**
     * @param array $options
     *
     * @return Response
     */
    public function services(array $options = []): Response
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc']),
        ];

        return $this->consul->get('/v1/catalog/services', $params);
    }

    /**
     * @param string $service
     * @param array  $options
     *
     * @return Response
     */
    public function service(string $service, array $options = []): Response
    {
        $params = [
            'query' => OptionsResolver::resolve($options, ['dc', 'tag']),
        ];

        return $this->consul->get('/v1/catalog/service/' . $service, $params);
    }
}