<?php
/**
 * @package     Helloworld.site
 * @subpackage  com_categories
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla table library
jimport('joomla.database.table');

/**
 * HelloWorld Table
 *
 * @since  0.0.1.
 */
class HelloWorldTableHelloWorld extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   [type]  &$db  [description]
	 */
	function __construct(&$db)
	{
		parent::__construct('#__helloworld', 'id', $db);
	}
}
