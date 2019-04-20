<?php
class ControllerExtensionHfwmoduleHfwservice extends Controller {
	public function index() {
		
	}
 
	public function addCheckout() {
		
		$this->load->model('extension/shipping/hfwsample');
		$service_id = $this->request->get['service_id'];
		$this->session->data['hfw_service_id'] =  $service_id;
		//Set Price
		$total = $this->model_extension_shipping_hfwsample->getPriceService($service_id);
		echo $total;
	}
	
	public function getLocator() { 
		$select = $this->language->get('text_select'); 
		$open = $this->language->get('text_open'); 
		$close = $this->language->get('text_close'); 
		$html = "<p>Locator</p>";
		$this->response->setOutput($html);
	}
}