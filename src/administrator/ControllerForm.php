<?php

class SwaControllerForm extends JControllerForm
{

	public function save($key = null, $urlVar = null)
	{
		$saveResult = parent::save($key, $urlVar);

		JLog::add(
			implode(
				', ',
				array(
					JFactory::getUser()->name,
					get_called_class() . '::' . __FUNCTION__,
					json_encode($this->input->post->get('jform', array(), 'array')),
				)
			),
			JLog::INFO,
			'com_swa.audit_backend'
		);

		return $saveResult;
	}

}
