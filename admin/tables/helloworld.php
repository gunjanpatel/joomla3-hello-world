<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla table library
jimport('joomla.database.table');

/**
 * Hello Table class
 *
 * @since  0.0.1
 */
class HelloWorldTableHelloWorld extends JTable
{
		/**
		 * Constructor
		 *
		 * @param   [type]  $db  [description]
		 */
		function __construct(&$db)
		{
				parent::__construct('#__helloworld', 'id', $db);
		}
}
