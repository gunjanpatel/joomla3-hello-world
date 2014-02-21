<?php
/**
 * @package     HelloWorld.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('JPATH_PLATFORM') or die;

/**
 * HelloWorld Form Field class for the HelloWorld component
 *
 * @since  0.0.1
 */


class JFormFieldHello extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'uploadimage';

	/**
	 * This function get the input
	 *
	 * @return  [type]  [description]
	 */
	protected function getInput()
	{
		$html = array();
		$html[] = '<div>';
		$html[] = '<input type="file" name="' . $this->name . '"/>';
		$html[] = '</div>';
		$html[] = '<div>';
		$html[] = '<img class="img-circle" src="' . JUri::root() . '/media/helloworld/images/category/' . $this->value . '" />';
		$html[] = '<input type="hidden" value="' . $this->value . '" name="jform[hiddenimage]"/>';
		$html[] = '</div>';

		return implode("\n", $html);
	}
}
