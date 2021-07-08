<?php
/**
 * Copyright © Yegor Shytikov yegorshytikov@gmail.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Genaker\PWA\ViewModel;

class Settings extends \Magento\Framework\DataObject implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    private $connection;
    private $storeManager;
    private $storeResolver;

    /**
     * Settings constructor.
     *
     */
    public function __construct(\Magento\Framework\App\ResourceConnection $connection,
                                \Magento\Store\Model\StoreResolver $storeResolver,
                                \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->connection = $connection->getConnection();
        $this->storeManager = $storeManager;
        $this->storeResolver = $storeResolver;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getSettings()
    {
        //Your viewModel code
        // you can use me in your template like:
        // $viewModel = $block->getData('viewModel');
        // echo $viewModel->getSettings();
        
        return __('Hello Developer!');
    }

    public function getPWAConfig(){
     
        return json_encode($this->getQueryData());
    }

    public function getQueryData()
    { 
        $tableName = $this->connection->getTableName('core_config_data');
        $storeId = 0; // $this->getCurrentStoreId();
       
        //ToDo: Magent multi store functionality is broken than we will not use scoped config and I'm not recommentding to use use magento multistore 
        $config = $this->connection->fetchAll("SELECT path,value FROM $tableName where scope_id in (0 , $storeId) and path like \"pwa/pwa_settings%\"");
        $normal = [];
        //var_dump($config);
     
        //header('Content-Type: application/json');
        //if (config[''])

        foreach ($config as $row){
            $normal[explode('/',$row['path'])[2]] = $row['value'];
           
        }
        // ToDo: This feature is not tested
        if ($normal['manifest_json'] !== null && strlen($normal['manifest_json']) > 10){
            $normal =  json_decode($normal['manifest_json']);
        } else {
        unset($normal['manifest_json']);
        $normal['icons'] = json_decode($normal['icons']);
        }     
        var_dump($normal);
        // validate manifest you can here - https://manifest-validator.appspot.com/
        echo(json_encode($normal));
        return $normal;
    }

    public function getCurrentStoreId()
    {
        return $this->storeResolver->getCurrentStoreId();
    }
}