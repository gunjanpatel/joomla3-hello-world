<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class HelloWorldModelHelloWorld extends JModelItem
{
		/**
		 * @var array messages
		 */
		protected $messages;



		/**
		 * Returns a reference to the a Table object, always creating it.
		 *
		 * @param   string  $type    [description]
		 * @param   string  $prefix  [description]
		 * @param   array   $config  [description]
		 *
		 * @return   JTable  A database object
		 *
		 * @since       2.5
		 */
		public function getTable($type = 'HelloWorld', $prefix = 'HelloWorldTable', $config = array())
		{
				return JTable::getInstance($type, $prefix, $config);
		}

		/**
		 * Get the message
		 *
		 * @param   int  $id  The corresponding id of the message to be retrieved
		 *
		 * @return string The message to be displayed to the user
		 */
		public function getMsg($id = 1)
		{
				if (!is_array($this->messages))
				{
						$this->messages = array();
				}

				if (!isset($this->messages[$id]))
				{
						// Request the selected id
						$jinput = JFactory::getApplication()->input;
						$id = $jinput->get('id', 1, 'INT');

						// Get a TableHelloWorld instance
						$table = $this->getTable();

						// Load the message
						$table->load($id);

						// Assign the message
						$this->messages[$id] = $table->greeting;
				}

				return $this->messages[$id];
		}
}
