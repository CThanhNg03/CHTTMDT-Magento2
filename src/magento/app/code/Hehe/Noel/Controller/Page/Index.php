<?php
namespace Hehe\Noel\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Module\Dir\Reader;

class Index extends Action
{
    protected $resultRawFactory;
    protected $moduleDirReader;

    public function __construct(
        Context $context,
        RawFactory $resultRawFactory,
        Reader $moduleDirReader
    ) {
        parent::__construct($context);
        $this->resultRawFactory = $resultRawFactory;
        $this->moduleDirReader = $moduleDirReader;
    }

    public function execute()
    {
        // Replace 'Hehe_Noel' with your actual module name
        $moduleDir = $this->moduleDirReader->getModuleDir('view', 'Hehe_Noel');
        $filePath = $moduleDir . '/frontend/html/index.html';

        // Read the content of the file
        $html = file_get_contents($filePath);

        /** @var Raw $resultRaw */
        $resultRaw = $this->resultRawFactory->create();
        $resultRaw->setContents($html);

        return $resultRaw;
    }
}
