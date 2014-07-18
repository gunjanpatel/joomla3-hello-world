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
 * Categories Controller
 *
 * @since  0.0.1
 */
class HelloWorldControllerCategories extends JControllerAdmin
{
	/**
	 * Proxy for getModel
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  The array of possible config values. Optional.
	 *
	 * @return  object  The model.
	 *
	 * @since   1.6
	 */
	public function getModel($name = 'Category', $prefix = 'HelloworldModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	/**
	 * Rebuild the nested set tree.
	 *
	 * @return  bool  False on failure or error, true on success.
	 *
	 * @since   1.6
	 */
	public function rebuild()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$this->setRedirect(JRoute::_('index.php?option=com_helloworld&view=categories', false));

		$model = $this->getModel();

		if ($model->rebuild())
		{
			// Rebuild succeeded.
			$this->setMessage(JText::_('COM_CATEGORIES_REBUILD_SUCCESS'));

			return true;
		}
		else
		{
			// Rebuild failed.
			$this->setMessage(JText::_('COM_CATEGORIES_REBUILD_FAILURE'));

			return false;
		}
	}

	/**
	 * Method to search tags with AJAX
	 *
	 * @return  void
	 */
	public function searchAjax()
	{
		// Required objects
		$app = JFactory::getApplication();

		// Receive request data
		$filters = array(
			'like'      => trim($app->input->get('like', null)),
			'title'     => trim($app->input->get('title', null)),
			'flanguage' => $app->input->get('flanguage', null),
			'published' => $app->input->get('published', 1, 'integer'),
			'parent_id' => $app->input->get('parent_id', null)
		);

		if ($results = JHelperTags::searchTags($filters))
		{
			// Output a JSON object
			echo json_encode($results);
		}

		$app->close();
	}
}
