<?php

class ControllerExtensionHfwmoduleInfo extends Controller {

   	public function index() {
        $this->load->language('extension/hfwmodule/translate');
        $this->load->model('extension/hfwmodule/info');
		$this->getForm();
	}

	protected function getForm() {
		$data['title'] = $this->language->get('title');
		$data['text_hfw_sample_module'] = $this->language->get('text_hfw_sample_module');
		$data['text_info'] = $this->language->get('text_info');
		$data['text_error'] = $this->language->get('text_error');
		$url = '';

		#region breadcrumb
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_info'),
			'href' => $this->url->link('extension/hfwmodule/info', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);
		#end

		$data['user_token'] = $this->session->data['user_token'];

		#region Include
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        #end

		$this->response->setOutput($this->load->view('extension/hfwmodule/info', $data));
	}
}
