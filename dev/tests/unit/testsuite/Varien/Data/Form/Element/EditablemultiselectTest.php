<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Varien
 * @package     Varien_Data
 * @subpackage  unit_tests
 * @copyright   Copyright (c) 2012 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Varien_Data_Form_Element_EditablemultiselectTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Varien_Data_Form_Element_Editablemultiselect
     */
    protected $_model;

    protected function setUp()
    {
        $this->_model = new Varien_Data_Form_Element_Editablemultiselect();
        $values = array(
            array('value' => 1, 'label' => 'Value1'),
            array('value' => 2, 'label' => 'Value2'),
            array('value' => 3, 'label' => 'Value3'),
        );
        $value = array(1, 3);
        $this->_model->setForm(new Varien_Object());
        $this->_model->setData(array('values' => $values, 'value' => $value));
    }

    public function testGetElementHtmlRendersCustomAttributesWhenDisabled()
    {
        $this->_model->setDisabled(true);
        $elementHtml = $this->_model->getElementHtml();
        $this->assertContains('disabled="disabled"', $elementHtml);
        $this->assertContains('data-is-removable="no"', $elementHtml);
        $this->assertContains('data-is-editable="no"', $elementHtml);
    }

    public function testGetElementHtmlRendersRelatedJsClassInitialization()
    {
        $this->_model->setElementJsClass('CustomSelect');
        $elementHtml = $this->_model->getElementHtml();
        $this->assertContains('ElementControl = new CustomSelect(', $elementHtml);
        $this->assertContains('ElementControl.init();', $elementHtml);
    }
}
