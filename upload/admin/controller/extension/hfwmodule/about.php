<?php

class ControllerExtensionHfwmoduleAbout extends Controller {

   	public function index() {
        $this->load->language('extension/hfwmodule/translate');
        $this->load->model('extension/hfwmodule/about');
		$this->document->setTitle($this->language->get('text_about'));
		$this->getForm();
	}

	protected function getForm() {
		$data['title'] = $this->language->get('title');
		$data['text_hfw_sample_module'] = $this->language->get('text_hfw_sample_module');
		$data['text_about'] = $this->language->get('text_about');
		$data['text_error'] = $this->language->get('text_error');
		$url = '';

		#region breadcrumb
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_about'),
			'href' => $this->url->link('extension/hfwmodule/about', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);
		#end

		$data['user_token'] = $this->session->data['user_token'];

		#region Include
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        #end

		$this->response->setOutput($this->load->view('extension/hfwmodule/about', $data));
	}
}
