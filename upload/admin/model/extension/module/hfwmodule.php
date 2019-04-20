<?php

/*
 *  hafuwit@gmail.com
 */

class ModelExtensionModuleHfwmodule extends Model {
    private $id = 'hfw_sample_module';
    private $error = array();
    private $sub_versions = array('lite', 'light', 'free');
    private $config_file = '';

    public function __construct($registry) {
        parent::__construct($registry);

        $this->config_file = $this->getConfigFile($this->id, $this->sub_versions);
    }
    /*
     *  hafuwit@gmail.com
     */

    public function getConfigFile($id, $sub_versions) {

        if (isset($this->request->post['config'])) {
            return $this->request->post['config'];
        }

        $full = DIR_SYSTEM . 'config/' . $id . '.php';
        if (file_exists($full)) {
            return $id;
        }

        foreach ($sub_versions as $lite) {
            if (file_exists(DIR_SYSTEM . 'config/' . $id . '_' . $lite . '.php')) {
                return $id . '_' . $lite;
            }
        }

        return false;
    }

    /*
     *  Return list of config files that contain the id of the module.
     */

    public function getConfigFiles($id) {
        $files = array();
        $results = glob(DIR_SYSTEM . 'config/' . $id . '*');

        if(!$results) {
            return array();
        }

        foreach ($results as $result) {
            $files[] = str_replace('.php', '', str_replace(DIR_SYSTEM . 'config/', '', $result));
        }
        return $files;
    }


    /*
     *  Get config file values and merge with config database values
     */

    public function getConfigData($id, $config_key, $store_id, $config_file = false) {
        if (!$config_file) {
            $config_file = $this->config_file;
        }
        if ($config_file) {
            $this->config->load($config_file);
        }

        $result = ($this->config->get($config_key)) ? $this->config->get($config_key) : array();

        return $result;
    }

    public function createTables() {
		#region HFW
		$sql1 = "CREATE TABLE IF NOT EXISTS `" .DB_PREFIX . "hfwmodule_account` (
					`account_id` INT(10) NOT NULL AUTO_INCREMENT,
					`title` VARCHAR(10),
					`fullname` VARCHAR(100),
					`company` VARCHAR(255),
					`email` VARCHAR(100),
					`phone_number` VARCHAR(100),
					`address_type` VARCHAR(255),
					`address_1` VARCHAR(255),
					`address_2` VARCHAR(255),
					`address_3` VARCHAR(255),
					`post_code` VARCHAR(50),
					`city` VARCHAR(255),
					`country` VARCHAR(10),
					`account_type` INT(11),
					`hfw_account_name` VARCHAR(255),
					`hfw_account_number` VARCHAR(255),
					`hfw_invoice_number` VARCHAR(255),
					`hfw_invoice_amount` VARCHAR(255),
					`hfw_currency` VARCHAR(255),
					`hfw_invoice_date` DATETIME,
					`device_identity` TEXT,
					`account_default` INT(11),
					`business_name` VARCHAR(255),
				PRIMARY KEY (`account_id`)
		) DEFAULT COLLATE=utf8_general_ci;";
		$this->db->query($sql1);

		$sql2 = "CREATE TABLE IF NOT EXISTS `" .DB_PREFIX . "hfwmodule_about` (
			`id` INT NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(255) NULL,
			`description` TEXT NULL,
			`date_added` DATETIME NULL,
			`date_modified` DATETIME NULL,
			PRIMARY KEY (`id`));";
		$this->db->query($sql2);

		$sql3 = "CREATE TABLE IF NOT EXISTS `" .DB_PREFIX . "hfwmodule_info` (
			`id` INT NOT NULL AUTO_INCREMENT,
			`title` VARCHAR(250) NULL,
			`description` VARCHAR(45) NULL,
			`status` TINYINT(1),
			`date_added` DATETIME NULL,
			`date_modified` DATETIME NULL,
			`user_added` INT NULL,
			`user_modified` INT NULL,
			`isdelete` TINYINT(1) NULL DEFAULT 0,
			PRIMARY KEY (`id`));";
		$this->db->query($sql3);
		#end create

		#Region Update Database
		$sql4 = "INSERT INTO `" .DB_PREFIX . "hfwmodule_info`(`id`, `title`, `description`, `status`)
			VALUES (0, 'Information', 'Information Test Page', 1)";
		$this->db->query($sql4);
		#end region

		#region add setting
		$sql5 = "INSERT INTO `" . DB_PREFIX . "setting` (`code`, `key`, `value`, `serialized`) VALUES ('hfwmodule', 'module_hfwmodule_status', '1', '0');";
		$this->db->query($sql5);
		#end
    }

	public function deleteDatabase() {
		#region Example
		$this->db->query("DELETE FROM `" . DB_PREFIX . "setting` WHERE `code` = 'hfwmodule' and `key` = 'module_hfwmodule_status';");
		#end

		#region HFW
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "hfwmodule_about`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "hfwmodule_account`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "hfwmodule_info`");
		#end

	}
}
