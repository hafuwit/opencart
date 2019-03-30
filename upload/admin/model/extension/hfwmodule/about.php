<?php
class ModelExtensionHfwmoduleAbout extends Model {
    public function get() {
        $sql = "
            SELECT * FROM " . DB_PREFIX . "hfwmodule_about";
        $query = $this->db->query($sql);
        return $query->row;
    }
}
