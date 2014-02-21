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
jimport('joomla.filesystem.file');
/**
 * Category Model
 *
 * @since  0.0.1
 *
 */
class HelloWorldModelCategory extends JModelAdmin
{
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table
	 * @param   string  $prefix  The class
	 * @param   array   $config  Configuration array
	 *
	 * @return JTable A JTable object
	 *
	 * @since 1.6
	 */
	public function getTable($type = 'Category', $prefix = 'HelloWorldTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return mixed A JForm object on success, false on failure
	 *
	 * @since 1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_helloworld.category',
		'category',
		array(
		'control' => 'jform',
		'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return mixed The data for the form.
	 *
	 * @since 1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
		'com_helloworld.edit.category.data',
		array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	/**
	 * Method to save the form data.
	 *
	 * @param   array  $data  The  form  data.
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

		$hiddenfile = $input->post->get('jform', array(), array());

		// Retrieve file details from uploaded file, sent from upload form
		$file = $input->files->get('jform');

		// Clean up filename to get rid of strange characters like spaces etc
		$data['image'] = time() . '_' . JFile::makeSafe($file['image']['name']);
		$src = $file['image']['tmp_name'];
		$dest = JPATH_SITE . "/media/com_helloworld/images/category/" . $data['image'];

			if (preg_match('/(.)+jpe*g|gif|png/i', $file['image']['name']))
			{
				if (!JFile::upload($src, $dest))
				{
					return false;
				}
				else
				{
					unlink(JPATH_SITE . "/media/com_helloworld/images/category/" . $hiddenfile['hiddenimage']);
					$hiddenfile['hiddenimage'] = $data['image'];
				}
			}
			elseif (!empty($hiddenfile['hiddenimage']))
			{
				$data['image'] = JFile::makeSafe($hiddenfile['hiddenimage']);
			}
			else
			{
				$this->setError(JTEXT::_('Invalid'));

			}

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

	/**
	 * Method rebuild the entire nested set tree.
	 *
	 * @return  boolean  False on failure or error, true otherwise.
	 *
	 * @since   1.6
	 */
	public function rebuild()
	{
		// Get an instance of the table object.
		$table = $this->getTable();

		if (!$table->rebuild())
		{
			$this->setError($table->getError());

			return false;
		}

		// Clear the cache
		$this->cleanCache();

		return true;
	}
}
