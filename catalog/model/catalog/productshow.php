<?php
class ModelCatalogProductshow extends Model
{
	public function getProductsIdBySort($category_id, $limit)
	{
		$sql = "";
		$sql .= " SELECT product_id FROM ";
		$sql .= DB_PREFIX . "product_to_category ";
		if ($category_id != 'all') {
			$sql .= " WHERE category_id = '" . (int)$category_id . "'";
		}
		$sql .= " ORDER by product_id DESC ";
		$sql .= " LIMIT " . $limit;

		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function getProductsIdByRandom($category_id, $limit)
	{
		$sql = "";
		$sql .= " SELECT product_id FROM ";
		$sql .= DB_PREFIX . "product_to_category ";
		if ($category_id != 'all') {
			$sql .= " WHERE category_id = '" . (int)$category_id . "'";
		}
		$sql .= " ORDER BY rand() ";
		$sql .= " LIMIT " . $limit;

		// $sql .= " SELECT product_id FROM ";
		// $sql .= DB_PREFIX . "product_to_category ";
		// $sql .= " WHERE ";
		// if ($category_id != 'all') {
		// 	$sql .= " category_id = '" . (int)$category_id . "' AND ";
		// }
		// $sql .= " product_id >= ( ";
		// $sql .= "  (SELECT MAX(product_id) FROM " . DB_PREFIX . "product_to_category )";
		// $sql .= " -(SELECT MIN(product_id) FROM " . DB_PREFIX . "product_to_category )";
		// $sql .= " ) * RAND() ";
		// $sql .= " +(SELECT MIN(product_id) FROM " . DB_PREFIX . "product_to_category )";
		// $sql .= " LIMIT " . $limit;

		$query = $this->db->query($sql);
		return $query->rows;
	}

}
