<?php
/**
 * Copyright © Yegor Shytikov yegorshytikov@gmail.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Genaker\PWA;

class ManifestGenerator 
{

    protected $settings;
    /**
     * Settings constructor.
     *
     */
    public function __construct(\Genaker\PWA\ViewModel\Settings $settings)
    {
      $this->settings = $settings;
    }

    /**
     * @return string
     */
    public function generate()
    {

        $manifestJson = $this->settings->getPWAConfig();
        $root = BP;
        $dir = __DIR__;
        $this->exec("mkdir -p $root/pub/media/pwa/");

        file_put_contents("$root/pub/media/pwa/manifest.json", $manifestJson);
        $this->exec("cp -r $dir/pub/* $root/pub/media/pwa/");
        $this->exec("cp -r $dir/pub/serviceworker.js $root/pub/");
        
        return true;
    }

    public function exec($command)
    {
        if (function_exists('exec')) {
            exec($command, $data, $status);
           if (!$status) echo implode("\n", $data);
           return $data;
        } else {
            throw new \Exception(__('PHP function "exec" not available (disabled)'));
        }
    }
}

