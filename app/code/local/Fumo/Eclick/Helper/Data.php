<?php
/*
 * Mage Fumo Eclick
 *
 * NOTICE OF LICENSE
 * This source file is subject to the Mage Fumo EULA License which is bundled with
 * this package in the files LICENSE.txt.
 *
 * DISCLAIMER
 * It is strictly prohibited to copy, redistribute, republish or modify
 * (in parts or whole) this file or any other file included in the same package.
 *
 * @category    Service Integration Extension
 * @package     Fumo_Eclick
 * @author      Fumo 2014/12/15
 * @copyright   Copyright (c) 2008-2015 Mage Fumo. (http://http://mage.fu-mo.co.jp//)
 * @license     Mage Fumo EULA License
 */

class Fumo_Eclick_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getEclickInfo()
    {
		$orderId = (int) Mage::getSingleton('checkout/session')->getLastOrderId();
        
        $order = Mage::getModel('sales/order')->load($orderId);
        $total = $order->subtotal;
        $ordernumber = $order->increment_id;
        
        if ($total > 0) {
            $total = floor($total);
        } else {
            $total = 1;
        }

        if (isset($ordernumber)) {
            $ordernumber = $ordernumber;
        } else {
            $ordernumber = 1;
        }
        
        return array($total, $ordernumber);
	}
	
	public function isEclickEnabled()
    {
        return Mage::getStoreConfigFlag('fumo_eclick/general/enabled');
    }

}