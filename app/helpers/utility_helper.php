<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function asset_url($dir = ""){
	return site_url().$dir;
}

function sp($text){
	echo '<pre>';
	print_r($text);
	echo '</pre>';
}

function context_type($type,$class=""){
	$context_name  = "";
	$context_class = "";
	switch($type){
		case 1:
			$context_name  = "ITSA 線上程式設計競賽";
			$context_class = "success";
		break;
		case 2:
			$context_name  = "PTC 線上程式設計競賽";
			$context_class = "warning";
		break;
		case 3:
			$context_name  = "CPE 大學程式能力檢定";
			$context_class = "danger";
		break;
		default:
			$context_name  = "error";
			$context_class = "default";
	}
	return '<div class="label label-'.$context_class.' '.$class.'">'.$context_name.'</div>';
}
function context_type_short($type){
	switch($type){
		case 1:
			return '<div class="label label-success">ITSA</div>';
		break;
		case 2:
			return '<div class="label label-warning">PTC</div>';
		break;
		case 3:
			return '<div class="label label-danger">CPE</div>';
		break;
		default:
			return '<div class="label label-default">error</div>';
	}
}

function context_name($itsa_type,$itsa_th,$itsa_date){
	$detail_header="null";
	switch($itsa_type){
		case 1:
			return $detail_header="第 ".$itsa_th." 次競賽";
		break;
		case 2:
			return $detail_header=date("Y年m月競賽",strtotime($itsa_date));
		break;
		case 3:
			return $detail_header=$itsa_date." CPE";
		break;
		default:
			return $detail_header="null";
	}
}

function itsa_level($solved){
	$return = "";
	if( $solved >= 3 ){
		$return = '<p><span class="ui blue label">榮獲績優團隊</span></p>';
	}
	return $return;
}

function cpe_level($solved){
	$return = "";
	if( $solved >= 6 ){
		$return = '<p><span class="ui green label" title="熟悉各種進階演算法、資料結構，並具有優異的程式編寫能力。">專家級</span></p>';
	}else if( $solved == 5 || $solved == 4 ){
		$return = '<p><span class="ui green label" title="熟悉各種基礎的演算法、資料結構，並具有良好的程式編寫能力。">專業級</span></p>';
	}else if( $solved == 3 ){
		$return = '<p><span class="ui blue label" title="熟悉程式設計的邏輯概念，能以程式克服一般常見的問題。">進階級</span></p>';
	}else if( $solved == 2 ){
		$return = '<p><span class="ui teal label" title="具備基礎的程式編寫能力，能以程式處理簡單問題。">中級</span></p>';
	}else if( $solved == 1 ){
		$return = '<p><span class="ui purple label" title="具有簡單的程式編寫能力，但尚不足以應付不同種類的問題。">初級</span></p>';
	}else if( $solved == 0 ){
		$return = '<p><span class="ui black label" title="無法理解題意，或無程式編寫能力。">零級</span></p>';
	}else{
		$return = "-";
	}
	return $return;
}

function get_good($itsa_type,$teams){
	$count = 0;
	$good = 0;
	switch($itsa_type){
		case 1:
			$good = 3;
		break;
		case 2:
			$good = 3;
		break;
		case 3:
			$good = 3;
		break;
	}
	foreach ($teams as $key => $team) {
		if( $team->team_solved >= $good ){
			$count++;
		}
	}
	return $count;
}

function get_max($teams){
	$max = 0;
	foreach ($teams as $key => $team) {
		if( $team->team_solved > $max ){
			$max = $team->team_solved;
		}
	}
	return $max;
}

function get_avg($teams){
	$sum = 0;
	foreach ($teams as $key => $team) {
		$sum += $team->team_solved;
	}
	$count = count($teams);
	if( $count > 0 ){
		return ($sum/$count);
	}else{
		return 0;
	}
}

function get_sum_solved($teams){
	$sum = 0;
	foreach ($teams as $key => $team) {
		$sum += $team->team_solved;
	}
	return $sum;
}

function get_min_rank($teams){
	$min = 99999;
	if( count($teams) == 0 ){
		return 0;
	}
	foreach ($teams as $key => $team) {
		if( $team->team_rank > 0 ){
			if( $team->team_rank < $min){
				$min = $team->team_rank;
			}
		}else{
			break;
		}
	}
	return $min;
}

function get_medal($student_id,$itsa,$ptc,$cpe,$oj){
	if( get_max($itsa) == 5 ){
		font_awesome("hand-peace-o text-olive","完封 ITSA");
	}
	if( get_max($itsa) >= 3 ){
		font_awesome("external-link-square text-warning","進軍 PTC");
	}
	if( get_max($cpe) >= 3 ){
		font_awesome("level-up text-danger","達成 CPE 進階級");
	}
}

function font_awesome($class,$desc=""){
	echo '<i class="fa fa-'.$class.'" title="'.$desc.'" data-toggle="tooltip" data-placement="bottom"></i> ';
}
