<?php
class ModelExtensionHfwmoduleAccount extends Model {
    public function saveAccount($data) {
        $data['hfw_account_name'] = (!empty($data['hfw_account_name'])) ? $data['hfw_account_name'] : null;
        $data['hfw_account_number'] = (!empty($data['hfw_account_number'])) ? $data['hfw_account_number'] : null;
        $data['hfw_invoice_number'] = (!empty($data['hfw_invoice_number'])) ? $data['hfw_invoice_number'] : null;
        $data['hfw_invoice_amount'] = (!empty($data['hfw_invoice_amount'])) ? $data['hfw_invoice_amount'] : null;
        $data['hfw_currency'] = (!empty($data['hfw_currency'])) ? $data['hfw_currency'] : null;
        $data['hfw_invoice_date'] = (!empty($data['hfw_invoice_date'])) ? $data['hfw_invoice_date'] : null;
        $data['account_default'] = (!empty($data['account_default'])) ? $data['account_default'] : null;
        $data['business_name'] = (!empty($data['business_name'])) ? $data['business_name'] : null;
        $data['device_identity'] = (!empty($data['device_identity'])) ? $data['device_identity'] : null;

        $sql = "
            INSERT INTO ". DB_PREFIX . "hfwmodule_account
            SET title = '". $this->db->escape($data['title']) ."',
                fullname = '". $this->db->escape($data['customer_name']) ."',
                company = '". $this->db->escape($data['company']) ."',
                email = '". $this->db->escape($data['email']) ."',
                phone_number = '". $this->db->escape($data['phone_number']) ."',
                address_type = '". $this->db->escape($data['address_type']) ."',
                address_1 = '". $this->db->escape($data['address_1']) ."',
                address_2 = '". $this->db->escape($data['address_2']) ."',
                address_3 = '". $this->db->escape($data['address_3']) ."',
                post_code = '". $this->db->escape($data['post_code']) ."',
                city = '". $this->db->escape($data['city']) ."',
                country = '". $this->db->escape($data['country_code']) ."',
                account_type = '". $this->db->escape($data['account_type']) ."',
                hfw_account_name = '". $this->db->escape($data['hfw_account_name']) ."',
                hfw_account_number = '". $this->db->escape($data['hfw_account_number']) ."',
                hfw_invoice_number = '". $this->db->escape($data['hfw_invoice_number']) ."',
                hfw_invoice_amount = '". $this->db->escape($data['hfw_invoice_amount']) ."',
                hfw_currency = '". $this->db->escape($data['hfw_currency']) ."',
                hfw_invoice_date = '". $this->db->escape($data['hfw_invoice_date']) ."',
                device_identity = '" . $this->db->escape($data['device_identity'])  . "',
                account_default = '". $this->db->escape($data['account_default']) ."',
                business_name = '". $this->db->escape($data['business_name']) ."'";
        $query = $this->db->query($sql);
    }

    public function getListAccount() {
        $sql = "
            SELECT * FROM " . DB_PREFIX . "hfwmodule_account";
        $query = $this->db->query($sql);
        return $query->rows;
    }

    public function getAccountDefault() {
        $sql = "
            SELECT * FROM " . DB_PREFIX . "hfwmodule_account acc
            WHERE acc.account_default = 1";
        $query = $this->db->query($sql);
        return $query->row;
    }

    public function deleteAccount($account_id) {
        $sql = "
            DELETE FROM " . DB_PREFIX . "hfwmodule_account
            WHERE account_id = " . $account_id;
        $query = $this->db->query($sql);
        return $query;
    }

    public function checkAccount($hfw_account_number) {
        $sql = "
            SELECT * FROM " . DB_PREFIX . "hfwmodule_account acc
            WHERE acc.hfw_account_number = '" . $hfw_account_number . "'";
        $query = $this->db->query($sql);
        return $query->row;
    }

    public function getInfoAccount($id) {
        $sql = "
            SELECT * FROM " . DB_PREFIX . "hfwmodule_account acc
            WHERE acc.account_id = " . $id;
        $query = $this->db->query($sql);
        return $query->row;
    }
}
