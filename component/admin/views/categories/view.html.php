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

/**
 * Categories View
 *
 * @since  0.0.1
 */
class HelloWorldViewCategories extends JViewLegacy
{
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Assign data to the view
		$items      = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Get data from the model
		$this->state = $this->get('state');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		$this->items         = $this->get('Items');
		$this->pagination    = $this->get('Pagination');
		$this->state         = $this->get('State');
		$this->filterForm    = $this->get('FilterForm');

		// Set the tool-bar and number of found items
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		$title = JText::_('COM_HELLOWORLD_MANAGER_CATEGORIES');
		$cando	= null;
		$user 	= JFactory::getuser();

		$categoryID = $this->state->get('filter.category_id');
		$component 	= $this->state->get('filter.component');
		$section	= $this->state->get('filter.section');
		$extension	= JFactory::getApplication()->input->get('extension', '', 'word');

		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}

		if (JFactory::getUser()->authorise('core.create', 'com_helloworld'))
		{
			JToolBarHelper::addNew('category.add');
		}

		JToolBarHelper::title($title, 'category');
		JToolbarHelper::publish('categories.publish', 'JTOOLBAR_PUBLISH', true);
		JToolbarHelper::unpublish('categories.unpublish', 'JTOOLBAR_UNPUBLISH', true);

		// Options button.
		if (JFactory::getUser()->authorise('core.delete', 'com_helloworld'))
		{
			JToolBarHelper::deleteList('', 'Categories.delete');
		}

		if (JFactory::getUser()->authorise('core.edit', 'com_helloworld'))
		{
			JToolBarHelper::editList('category.edit');
		}

		if (JFactory::getUser()->authorise('core.admin', 'com_helloworld'))
		{
			JToolBarHelper::preferences('com_helloworld');
		}

		JToolbarHelper::custom('categories.rebuild', 'refresh.png', 'refresh_f2.png', 'JTOOLBAR_REBUILD', false);
	}
}
