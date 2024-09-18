<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Payment\Plugin;

use Magento\Framework\App\RequestInterface;
use Magento\Sales\Model\AdminOrder\Create;

/**
 * Class PaymentConfigurationProcess
 *
 * Removes inactive payment methods and group from checkout configuration.
 */
class AdminSetPaymentMethod
{
    /**
     * @param RequestInterface $request
     */
    public function __construct(
        private readonly RequestInterface $request
    ) {
    }

    /**
     * Checkout LayoutProcessor before process plugin.
     *
     * @param Create $subject
     * @param $data
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeImportPostData(Create $subject, $data)
    {
        if (!isset($data['payment_method']) && !isset($this->request->getParam('payment')['method'])) {
            $subject->setPaymentMethod('');
        }
    }
}
