<?php

namespace CBEXT;

use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Client\ClientInterface;

/**
 * Сервисы, предоставляемые ядром КБ расширениям
 * 
 * Для получения объектов, реализующих конкретные сервисы ядра (PSR-11):
 *   * ContainerInterface
 * 
 * Для извещения ядра (и других расширений) о событиях (PSR-14):
 *   * EventDispatcherInterface
 * 
 * Для создания http-объектов (PSR-17):
 *   * RequestFactoryInterface
 *   * ResponseFactoryInterface
 *   * ServerRequestFactoryInterface
 *   * StreamFactoryInterface
 *   * UploadedFileFactoryInterface
 *   * UriFactoryInterface
 * 
 * Для выполнения http-запросов (PSR-18):
 *   * ClientInterface
 * 
 * Для выполнения запросов ко внутреннему API КБ:
 *   * query()
 */
interface ExtensionStewardInterface extends
    ContainerInterface,
    EventDispatcherInterface,
    RequestFactoryInterface,
    ResponseFactoryInterface,
    ServerRequestFactoryInterface,
    StreamFactoryInterface,
    UploadedFileFactoryInterface,
    UriFactoryInterface,
    ClientInterface
{
    /**
     * Вызов внутреннего API КБ
     * @param string $method    http-метод запроса
     * @param string $uri       uri запрашиваемого ресурса
     * @param array  $headers   http-заголовки запроса
     * @param array  $data      данные запроса (в формате jsonapi)
     * @return array            данные ответа (в формате jsonapi)
     */
    public function query(string $method, string $uri, array $headers = [], array $data = []): array;
}
