<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class HelloWorldModelHelloWorld extends JModelAdmin
{

	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param   string  $type    [description]
	 * @param   string  $prefix  [description]
	 * @param   array   $config  [description]
	 *
	 * @return  JTable  A database object
	 *
	 * @since       2.5
	 */
	public function getTable($type = 'HelloWorld', $prefix = 'HelloWorldTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return      mixed   A JForm object on success, false on failure
	 *
	 * @since       2.5
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_helloworld.helloworld', 'helloworld', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}
		/*echo  "<br>";
		print_r($form);
		die();*/


		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return      mixed   The data for the form.
	 *
	 * @since       2.5
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_helloworld.edit.helloworld.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	/**
	* Method to save the form data.
	*
	* @param array $data The form data.
	*
	* @return boolean True on success.
	*
	* @since 1.6
	*/
	public function save($data)
	{
		$table = $this->getTable();
		$input = JFactory::getApplication()->input;
		$pk = (!empty($data['id'])) ? $data['id'] : (int) $this->getState($this->getName() . '.id');
		$isNew = true;

		// Load the row if saving an existing category.
		if ($pk > 0)
		{
			$table->load($pk);
			$isNew = false;
		}

		// Set the new parent id if parent id not matched OR while New/Save as Copy .
		if ($table->parent_id != $data['parent_id'] || $data['id'] == 0)
		{
			$table->setLocation($data['parent_id'], 'last-child');
		}

		// Alter the title for save as copy
		if ($input->get('task') == 'save2copy')
		{
			list($title, $alias) = $this->generateNewTitle($data['parent_id'], $data['alias'], $data['title']);
			$data['title'] = $title;
			$data['alias'] = $alias;
			$data['published'] = 0;
		}

		// Bind the data.
		if (!$table->bind($data))
		{
			$this->setError($table->getError());

			return false;
		}

		// Bind the rules.
		if (isset($data['rules']))
		{
			$rules = new JAccessRules($data['rules']);
			$table->setRules($rules);
		}

		// Check the data.
		if (!$table->check())
		{
			$this->setError($table->getError());

			return false;
		}

		// Store the data.
		if (!$table->store())
		{
			$this->setError($table->getError());

			return false;
		}

		// Rebuild the path for the category:
		if (!$table->rebuildPath($table->id))
		{
			$this->setError($table->getError());

			return false;
		}

		// Rebuild the paths of the category's children:
		if (!$table->rebuild($table->id, $table->lft, $table->level, $table->path))
		{
			$this->setError($table->getError());

			return false;
		}

		$this->setState($this->getName() . '.id', $table->id);

		// Clear the cache
		$this->cleanCache();

		return true;
	}
}
