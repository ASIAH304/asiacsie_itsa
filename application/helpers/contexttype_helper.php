<?php
function context_type($type){
	switch($type){
		case 1:
			return '<div class="ui label teal">ITSA 線上程式設計競賽</div>';
		break;
		case 2:
			return '<div class="ui label orange">PTC 線上程式設計競賽</div>';
		break;
		case 3:
			return '<div class="ui label red">大學程式能力檢定(CPE)</div>';
		break;
		default:
			return '<div class="ui label">error</div>';
	}
}
function context_type_s($type){
	switch($type){
		case 1:
			return '<div class="ui label teal">ITSA</div>';
		break;
		case 2:
			return '<div class="ui label orange">PTC</div>';
		break;
		case 3:
			return '<div class="ui label red">CPE</div>';
		break;
		default:
			return '<div class="ui label">error</div>';
	}
}