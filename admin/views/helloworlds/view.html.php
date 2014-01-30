<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import Joomla view library
jimport('joomla.application.component.view');

/**
 * HelloWorlds View
 *
 * @since  0.0.1
 */
class HelloWorldViewHelloWorlds extends JViewLegacy
{
		/**
		 * HelloWorlds view display method
		 *
		 * @param   [type]  $tpl  template
		 *
		 * @return [type]      [description]
		 */
		function display($tpl = null)
		{
				// Get data from the model
				$items = $this->get('Items');
				$pagination = $this->get('Pagination');

				// Check for errors.
				if (count($errors = $this->get('Errors')))
				{
						JError::raiseError(500, implode('<br />', $errors));

						return false;
				}
				// Assign data to the view
				$this->items = $items;
				$this->pagination = $pagination;

				// Set the toolbar and number of found items
				$this->addToolBar($this->pagination->total);

				// Display the template
				parent::display($tpl);

				// Set the document
				$this->setDocument();
		}

		/**
		 * Setting the toolbar
		 *
		 * @param   [type]  $total  template
		 *
		 * @return  void
		 */
		protected function addToolBar($total = null)
		{
			// Reflect number of items in title!
			JToolBarHelper::title(JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS') . ($total?' <span style ="font-size: 0.5em; vertical-align: middle;">(' . $total . ')</span>':''), 'helloworld');
			JToolBarHelper::deleteList('', 'helloworlds.delete');
			JToolBarHelper::editList('helloworld.edit');
			JToolBarHelper::addNew('helloworld.add');
		}

		/**
		 * Method to set up the document properties
		 *
		 * @return void
		 */
		protected function setDocument()
		{
				$document = JFactory::getDocument();
				$document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION'));
		}
}
