<?php
namespace Home\Controller;
header("Content-Type: text/html; charset=utf-8");
use Think\Controller;
class IndexController extends Controller {
	private $db_contact_main;
	private $db_contact_detail;
	private $db_delivery_history;
	function _initialize() {
		$this -> db_contact_main = D("ContactMain");
		$this -> db_contact_detail = D("ContactDetail");
		$this -> db_delivery_history = D("DeliveryHistory");
	}
    public function index(){
    	$this -> display("index");
	}
	public function editGmAndSkillRatio(){
		$excel_name = $_FILES['excel_file']['name'];
		$index = stripos($excel_name, ".");
		if (strtolower(substr($excel_name, $index + 1)) != "xls" && strtolower(substr($excel_name, $index + 1)) != "xlsx") {
			$this -> error("上传文件格式出错");
		}
		vendor('PHPExcel.PHPExcel');
		Vendor('PHPExcel.PHPExcel.IOFactory');
		Vendor('PHPExcel.PHPExcel.Reader.Excel5.php');
		$PHPReader = new \PHPExcel_Reader_Excel5();
		$PHPexcel = new \PHPExcel();
		$excel_obj = $_FILES['excel_file']['tmp_name'];
		$PHPExcel_obj = $PHPReader -> load($excel_obj);
		$currentSheet = $PHPExcel_obj -> getSheet(0);
		$highestColumn = $currentSheet -> getHighestColumn();
		$highestRow = $currentSheet -> getHighestRow();
		$arr_data = array();
		for ($j = 2; $j <= $highestRow; $j++)
		{
			for ($k = 'B'; $k <= $highestColumn; $k++)
			{
				$arr_data[$j][$k] = (string)$PHPExcel_obj -> getActiveSheet() -> getCell("$k$j") -> getValue();
			}
		}
		foreach ($arr_data as $key => $value) {
			unset($arr_data[$key]);
			$condition['cSOCode'] = $value['B'];
			$condition['contact_id'] = $value['C'];
			$condition['inventory_id'] = $value['D'];
			$condition['colour'] = $value['E'];
			$data['gm_ratio'] = $value['F'] * 0.01;
			$data['skill_ratio'] = $value['G'] * 0.01;
			$this -> db_contact_detail -> editItem($condition,$data);
		}
		$this -> success("修改成功！");
	}
	public function deleteContact(){
		$excel_name = $_FILES['excel_file']['name'];
		$index = stripos($excel_name, ".");
		if (strtolower(substr($excel_name, $index + 1)) != "xls" && strtolower(substr($excel_name, $index + 1)) != "xlsx") {
			$this -> error("上传文件格式出错");
		}
		vendor('PHPExcel.PHPExcel');
		Vendor('PHPExcel.PHPExcel.IOFactory');
		Vendor('PHPExcel.PHPExcel.Reader.Excel5.php');
		$PHPReader = new \PHPExcel_Reader_Excel5();
		$PHPexcel = new \PHPExcel();
		$excel_obj = $_FILES['excel_file']['tmp_name'];
		$PHPExcel_obj = $PHPReader -> load($excel_obj);
		$currentSheet = $PHPExcel_obj -> getSheet(0);
		$highestColumn = $currentSheet -> getHighestColumn();
		$highestRow = $currentSheet -> getHighestRow();
		$arr_data = array();
		for ($j = 2; $j <= $highestRow; $j++)
		{
			for ($k = 'B'; $k <= $highestColumn; $k++)
			{
				$arr_data[$j][$k] = (string)$PHPExcel_obj -> getActiveSheet() -> getCell("$k$j") -> getValue();
			}
		}
		foreach ($arr_data as $key => $value) {
			unset($arr_data[$key]);
			$condition['contact_id'] = $value['B'];
			$this -> db_contact_detail -> deleteItem($condition);
			$this -> db_contact_main -> deleteItem($condition);
		}
		$this -> success("修改成功！");
	}
	public function editDeliveryQuantity(){
		$excel_name = $_FILES['excel_file']['name'];
		$index = stripos($excel_name, ".");
		if (strtolower(substr($excel_name, $index + 1)) != "xls" && strtolower(substr($excel_name, $index + 1)) != "xlsx") {
			$this -> error("上传文件格式出错");
		}
		vendor('PHPExcel.PHPExcel');
		Vendor('PHPExcel.PHPExcel.IOFactory');
		Vendor('PHPExcel.PHPExcel.Reader.Excel5.php');
		$PHPReader = new \PHPExcel_Reader_Excel5();
		$PHPexcel = new \PHPExcel();
		$excel_obj = $_FILES['excel_file']['tmp_name'];
		$PHPExcel_obj = $PHPReader -> load($excel_obj);
		$currentSheet = $PHPExcel_obj -> getSheet(0);
		$highestColumn = $currentSheet -> getHighestColumn();
		$highestRow = $currentSheet -> getHighestRow();
		$arr_data = array();
		for ($j = 2; $j <= $highestRow; $j++)
		{
			for ($k = 'B'; $k <= $highestColumn; $k++)
			{
				$arr_data[$j][$k] = (string)$PHPExcel_obj -> getActiveSheet() -> getCell("$k$j") -> getValue();
			}
		}
		foreach ($arr_data as $key => $value) {
			unset($arr_data[$key]);
			$condition['cSOCode'] = $value['B'];
			$condition['contact_id'] = $value['C'];
			$condition['inventory_id'] = $value['D'];
			$data['delivery_quantity'] = $value['E'];
			$data['delivery_money'] = $value['F'];
			$this -> db_contact_detail -> editItem($condition,$data);
		}
		$this -> success("修改成功！");
	}
	public function importContactMain(){
		$excel_name = $_FILES['excel_file']['name'];
		$index = stripos($excel_name, ".");
		if (strtolower(substr($excel_name, $index + 1)) != "xls" && strtolower(substr($excel_name, $index + 1)) != "xlsx") {
			$this -> error("上传文件格式出错");
		}
		vendor('PHPExcel.PHPExcel');
		Vendor('PHPExcel.PHPExcel.IOFactory');
		Vendor('PHPExcel.PHPExcel.Reader.Excel5.php');
		$PHPReader = new \PHPExcel_Reader_Excel5();
		$PHPexcel = new \PHPExcel();
		$excel_obj = $_FILES['excel_file']['tmp_name'];
		$PHPExcel_obj = $PHPReader -> load($excel_obj);
		$currentSheet = $PHPExcel_obj -> getSheet(0);
		$highestColumn = $currentSheet -> getHighestColumn();
		$highestRow = $currentSheet -> getHighestRow();
		$arr_data = array();
		for ($j = 2; $j <= $highestRow; $j++)
		{
			for ($k = 'B'; $k <= $highestColumn; $k++)
			{
				$arr_data[$j][$k] = (string)$PHPExcel_obj -> getActiveSheet() -> getCell("$k$j") -> getValue();
			}
		}
		foreach ($arr_data as $key => $value) {
			if($value['B'] == null || $value['B'] == ""){
				continue;
			}
			$contact_main = array();
			$contact_main['contact_id'] = $value['B'];
			$contact_main['customer_id'] = $value['D'];
			$contact_main['salesman_id'] = $value['E'];
			$contact_main['cSOCode'] = $value['C'];
			$contact_main['date'] = $value['F'];
			$this -> db_contact_main ->addItem($contact_main);
		}
	$this -> success("导入表头成功！");
	}
	public function importContactDetail(){
		$excel_name = $_FILES['excel_file']['name'];
		$index = stripos($excel_name, ".");
		if (strtolower(substr($excel_name, $index + 1)) != "xls" && strtolower(substr($excel_name, $index + 1)) != "xlsx") {
			$this -> error("上传文件格式出错");
		}
		vendor('PHPExcel.PHPExcel');
		Vendor('PHPExcel.PHPExcel.IOFactory');
		Vendor('PHPExcel.PHPExcel.Reader.Excel5.php');
		$PHPReader = new \PHPExcel_Reader_Excel5();
		$PHPexcel = new \PHPExcel();
		$excel_obj = $_FILES['excel_file']['tmp_name'];
		$PHPExcel_obj = $PHPReader -> load($excel_obj);
		$currentSheet = $PHPExcel_obj -> getSheet(0);
		$highestColumn = $currentSheet -> getHighestColumn();
		$highestRow = $currentSheet -> getHighestRow();
		$arr_data = array();
		for ($j = 2; $j <= $highestRow; $j++)
		{
			for ($k = 'B'; $k <= $highestColumn; $k++)
			{
				$arr_data[$j][$k] = (string)$PHPExcel_obj -> getActiveSheet() -> getCell("$k$j") -> getValue();
			}
		}
		foreach ($arr_data as $key => $value) {
			if($value['B'] == null || $value['B'] == ""){
				continue;
			}
			$contact_detail = array();
			$contact_detail['contact_id'] = $value['B'];
			$contact_detail['customer_id'] = $value['D'];
			$contact_detail['salesman_id'] = $value['F'];
			$contact_detail['cSOCode'] = $value['C'];
			$contact_detail['date'] = $value['T'];
			$contact_detail['customer_name'] = $value['E'];
			$contact_detail['salesman_name'] = $value['G'];
			$contact_detail['inventory_id'] = $value['H'];
			$contact_detail['classification_id'] = $value['I'];
			/*$contact_detail['classification_name'] = $value['J'];*/
			$contact_detail['inventory_name'] = $value['J'];
			$contact_detail['specification'] = $value['K'];
			$contact_detail['inStore'] = $value['N'];
			$contact_detail['coreColour'] = $value['M'];
			$contact_detail['colour'] = $value['L'];
			$contact_detail['sale_price'] = $value['O'];
			$contact_detail['cost_price'] = $value['P'];
			$contact_detail['sale_quantity'] = $value['Q'];
			$contact_detail['delivery_quantity'] = $value['R'];
			$contact_detail['gm_ratio'] = $value['U'] * 0.01;
			$contact_detail['skill_ratio'] = $value['V'] * 0.01;
			$contact_detail['custom_fee'] = $value['W'];
            $contact_detail['last_delivery_date'] = $value['X'];
			$this -> db_contact_detail -> addItem($contact_detail);
		}
	$this -> success("导入成功！");
	}

