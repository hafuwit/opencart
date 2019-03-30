<?php
class ControllerExtensionHfwmoduleHfwservice extends Controller {
	public function index() {
		
	}
 
	public function addCheckout() {
		
		$this->load->model('extension/shipping/hfwsample');
		$service_id = $this->request->get['service_id'];
		$this->session->data['ups_service_id'] =  $service_id;
		//Set Price
		$total = $this->model_extension_shipping_hfwsample->getPriceService($service_id);
		echo $total;
	}
	
	public function getLocator() { 
		$select = $this->language->get('text_select'); 
		$open = $this->language->get('text_open'); 
		$close = $this->language->get('text_close'); 
		
		
		$full_address = $this->request->post['full_address'];
		$country_code = $this->request->post['country_code'];
		$maximum_size = $this->request->post['maximum_size'];
		$nearby = $this->request->post['nearby'];
		$html = "<p>Locator</p>";
		$this->response->setOutput($html);
	}
}