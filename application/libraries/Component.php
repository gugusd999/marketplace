<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Component extends MX_controller
{


	public function mydb($value='')
	{
		return $this->db->query($value)->num_rows();
	}

	public static function box_icon($data='')
	{
		$html = '
			<div class="row">
			';

			foreach ($data as $key => $value) {

	    	$html .= '      
	    	<div class="col-12 col-sm-6 col-md-3">
	            <div class="info-box">
	              <span class="info-box-icon bg-'.$value['bg'].' elevation-1"><i class="fas fa-'.$value['icon'].'"></i></span>
	              <div class="info-box-content">
	                <span class="info-box-text">'.$value['title'].'</span>
	                <span class="info-box-number">
	                  '.$value['text'].'
	                </span>
	              </div>
	            </div>
	        </div>';
	    
			}

	    $html .= '
	    	</div>
		';

		return $html;
	}


}