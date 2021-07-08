<?php

namespace Genaker\PWA\Block\Adminhtml;

use Magento\Backend\Block\Template;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Renderer\RendererInterface;

/**
 * Search block
 */
class Button extends Template implements RendererInterface
{
    protected $_template = 'Genaker_PWA::button.phtml';

    public function __construct(
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        //$this->setData('cache_lifetime', 86400);
    }

    /**
     * Render Search html
     *
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        return $this->toHtml();
    }

    private function getAdmin(){
        $conf = include(BP . '/app/etc/env.php');
        $adminURL = $conf['backend']['frontName']; 
        return $adminURL;
      }
      
    /**
     * @return string
     */
    public function getGenerateUrl()
    {
        return '/' . $this->getAdmin() . '/pwa/index/generate';
    }
}
