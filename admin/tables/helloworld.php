<?php
/**
 * @package     Helloworld.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

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
	 * @param   [type]  &$db  [description]
	 */
	function __construct(&$db)
	{
		parent::__construct('#__helloworld', 'id', $db);
	}
}
