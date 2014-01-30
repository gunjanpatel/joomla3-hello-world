<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import Joomla view library
jimport('joomla.application.component.view');

/**
 * HelloWorld View
 *
 * @since  0.0.1
 */
class HelloWorldViewHelloWorld extends JViewLegacy
{
		/**
		 * View form
		 *
		 * @var         form
		 */
		protected $form = null;

		/**
		 * Display method of Hello view
		 *
		 * @param   [type]  $tpl  [description]
		 *
		 * @return [type]      [description]
		 */
		public function display($tpl = null)
		{
				// Get the Data
				$form = $this->get('Form');
				$item = $this->get('Item');

				// Check for errors.
				if (count($errors = $this->get('Errors')))
				{
						JError::raiseError(500, implode('<br />', $errors));

						return false;
				}

				// Assign the Data
				$this->form = $form;
				$this->item = $item;

				// Set the toolbar
				$this->addToolBar();

				// Display the template
				parent::display($tpl);

				// Set the document
				$this->setDocument();
		}

		/**
		 * Setting the toolbar
		 *
		 * @return void
		 */
		protected function addToolBar()
		{
				$input = JFactory::getApplication()->input;
				$input->set('hidemainmenu', true);
				$isNew = ($this->item->id == 0);

				if ($isNew)
				{
					JToolBarHelper::title(JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLD_NEW'));
				}
				else
				{
					JToolBarHelper::title(JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLD_EDIT'));
				}

				JToolBarHelper::save('helloworld.save');
				JToolBarHelper::cancel('helloworld.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
		}

		/**
		 * Method to set up the document properties
		 *
		 * @return void
		 */
		protected function setDocument()
		{
				$isNew = ($this->item->id < 1);
				$document = JFactory::getDocument();
				$title = JText::_('COM_HELLOWORLD_HELLOWORLD_EDITING');

				if ($isNew)
				{
					$title = JText::_('COM_HELLOWORLD_HELLOWORLD_CREATING');
				}

				$document->setTitle($title);
		}
}
