<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Zf2Tus\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $storeLocation = '';

        $config = $this->getServiceLocator()->get('Config');
        if (isset($config['uploading']['zf_tus_server']['storage_patch'])) {
            $storeLocation = $config['uploading']['zf_tus_server']['storage_patch'];
        }
        else {
            throw new \Exception('Error in configuration of ZfTusServer storage path.');
        }

        if (!file_exists($storeLocation)) {
            mkdir($storeLocation, $config['uploading']['zf_tus_server']['dirChmod']);
        }

        $debug = false;
        if (isset($config['uploading']['zf_tus_server']['allow_download_info'])) {
            $debug = $config['uploading']['zf_tus_server']['allow_download_info'];
        }

        // Create and configure server
        $server = new \ZfTusServer\Server(
                $storeLocation, $this->getRequest(), $debug
        );

        // Run server
        $server->process(true);
    }
}
