<?php
class ControllerExtensionModuleHfwmodule extends Controller {
	private $error = array();
	private $codename = 'hfwmodule';
	public function index() {
		$this->load->model('extension/module/hfwmodule');
		$this->load->language('extension/module/hfwmodule');

		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('hfw_sample_module', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['entry_status'] = $this->language->get('entry_status');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/hfwmodule', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/hfwmodule', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->post['module_hfwmodule_status'])) {
			$data['module_hfwmodule_status'] = $this->request->post['module_hfwmodule_status'];
		} else {
			$data['module_hfwmodule_status'] = $this->config->get('module_hfwmodule_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->permissionHandler('main');

		$this->response->setOutput($this->load->view('extension/module/hfwmodule', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/hfwmodule')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function install() {

		$this->load->model('extension/module/hfwmodule');
        $this->model_extension_module_hfwmodule->createTables( );

		$this->permissionHandler('all');

	}

	private function permissionHandler($perm = 'main')
    {
		$this->load->model('user/user_group');

		$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/'.$this->codename);
        $this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/'.$this->codename);

		if ($perm == 'all') {
			$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/' . $this->codename . '/about');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/' . $this->codename . '/about');

			$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/' . $this->codename . '/account');
            $this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/' . $this->codename . '/account');

			$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/' . $this->codename . '/info');
			$this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/' . $this->codename . '/info');
		}
	}

	public function uninstall() {

		$this->load->model('setting/setting');
		$this->load->model('extension/module/hfwmodule');

        $this->model_setting_setting->deleteSetting('hfw_sample_module');

		$this->load->model('extension/module/hfwmodule');
        $this->model_extension_module_hfwmodule->deleteDatabase();

		$this->removePermission();
	}

	public function removePermission() {

		$this->load->model('user/user_group');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'extension/' . $this->codename . '/about');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'extension/' . $this->codename . '/about');

		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'extension/' . $this->codename . '/account');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'extension/' . $this->codename . '/account');

		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'access', 'extension/' . $this->codename . '/info');
		$this->model_user_user_group->removePermission($this->user->getGroupId(), 'modify', 'extension/' . $this->codename . '/info');
	}
}