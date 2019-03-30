<?php
class ModelExtensionShippingHfwsample extends Model {
	public function getQuote($address) {
		$this->load->language('extension/hfwmodule/translate');
		$session = $this->session->data; 
		$data = array();
		#region language
		$data['title1'] = $this->language->get('heading_title1'); 
		$data['title2'] = $this->language->get('heading_title2'); 
		$data['title3'] = $this->language->get('heading_title3'); 
		$data['sub'] = $this->language->get('heading_sub'); 
		$data['notice_ap'] = $this->language->get('notice_ap'); 
		$data['search_the_access_point'] = $this->language->get('text_search_the_access_point'); 
		$data['near'] = $this->language->get('text_near'); 
		$data['use_my_delivery_address'] = $this->language->get('text_use_my_delivery_address'); 
		
		$data['search_address'] = $this->language->get('text_search_address'); 
		$data['deliver_to_your_address'] = $this->language->get('deliver_to_your_address'); 
		$data['notice_ad'] = $this->language->get('notice_ad'); 
		$delivered_by = $this->language->get('text_delivered_by'); 
		#end
		#region data
		$data['country'] = $country;
		$data['address'] = $address;
		$data['show_ap'] = 1;
		$data['show_add'] = 1;
		#end
		
		//Address 
		if (isset($session['shipping_address'])) {
			$shipping_address = $session['shipping_address'];
			
			$subtotal = $this->cart->getSubTotal();
			$getTaxes = $this->cart->getTaxes();		
		}

		//$cost = $this->session->data['shipping_methods']['hfwsample']['quote']['hfwsample']['cost'];
		
		$data['service_id'] = $service_id;
		$data['full_address'] = $full_address;
		$data['country_code'] = $country_code;
		$data['maximum_size'] = $maximum_size;
		$data['nearby'] = $nearby;
		
		// $view = '';
		// if ($_GET["route"] == "checkout/shipping_method") {
		// 	$view = $this->load->view('extension/shipping/hfwsample', $data);
		// }
		// $quote = array();
		// $quote["hfwsample"] = array(
		// 	"code" => "hfwsample.hfwsample",
		// 	"title" => $this->language->get("heading_title") ,
		// 	"cost" => $cost,
		// 	"tax_class_id" => $this->config->get("hfwsample_tax_class_id") ,
		// 	"text" => $view
		// );
			
		// $method_data = array(
		// 	"code" => "hfwsample",
		// 	"title" => $this->language->get("heading_title") ,
		// 	"quote" => $quote,
		// 	"sort_order" => $this->config->get("hfwsample_sort_order") ,
		// 	"error" => false
        // );
        $method_data = array();
		return $method_data;
	}
}
?>