<?php
/**
 * Copyright © Yegor Shytikov yegorshytikov@gmail.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Genaker\PWA\Model\Config\Source;

class Display implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray()
    {
        return [['value' => 'fullscreen', 'label' => __('fullscreen')],['value' => 'standalone', 'label' => __('standalone')],['value' => 'minimal-ui', 'label' => __('minimal-ui')],['value' => 'browser', 'label' => __('browser')]];
    }

    public function toArray()
    {
        return ['fullscreen' => __('fullscreen'),'standalone' => __('standalone'),'minimal-ui' => __('minimal-ui'),'browser' => __('browser')];
    }
}

