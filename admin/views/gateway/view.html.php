<?php
/**
 * This file is part of Joomla Estate Agency - Joomla! extension for real estate agency
*
* @package     Joomla.Administrator
* @subpackage  com_jea
* @copyright   Copyright (C) 2008 - 2017 PHILIP Sylvain. All rights reserved.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/


// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view');

require JPATH_COMPONENT . '/helpers/jea.php';

/**
 * Import View
 *
 * @package     Joomla.Administrator
 * @subpackage  com_jea
 */
class JeaViewGateway extends JViewLegacy
{

    /**
     * The component paramaters
     * 
     * @var Registry
     */
    protected $params = null;

    function display( $tpl = null )
    {
        $this->params = JComponentHelper::getParams('com_jea');

        JeaHelper::addSubmenu('tools');

        $this->state       = $this->get('State');

        $type = $this->state->get('type');
        $title = JText::_('COM_JEA_GATEWAYS');

        $this->item   = $this->get('Item');

        switch($this->_layout) {
            case 'edit' :
                $this->form   = $this->get('Form');

                JToolBarHelper::apply('gateway.apply');
                JToolBarHelper::save('gateway.save');
                JToolBarHelper::cancel('gateway.cancel');
                $isNew      = ($this->item->id == 0);
                $title .=  ' : ' . ($isNew ? JText::_( 'JACTION_CREATE' ) : JText::_( 'JACTION_EDIT' ) . ' : ' . $this->item->title);
                break;
        }

        JToolBarHelper::title($title, 'jea.png');

        parent::display($tpl);
    }


}
