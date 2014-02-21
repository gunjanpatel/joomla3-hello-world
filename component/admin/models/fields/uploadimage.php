<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Form Field class for the Joomla CMS.
 * Provides a modal media selector including upload mechanism
 *
 * @package     Joomla.Libraries
 * @subpackage  Form
 * @since       1.6
 */
class JFormFieldUploadimage extends JFormField
{

// 	$style = '#img {
//        height:' .50. ';
//         }';
// $document->addStyleDeclaration( $style );

	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  1.6
	 */
	protected $type = 'uploadimage';
	/**
	 * The Upload File
	 *
	 * @return  [type]  [description]
	 */
	protected function getInput()
	{

		$html = array();
		$html[] = '<div>';
		$html[] = '<input type="file" name="'. $this->name . '" />';
		$html[] = '<div>';
		$html[] = '<img class="img-circle" src = "' . JUri::root() . '/media/com_helloworld/images/category/' . $this->value . '" />';
		$html[] = '</div>';
		$html[] = '<div>';
		$html[] = '<input type="hidden" value="'. $this->value . '" name="jform[hiddenimage]"/>';
		$html[] = '</div>';


		return implode("\n", $html);
	}
}
