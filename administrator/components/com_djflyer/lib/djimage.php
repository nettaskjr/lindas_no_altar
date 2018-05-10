<?php
/**
* @version 1.3 RC1
* @package DJ Flyer
* @subpackage DJ Flyer Component
* @copyright Copyright (C) 2010 Blue Constant Media LTD, All rights reserved.
* @license http://www.gnu.org/licenses GNU/GPL
* @author url: http://design-joomla.eu
* @author email contact@design-joomla.eu
* @developer Ĺ�ukasz Ciastek - lukasz.ciastek@design-joomla.eu
*
*
* DJ Flyer is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* DJ Flyer is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with DJ Flyer. If not, see <http://www.gnu.org/licenses/>.
*
*/

defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.modal');

class DJFlyerImage {
   	function makeThumb($adres, $nw, $nh, $ext)
    {	
		if (!$adres)
            return false;
		
		 if (! list ($w, $h, $type, $attr) = getimagesize($adres)) {
            if (! list ($w, $h, $type, $attr) = getimagesize($adres)) {
                return false;
    	    }
	    }
		
        switch($type)
        {
            case 1:
                $simg = imagecreatefromgif($adres);
                break;
            case 2:
                $simg = imagecreatefromjpeg($adres);
                break;
            case 3:
                $simg = imagecreatefrompng($adres);
                break;
        }
		
		$x = 0;
		$y = 0;
		$cw = $w;
		$ch = $h;
		
		$nw_half = (int)floor($nw/2);
		$nh_half = (int)floor($nh/2);
		$w_half = (int)floor($w/2);
		$h_half = (int)floor($h/2);
		
		if ($nw == 0 && $nh == 0) {
			$nw = 200;
			$nh = (int)(floor(($nw * $h) / $w));
		}
		elseif ($nw == 0) {
			$nw = (int)(floor(($nh * $w) / $h));
		}
		elseif ($nh == 0) {
			$nh = (int)(floor(($nw * $h) / $w));
		}
		elseif ($nw < $w || $nh < $h) {
	        if ($nw <= $nh)
	        {
				if ($w <= $h) {
					$ch = $h;
					$temp_w = (int)floor(($h * $nw)/$nh);
					if ($temp_w > $w) {
						$cw = $w;
					}
					else {
						$cw = $temp_w;
						$x = $w_half - (int)($temp_w/2);
					}
				}
				elseif ($w > $h) {
					$ch = $h;
					$temp_w = (int)floor(($h * $nw)/$nh);
					if ($temp_w > $w) {
						$cw = $w;
					}
					else {
						$cw = $temp_w;
						$x = $w_half - (int)($temp_w/2);
					}
				}
	        } 
			elseif ($nw > $nh) {
	        	if ($w <= $h) {
					$cw = $w;
					$temp_h = (int)floor(($nh * $w)/$nw);
					if ($temp_h > $h) {
						$ch = $h;
					}
					else {
						$ch = $temp_h;
						$y = $h_half - (int)($temp_h/2);
					}
				}
				elseif ($w > $h) {
					$cw = $w;
					$temp_h = (int)floor(($nh * $w)/$nw);
					if ($temp_h > $h) {
						$ch = $h;
					}
					else {
						$ch = $temp_h;
						$y = $h_half - (int)($temp_h/2);
					}
				}        
	        }
		}
		elseif ($nw == -1 || $nh == -1) {
			return false;
		}
		$dimg = imagecreatetruecolor($nw, $nh);
		$bgColor = imagecolorallocate($dimg, 255, 255, 255);
	    imagefill($dimg, 0, 0, $bgColor);
 		imagecopyresampled($dimg, $simg, 0, 0, $x, $y, $nw, $nh, $cw, $ch);
		
		$thumb_path = $adres.'.'.$ext.'.jpg';
	    if (is_file($thumb_path))
			unlink($thumb_path);
	  
	    imagejpeg($dimg, $thumb_path, 85);
		
		return true;
	}
}