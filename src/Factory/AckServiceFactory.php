<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 29.5.15
 * Time: 15.16
 */

namespace Soil\AckServiceModule\Factory;

use Soil\AckService\Service\Ack;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AckServiceFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator)  {

        $odm = $serviceLocator->get('doctrine.documentmanager.odm_default');


        $service = new Ack($odm);

        return $service;
    }
}