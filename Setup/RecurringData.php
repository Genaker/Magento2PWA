class RecurringData implements \Magento\Framework\Setup\InstallDataInterface
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
 	$page = $this->_pageFactory->create();

        if (true || !$page->load('offline')) {

try {
            $page->setTitle('OfflinePage')
                ->setIdentifier('offline')
                ->setIsActive(true)
                ->setPageLayout('empty')
                ->setStores(array(0,1))
                ->setContent('<h1>Magento PWA Offline Page</h1>')
                ->save();
} catch (\Exception $e){
// it is okay
}
        }

        $setup->endSetup();
    }
}
