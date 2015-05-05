<?php
/**
 * @package     HelloWorld.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-helloworld {background-image: url(../media/com_helloworld/images/tux-16x16.png);}');

// Require helper file
JLoader::register('HelloWorldHelper', JPATH_COMPONENT . '/helpers/helloworld.php');

define('COM_HELLOWORLD_MEDIA', JPATH_SITE . '/media/com_helloworld');

JLoader::import('csv', JPATH_ADMINISTRATOR . '/components/com_helloworld/views');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_helloworld'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('HelloWorld');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
