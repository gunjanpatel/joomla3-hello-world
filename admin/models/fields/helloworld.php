<?php

// No direct access to this file
defined('_JEXEC') or die;

// Import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 *
 * @since  0.0.1
 */
class JFormFieldHelloWorld extends JFormFieldList
{
	/**
	 * The field type.
	 * @var string
	 */
	protected $type = 'HelloWorld';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return      array           An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(
						array('id', 'parent_id',
							'lft', 'rgt',
							'title', 'alias',
							'level')))
			->From('#__helloworld_category');

		// Reset the query using our newly populated query object.
		$db->setQuery($query);
		$messages = $db->loadObjectList();
		$options = array();

		if ($messages)
		{
				foreach ($messages as $message)
				{
						$options[] = JHtml::_('select.option', $message->id, $message->parent_id, $message->lft, $message->rgt,  $message->title, $message->alias, $message->level);
				}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
