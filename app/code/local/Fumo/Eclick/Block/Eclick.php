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
 * @category	Service Integration Extension
 * @package		Fumo_Eclick
 * @author		Fumo 2014/12/15
 * @copyright	Copyright (c) 2008-2015 Mage Fumo. (http://http://mage.fu-mo.co.jp//)
 * @license		Mage Fumo EULA License
 */

class Fumo_Eclick_Block_Eclick extends Mage_Core_Block_Abstract
{
	public function __construct()
	{
		parent::__construct();
		$this->setEclickAffiliateTag(Mage::getStoreConfig('fumo_eclick/general/eclick_affiliate_tag'));
	}
	
	protected function _toHtml()
	{
		$html = "";
	
		if (Mage::helper('fumo_eclick')->isEclickEnabled()) {
		
			$info = Mage::helper('fumo_eclick')->getEclickInfo();

			$tag = $this->getEclickAffiliateTag();
			if (Mage::app()->getStore()->isCurrentlySecure()) {
				$tag = preg_replace("/(http:)/", "https:", $tag);
			}
			$tag = preg_replace("/(税抜売上金額)/", $info[0], $tag);
			$tag = preg_replace("/(識別コード)/", $info[1], $tag);

			$html .= $tag;
		}
		
		return $html;
	}
}