<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Zf2Tus\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController {

    /**
     * @var array
     */
    private $config;

    public function __construct(array $config) {

        $this->config = $config;
    }

    public function indexAction() {
        $storeLocation = '';

        if (isset($this->config['uploading']['zf_tus_server']['storage_patch'])) {
            $storeLocation = $this->config['uploading']['zf_tus_server']['storage_patch'];
        }
        else {
            throw new \Exception('Error in configuration of ZfTusServer storage path.');
        }

        if (!file_exists($storeLocation)) {
            mkdir($storeLocation, $this->config['uploading']['zf_tus_server']['dirChmod']);
        }

        $debug = false;
        if (isset($this->config['uploading']['zf_tus_server']['allow_download_info'])) {
            $debug = $this->config['uploading']['zf_tus_server']['allow_download_info'];
        }

        // Create and configure server
        $server = new \ZfTusServer\Server(
                $storeLocation, $this->getRequest(), $debug
        );

        // Run server
        $server->process(true);
    }
}
