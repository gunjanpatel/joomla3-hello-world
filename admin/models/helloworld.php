<?php
	/**
	 * @package     Joomla.Administrator
	 * @subpackage  com_languages
	 *
	 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * HelloWorlds Model
 *
 * @since  0.0.1
 */
class HelloWorldModelHelloWorld extends JModelAdmin
{
	/**
	 * getTable description]Returns a reference to the a Table object, always creating it.
	 *
	 * @param   string  $type    [description]
	 * @param   string  $prefix  [description]
	 * @param   array   $config  [description]
	 *
	 * @return  [type]           [description]
	 */
	public function getTable($type = 'HelloWorld', $prefix = 'HelloWorldTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      [description]
	 * @param   boolean  $loadData  [description]
	 *
	 * @return  [type]              [description]
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_helloworld.helloworld', 'helloworld',
		array('control' => 'jform', 'load_data' => $loadData)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return      mixed   The data for the form.
	 *
	 * @since       2.5
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_helloworld.edit.helloworld.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}
}
