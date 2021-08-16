<?php
 
namespace Genaker\Magento2PWA\Setup;
 
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
/**
 * @codeCoverageIgnore
 */
class InstallData implements UpgradeDataInterface
{
    /**
     * @var \Magento\Cms\Model\PageFactory
     */
    protected $_pageFactory;
 
    /**
     * Construct
     *
     * @param \Magento\Cms\Model\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Cms\Model\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
    }
 
    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        if (version_compare($context->getVersion(), '1.0.7') < 0) {
            $page = $this->_pageFactory->create();
            $page->setTitle('OfflinePage')
                ->setIdentifier('offline')
                ->setIsActive(true)
                ->setPageLayout('empty')
                ->setStores(array(0))
                ->setContent('<h1>Magento PWA Offline Page</h1>')
                ->save();
        }
 
        $setup->endSetup();
    }
}
