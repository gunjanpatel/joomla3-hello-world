<?php
/**
 * @package     HelloWorld.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

define('COM_HELLOWORLD_MEDIA', JPATH_SITE . '/media/helloworld');

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('HelloWorld');
$input = JFactory::getApplication()->input;
$controller->execute($input->getcmd('task'));
$controller->redirect();
