<?php declare(strict_types=1);


namespace Swoft\Consul\Contract;


use Swoft\Consul\Response;

/**
 * Class CatalogInterface
 *
 * @since 2.0
 */
interface CatalogInterface
{
    /**
     * @param string $node
     *
     * @return Response
     */
    public function register(string $node): Response;

    /**
     * @param string $node
     *
     * @return Response
     */
    public function deregister(string $node): Response;

    /**
     * @return Response
     */
    public function datacenters(): Response;

    /**
     * @param array $options
     *
     * @return Response
     */
    public function nodes(array $options = []): Response;

    /**
     * @param string $node
     * @param array  $options
     *
     * @return Response
     */
    public function node(string $node, array $options = []): Response;

    /**
     * @param array $options
     *
     * @return Response
     */
    public function services(array $options = []): Response;

    /**
     * @param string $service
     * @param array  $options
     *
     * @return Response
     */
    public function service(string $service, array $options = []): Response;
}