<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class SwaViewMemberDetails extends JViewLegacy
{
	protected $state;

	protected $form;

	protected $params;

	protected $user;

	protected $member;

	public function display($tpl = null)
	{
		$app = JFactory::getApplication();

		$this->user   = JFactory::getUser();
		$this->state  = $this->get('State');
		$this->form   = $this->get('Form');
		$this->params = $app->getParams('com_swa');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
		}

		// If not logged in
		if ($this->user->id === 0)
		{
			$url = 'index.php?option=com_users';
			$url .= '&return=' . base64_encode(JURI::getInstance()->toString());
			$app->redirect(JRoute::_($url, false));
		}

		// Redirect to memberpayment if not paid
		$this->member = $this->get('Member');

		if (!$this->member->paid)
		{
			$app->redirect(JRoute::_('index.php?option=com_swa&view=memberpayment'));
		}

		parent::display($tpl);
	}

}
