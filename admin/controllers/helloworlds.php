<?php

// No direct access to this file
defined('_JEXEC') or die;

// Import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * HelloWorlds Controller
 *
 * @since  0.0.1
 */
class HelloWorldControllerHelloWorlds extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    [description]
	 * @param   string  $prefix  [description]
	 *
	 * @return [type]         [description]
	 */
		public function getModel($name = 'HelloWorld', $prefix = 'HelloWorldModel')
		{
				$model = parent::getModel($name, $prefix, array('ignore_request' => true));

				return $model;
		}
}
