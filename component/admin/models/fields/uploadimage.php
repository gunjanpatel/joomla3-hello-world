<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

jimport('joomla.image.image');
/**
 * Form Field class for the Joomla Framework.
 *
 * @since  0.0.6
 */
class JFormFieldUploadImage extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var      string
	 * @since   1.6
	 */
	protected $type = 'UploadImage';

	/**
	 * Method to get the field input markup.
	 *
	 * @return   string   The field input markup.
	 *
	 * @since   1.6
	 */
	protected function getInput()
	{
		$html = array();
		$html[] = '<div class="button2-left">';
		$html[] = '<input type="file" name="' . $this->name . '"/>';
		$html[] = '</div>';
		$html[] = '<div>';
		$html[] = '<img  src="' . JUri::root() . 'media/com_helloworld/images/category/' . $this->value . '"/>';
		$html[] = '<input type="hidden" value="' . $this->value . '" name="jform[hiddenimage]"/>';
		$html[] = '</div>';

		return implode("\n", $html);
	}
}
