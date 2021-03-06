<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

class SwaModelMemberPayment extends SwaModelItem
{

	public function getTable($type = 'Member', $prefix = 'SwaTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * @return JTable
	 */
	public function getItem()
	{
		$user  = JFactory::getUser();
		$table = $this->getTable();
		$table->load(array('user_id' => $user->id));

		return $table;
	}

}
