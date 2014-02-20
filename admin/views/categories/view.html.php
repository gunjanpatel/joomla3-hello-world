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
	protected $canDo;

	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Get data from the model
		$this->state = $this->get('State');
		$items       = $this->get('Items');
		$pagination  = $this->get('Pagination');
		$this->filterForm = $this->get('filterForm');
		$this->activeFilters = $this->get('ActiveFilters');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Assign data to the view
		$this->items      = $items;
		$this->pagination = $pagination;

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
		$user = JFactory::getUser();
		$userId = $user->get('id');
		$canDo = null;

		// Get the results for each action.
		$extension  = JFactory::getApplication()->input->get('task', '', 'word');

		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 1em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>" . " " . $userId;
		}

		JToolBarHelper::title($title, 'category');

		// New button.
		if ($user->authorise('core.create', 'com_helloworld'))
		{
			JToolBarHelper::addNew('category.add');
		}

		// Edit button.
		if ($user->authorise('core.edit', 'com_helloworld'))
		{
			JToolBarHelper::editList('category.edit');
		}

		// Delete button.
		if ($user->authorise('core.delete', 'com_helloworld'))
		{
			JToolBarHelper::deleteList('', 'Categories.delete');
		}


		JToolbarHelper::publish('categories.publish', 'JTOOLBAR_PUBLISH', true);
		JToolbarHelper::unpublish('categories.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolbarHelper::archiveList('categories.archive');
		JToolBarHelper::trash('categories.trash');
		JToolbarHelper::checkin('categories.checkin');

		JToolbarHelper::custom('categories.rebuild', 'refresh.png', 'refresh_f2.png', 'JTOOLBAR_REBUILD', false);

		// Options button.
		if ($user->authorise('core.admin', 'com_helloworld'))
		{
			JToolBarHelper::preferences('com_helloworld');
		}
		JHtmlSidebar::setAction('index.php?option=com_helloworld');

		JToolbarHelper::help('JHELP_COMPONENTS_TAGS_MANAGER');
		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_ACCESS'),
			'filter_access',
			JHtml::_('select.options', JHtml::_('access.assetgroups'), 'value', 'text', $this->state->get('filter.access'))
		);
	}

	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   3.0
	 */
	protected function getSortFields()
	{
		return array(

			'c.published' => JText::_('JSTATUS'),
			'c.title' => JText::_('JGLOBAL_TITLE'),
			//'uc.name' => JText::_('COM_CONTACT_FIELD_LINKED_USER_LABEL'),
			//'c.access' => JText::_('JGRID_HEADING_ACCESS'),
			'access_level' => JText::_('JGRID_HEADING_ACCESS'),
			'c.id' => JText::_('JGRID_HEADING_ID')
		);
	}
}
