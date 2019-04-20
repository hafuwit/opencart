<?php
class ModelExtensionHfwmoduleInfo extends Model {

    public function getInfo($id) {
        $sql = "
            SELECT * FROM " . DB_PREFIX . "hfwmodule_info inf
            WHERE inf.id = " . $id;
        $query = $this->db->query($sql);
        return $query->row;
    }
}
