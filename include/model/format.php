<?php
class format{
	//private $PM;
	public function retest(){
		$data=array(
			'code'=>false,
			'msg'=>'证件号码错误!!',
			'data'=>array(
				'student_id'=>'',
				'name'=>'',
				'national_id'=>'',
				'subject'=>array(
					'subject_id'=>'',
					'subject_price'=>'',
					'subjectname'=>''
					),
				'record'=>'',
				'list'=>'',
				'code'=>'',
				'msg'=>''
				)
		);
		return $data;
	}
	public function payment_format($d){
		if(count($i)>1){
			for($i=0;$i<=count($d)-1;$i++){
				$data=array(
		            'id' => $d['i']['id'],
		            'student_id' => $d['i']['student_id'],
		            'vehicle_type' => $d['i']['vehicle_type'],
		            'train' => $d['i']['train'],
		            'accreditation' => $d['i']['accreditation'],
		            'space' =>  $d['i']['space'],
		            'datum' => $d['i']['datum'],
		            'isDiscount' => $d['i']['isDiscount'],
		            'traffic' => $d['i']['traffic'],
		            'insurance' => $d['i']['insurance'],
		            'ctime' => $d['i']['ctime'],
		            'pay_state' => $d['i']['pay_state'],
		            'isvip' => $d['i']['isvip'],
		            'total' => $d['i']['total'],
		        );
			}
		}else{
			$data=array(
	            'id' => $d['0']['id'],
	            'student_id' => $d['0']['student_id'],
	            'vehicle_type' => $d['0']['vehicle_type'],
	            'train' => $d['0']['train'],
	            'accreditation' => $d['0']['accreditation'],
	            'space' =>  $d['0']['space'],
	            'datum' => $d['0']['datum'],
	            'isDiscount' => $d['0']['isDiscount'],
	            'traffic' => $d['0']['traffic'],
	            'insurance' => $d['0']['insurance'],
	            'ctime' => date("Y-m-d",$d['0']['ctime']),
	            'pay_state' => $d['0']['pay_state'],
	            'isvip' => $d['0']['isvip'],
	            'total' => $d['0']['total'],
	        );
	    }
		return $data;
	}
	public function p_format($d){
			$data=array(
	            'n_train' => $d['0']['train'], //培训费
	            'n_accreditation' => $d['0']['accreditation'],//制证费用
	            'n_space' =>  $d['0']['space'],//场地费用
	            'n_datum' => $d['0']['datum'],//资料费
	            'n_isDiscount' => $d['0']['isDiscount'],//是否优惠
	            'n_traffic' => $d['0']['traffic'],//交通费
	            'n_insurance' => $d['0']['insurance'],//保险费
	            'n_isDiscount_money'=>$d['0']['isDiscount_money'],
	            'n_total'=>($d['0']['train']+$d['0']['accreditation']+$d['0']['space']+$d['0']['datum']+$d['0']['traffic']+$d['0']['insurance']-$d['0']['isDiscount_money']),
	    );
        return $data;
	}
}
?>