<?php
/**
 * Created by PhpStorm.
 * User: magentodev
 * Date: 22.11.2017
 * Time: 4:21
 */

class Yarmolich_ProductHistory_Helper_data
    extends Mage_Core_Helper_Abstract
{
    const PHP_DATETIME_FORMAT = 'Y-M-d H:i:s';

    /**
     * Get current date/time in  human format
     * @return mixed
     */
    public function currentDate()
    {
        return Mage::getModel('core/date')->gmtDate(static::PHP_DATETIME_FORMAT);
    }

    /**
     * Get remote address
     * @return mixed
     */
    public function getAdminIp()
    {
        return Mage::helper('core/http')->getRemoteAddr($ipToLong = false);
    }

    /**
     * @return string
     */
    public function getAdminName()
    {
        $user = Mage::getSingleton('admin/session');
        $userFirstName = $user->getUser()->getFirstname();
        $userLastName = $user->getUser()->getLastname();

        return sprintf("%s %s", $userFirstName, $userLastName);
    }
}
