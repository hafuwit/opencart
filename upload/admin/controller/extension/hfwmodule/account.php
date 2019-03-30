<?php

class ControllerExtensionHfwmoduleAccount extends Controller {

   	public function index() {
        $this->load->language('extension/hfwmodule/translate');
        $this->load->model('extension/hfwmodule/account');
		$this->document->setTitle($this->language->get('text_account'));
		$this->getForm();
	}

	protected function getForm() {
		$data['title'] = $this->language->get('title');
		$data['text_hfw_sample_module'] = $this->language->get('text_hfw_sample_module');
		$data['text_account'] = $this->language->get('text_account');
		$data['text_error'] = $this->language->get('text_error');
		$url = '';

		//action url
        //$data['action'] = $this->url->link('extension/hfwmodule/account/saveAccount&user_token=' . $this->session->data['user_token'], true);
        $data['info_url'] = $this->url->link('extension/hfwmodule/info&user_token=' . $this->session->data['user_token'], true);

		//Infor account
        $data['account_title'] = $this->language->get('account_title');

        // $data['Mr'] = $this->language->get('account_Mr');
        // $data['Miss'] = $this->language->get('account_Miss');
        // $data['Mrs'] = $this->language->get('account_Mrs');
        // $data['Ms'] = $this->language->get('account_Ms');
		// $data['account_address_type'] = $this->language->get('account_address_type');
		// $data['account_placeholder_address_type'] = $this->language->get('account_placeholder_address_type');
		// $data['account_tooltip_address_type'] = $this->language->get('account_tooltip_address_type');
		// $data['account_full_name'] = $this->language->get('account_full_name');
		// $data['account_address'] = $this->language->get('account_address');
		// $data['account_placeholder_address1'] = $this->language->get('account_placeholder_address1');
		// $data['account_placeholder_address2'] = $this->language->get('account_placeholder_address2');
		// $data['account_placeholder_address3'] = $this->language->get('account_placeholder_address3');
		// $data['account_company'] = $this->language->get('account_company');
		// $data['account_email'] = $this->language->get('account_email');
		// $data['account_phone_number'] = $this->language->get('account_phone_number');
		// $data['account_postal_code'] = $this->language->get('account_postal_code');
		// $data['account_tooltip_postal_code'] = $this->language->get('account_tooltip_postal_code');
		// $data['account_city'] = $this->language->get('account_city');
		// $data['account_country'] = $this->language->get('account_country');
		// $data['account_account_name'] = $this->language->get('account_account_name');
		// $data['account_tooltip_account_name'] = $this->language->get('account_tooltip_account_name');
		// $data['account_account_number'] = $this->language->get('account_account_number');
		// $data['account_tooltip_account_number'] = $this->language->get('account_tooltip_account_number');
		// $data['account_invoice_number'] = $this->language->get('account_invoice_number');
		// $data['account_tooltip_invoice_number'] = $this->language->get('account_tooltip_invoice_number');
		// $data['account_invoice_amount'] = $this->language->get('account_invoice_amount');
		// $data['account_tooltip_invoice_amount'] = $this->language->get('account_tooltip_invoice_amount');
		// $data['account_currency'] = $this->language->get('account_currency');
		// $data['account_invoice_date'] = $this->language->get('account_invoice_date');
		// $data['account_tooltip_invoice_date'] = $this->language->get('account_tooltip_invoice_date');
        
		//Button
		$data['button_next'] = $this->language->get('button_next');

		#region breadcrumb
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('extension/hfwmodule/account', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);
		#end

		$data['user_token'] = $this->session->data['user_token'];

		#region Include
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        #end

		$this->response->setOutput($this->load->view('extension/hfwmodule/account', $data));
	}

	public function saveAccount() {
		$this->load->language('extension/hfwmodule/translate');
        $this->load->model('extension/hfwmodule/account');
        $error = false;
        $error_message = '';
        echo json_encode(['error' => $error, 'error_message' => $error_message]);
    }
}