    public function importDeliveryQuantityMoney(){
        $excel_name = $_FILES['excel_file']['name'];
        $index = stripos($excel_name, ".");
        if (strtolower(substr($excel_name, $index + 1)) != "xls" && strtolower(substr($excel_name, $index + 1)) != "xlsx") {
            $this -> error("上传文件格式出错");
        }
        vendor('PHPExcel.PHPExcel');
        Vendor('PHPExcel.PHPExcel.IOFactory');
        Vendor('PHPExcel.PHPExcel.Reader.Excel5.php');
        $PHPReader = new \PHPExcel_Reader_Excel5();
        $PHPexcel = new \PHPExcel();
        $excel_obj = $_FILES['excel_file']['tmp_name'];
        $PHPExcel_obj = $PHPReader -> load($excel_obj);
        $currentSheet = $PHPExcel_obj -> getSheet(0);
        $highestColumn = $currentSheet -> getHighestColumn();
        $highestRow = $currentSheet -> getHighestRow();
        $arr_data = array();
        for ($j = 2; $j <= $highestRow; $j++)
        {
            for ($k = 'B'; $k <= $highestColumn; $k++)
            {
                $arr_data[$j][$k] = (string)$PHPExcel_obj -> getActiveSheet() -> getCell("$k$j") -> getValue();
            }
        }
        foreach ($arr_data as $key => $value) {
            if($value['B'] == null || $value['B'] == ""){
                continue;
            }
            $condition = array();
            $condition['contact_id'] = $value['B'];
            $condition['inventory_id'] = $value['C'];
            $condition['sale_quantity'] = $value['D'];
            $condition['sale_price'] = $value['E'];
            $data = array();
            $data['delivery_quantity'] = $value['F'];
            $data['delivery_money'] = $value['G'];
            $data['last_delivery_date'] = $value['H'];
            $this -> db_contact_detail ->where($condition)->save($data);
        }
        $this -> success("更新发货数量发货金额成功！");
    }
    public function importCostPriceAdjust(){
        $excel_name = $_FILES['excel_file']['name'];
        $index = stripos($excel_name, ".");
        if (strtolower(substr($excel_name, $index + 1)) != "xls" && strtolower(substr($excel_name, $index + 1)) != "xlsx") {
            $this -> error("上传文件格式出错");
        }
        vendor('PHPExcel.PHPExcel');
        Vendor('PHPExcel.PHPExcel.IOFactory');
        Vendor('PHPExcel.PHPExcel.Reader.Excel5.php');
        $PHPReader = new \PHPExcel_Reader_Excel5();
        $PHPexcel = new \PHPExcel();
        $excel_obj = $_FILES['excel_file']['tmp_name'];
        $PHPExcel_obj = $PHPReader -> load($excel_obj);
        $currentSheet = $PHPExcel_obj -> getSheet(0);
        $highestColumn = $currentSheet -> getHighestColumn();
        $highestRow = $currentSheet -> getHighestRow();
        $arr_data = array();
        for ($j = 2; $j <= $highestRow; $j++)
        {
            for ($k = 'B'; $k <= $highestColumn; $k++)
            {
                $arr_data[$j][$k] = (string)$PHPExcel_obj -> getActiveSheet() -> getCell("$k$j") -> getValue();
            }
        }
        foreach ($arr_data as $key => $value) {
            if($value['B'] == null || $value['B'] == ""){
                continue;
            }
            $condition = array();
            $condition['contact_id'] = $value['B'];
            $condition['inventory_id'] = $value['C'];
            $condition['colour'] = $value['D'];
            $condition['coreColour'] = $value['E'];
            $condition['sale_quantity'] = $value['F'];
            $condition['sale_price'] = $value['G'];
            $data = array();
            $data['cost_price_adjust'] = $value['H'];
            $this -> db_contact_detail ->where($condition)->save($data);
        }
        $this -> success("更新调整底价成功！");
    }
    public function editCostPriceAdjust(){
        $excel_name = $_FILES['excel_file']['name'];
        $index = stripos($excel_name, ".");
        if (strtolower(substr($excel_name, $index + 1)) != "xls" && strtolower(substr($excel_name, $index + 1)) != "xlsx") {
            $this -> error("上传文件格式出错");
        }
        vendor('PHPExcel.PHPExcel');
        Vendor('PHPExcel.PHPExcel.IOFactory');
        Vendor('PHPExcel.PHPExcel.Reader.Excel5.php');
        $PHPReader = new \PHPExcel_Reader_Excel5();
        $PHPexcel = new \PHPExcel();
        $excel_obj = $_FILES['excel_file']['tmp_name'];
        $PHPExcel_obj = $PHPReader -> load($excel_obj);
        $currentSheet = $PHPExcel_obj -> getSheet(0);
        $highestColumn = $currentSheet -> getHighestColumn();
        $highestRow = $currentSheet -> getHighestRow();
        $arr_data = array();
        for ($j = 2; $j <= $highestRow; $j++)
        {
            for ($k = 'B'; $k <= $highestColumn; $k++)
            {
                $arr_data[$j][$k] = (string)$PHPExcel_obj -> getActiveSheet() -> getCell("$k$j") -> getValue();
            }
        }
        foreach ($arr_data as $key => $value) {
            if($value['B'] == null || $value['B'] == ""){
                continue;
            }
            $condition_main = array();
            $condition_main['salesman_id'] = $value['B'];
            $condition_main['settlement'] = 1;
            $condition_main['settling'] = 1;
            $condition_main['settled'] = 0;
            $contact_main = $this -> db_contact_main -> where($condition_main) -> select();
            foreach ($contact_main as $kk => $vv){
                $condition_detail = array();
                $condition_detail['contact_id'] = $vv['contact_id'];
                $contact_detail = $this -> db_contact_detail -> where($condition_detail) -> select();
                foreach ($contact_detail as $kkk => $vvv){
                    $data = array();
                    $data_condition = array();
                    $data_condition['id'] = $vvv['id'];
                    $data['cost_price_adjust'] = $vvv['cost_price_adjust'] + $vvv['cost_price'] - $vvv['end_cost_price'];
                    $this -> db_contact_detail -> where($data_condition) -> save($data);
                }
            }
        }
        $this -> success("更新调整底价成功！");
    }
}
