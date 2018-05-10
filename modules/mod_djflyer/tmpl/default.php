<?php
/**
* @version 1.3 RC1
* @package DJ Flyer
* @subpackage DJ Flyer Module
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

//JHTML::_('behavior.mootools');
JHtml::_('behavior.framework');
JHTML::_('behavior.modal');
$par = JComponentHelper::getParams( 'com_djflyer' );
 
$m_id = $module->id;
if($params->get('current_itemid')){
	$itemid=JRequest::getVar('Itemid','');	
}else{
	$itemid = $params->get('djitemid');
}


$it= 0;
$it2= 0;
$pag_n=2;

if($params->get('desc_position')=='bottom'){
	$desc_width = '100%';
	$title_box_width = '100%';
}else if($params->get('djdesc_width')>0 && $params->get('djtitle_width')){
	$desc_width = $params->get('djdesc_width');
	$title_box_width = $params->get('djtitle_width');	
}else{
	$width_prop = explode('-', $params->get('djwidth_prop'));
	$desc_width = $width_prop[0].'%'; 
	$title_box_width = $width_prop[1].'%'; 
}

$title_witdh=$par->get('th_width')+10;
//$titles_per_row =  floor(($title_box_width+20)/($title_witdh+30));
$djwidth = $params->get('djflyer_width');
if(!strstr($djwidth, '%') && !strstr($djwidth, 'px')){
	$djwidth .= 'px';  
}
$active_id = 0;

echo '<div class="djflyer djflyer_clearfix schema_'.$params->get('desc_position').'" style="width:'.$djwidth.'"><div class="djflyer_in" >';
if($params->get('desc_position')=='left'){
	echo '<div class="djflyer_items_box" style="width:'.$desc_width.';"><div class="djflyer_items_box_in djflyer_clearfix">';
	foreach($items as $item){
		if ($cats_list[0] == $item->cat_id && $it2==0) {
			$st = 'display:block; opacity:1;';
			$it2++;
		}else{
			$st = 'display:none; opacity:0;';	
		}
		echo '<div id="mod'.$m_id.'_item'.$item->id.'" class="mod'.$m_id.'_item_box djflyer_item_box" style="'.$st.'">';
			echo '<div class="item_title" >'.$item->cat_name.' <span> '.$item->name.'</span></div>';
	
			if($params->get('show_tooltip') && ($item->tooltip!='')){
				echo '<div class="item_tooltip">'.$item->tooltip.'</div>';
			}
			echo '<div class="item_desc">';
				if($params->get('show_descimg')){
					if($item->image_url){
						if($params->get('descimg_position')=='left'){					
							echo '<a class="item_desc_img float_left modal" style="float:left;" href="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'.thd.jpg" /></a>';
						}elseif($params->get('descimg_position')=='right'){
							echo '<a class="item_desc_img float_right modal" style="float:right;" href="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'.thd.jpg" /></a>';
						}elseif($params->get('descimg_position')=='top'){
							echo '<div class="clearfix" style="text-align:center; clear:both;"><a class="item_desc_img float_top modal" href="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'.thd.jpg" /></a></div>';
						}
					}elseif($item->icon_url){
						if($params->get('descimg_position')=='left'){					
							echo '<a class="item_desc_img float_left modal" style="float:left;;" href="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'.thsd.jpg" /></a>';
						}elseif($params->get('descimg_position')=='right'){
							echo '<a class="item_desc_img float_right modal" style="float:right;" href="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'.thsd.jpg" /></a>';
						}elseif($params->get('descimg_position')=='top'){
							echo '<div class="clearfix" style="text-align:center; clear:both;"><a class="item_desc_img float_center modal" href="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'.thsd.jpg" /></a></div>';
						}
					}
				}	
			
			echo JHTML::_('content.prepare', $item->description);
			echo '</div>';
			if($item->art_id>0){
				echo '<div class="item_link">';
				$read_more = JRoute::_('index.php?option=com_content&view=article&id='.$item->art_id.':'.$item->a_alias.'&catid='.$item->a_catid.'&Itemid='.$itemid.'');
				echo '<a class="readmore" href="'.$read_more.'">';
				echo ($params->get('readmore_text',0) ? $params->get('readmore_text') : JText::_('MOD_DJFLYER_READMORE'));
				echo '</a>';
				echo '</div>';
			}
		echo '</div>';	
	}
	
	echo '</div></div>';
}
echo '<div class="djflyer_titles_box" style="width:'.$title_box_width.';"><div class="djflyer_titles_box_in" >';
echo '<div class="mod'.$m_id.'_djflyer_pag_box" id="mod'.$m_id.'_pag_box1" style="display:block; opacity:1;">';
for ($i = 0; $i < count($cats_list); $i++) {

    foreach ($cats as $cat) {    	
        if ($cat->id == $cats_list[$i]) {				
         		 if($it>0 && $params->get('djitem_limit')){
				 	if($it%$params->get('djitem_limit')==0){
						echo '</div><div class="mod'.$m_id.'_djflyer_pag_box" id="mod'.$m_id.'_pag_box'.$pag_n.'" style="display:none; opacity:0;">';
				 		$pag_n++;												
				 	}
				 }
            echo '<div class="djflyer_box djflyer_clearfix">';
			if($params->get('show_cat_name')){
            	echo '<div class="djflyer_cat">'.$cat->name.'</div>';
			}
			$items_in_cat = 0;
			$items_in_row=0;
			$titles_in_row=0;	
            foreach ($items as $item) {
                if ($cat->id == $item->cat_id) {
          		    if($it>0 && $params->get('djitem_limit') && $items_in_cat>0){
				 		if($it%$params->get('djitem_limit')==0){
							echo '</div></div><div class="mod'.$m_id.'_djflyer_pag_box" id="mod'.$m_id.'_pag_box'.$pag_n.'" style="display:none; opacity:0;">';
				 			$pag_n++;														
            				echo '<div class="djflyer_box djflyer_clearfix">';
							if($params->get('show_cat_name')){
            					echo '<div class="djflyer_cat">'.$cat->name.'</div>';
							}      		
					
				 		}
				 	}

           		
					 if($item->tooltip!=''){
					 	$tip_title = "<div class='tooltip_box tip-text'><div class='tooltip_center'>".$item->tooltip."</div></div>";	
					 }else{
					 	$tip_title = '';
					 }   
                     
					 if($it==0){
					 	$cl = ' active';
						$active_id=$item->id;
					 }else{
					 	$cl = ' ';
					 }
              	     if($params->get('show_tooltip') && ($item->tooltip!='')){
					 	echo '<div onclick="show'.$m_id.'('.$item->id.');" class="Tips'.$m_id.$cl.' djflyer_title" id="mod'.$m_id.'_title'.$item->id.'" style="cursor:pointer;width:'.$title_witdh.'px;" title="'.$tip_title.'">';
					 }else{
					 	echo '<div onclick="show'.$m_id.'('.$item->id.');" id="mod'.$m_id.'_title'.$item->id.'" class="djflyer_title" style="cursor:pointer;width:'.$title_witdh.'px;" >';
					 }
				 	 if($item->icon_url && $params->get('show_img')){									
					 	echo '<div class="item_img"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'.ths.jpg" alt=""/></div>';					 
				     }
					 echo '<div class="item_name">'.$item->name.'</div>';
					 if($item->details){
						echo '<div class="item_details" >'.$item->details.'</div>';
					 }
					 echo '</div>';
                    
                $it++;
				$items_in_cat++;
				//$titles_in_row++;
				
					//if($titles_in_row==$titles_per_row){
					//	echo '<div style="clear:both"></div>';
					//	$titles_in_row=0;
					//}
				
				}
            }

            echo '</div>';
            break;
        }
    }
}
echo '</div><div style="clear:both"></div></div>';
	if($params->get('djitem_limit') && $pag_n>2){
		echo '<div class="pag_links" style="margin-bottom:20px;">';
		for($pn=1;$pn<$pag_n;$pn++){
			if($pn==1){
				echo '<span id="mod'.$m_id.'_pag_link'.$pn.'" class="active"  onclick="show_page'.$m_id.'('.$pn.');">'.$pn.'</span> ';	
			}else{
				echo '<span id="mod'.$m_id.'_pag_link'.$pn.'"  onclick="show_page'.$m_id.'('.$pn.');">'.$pn.'</span> ';
			}
			
			
				
		}		
		echo '</div>';	
	}
echo '</div>';

if($params->get('desc_position')!='left'){
	echo '<div class="djflyer_items_box" style="width:'.$desc_width.';"><div class="djflyer_items_box_in djflyer_clearfix">';
	foreach($items as $item){
		if($item->id==$active_id){
			$st = 'display:block; opacity:1;';
		}else{
			$st = 'display:none; opacity:0;';	
		}
		echo '<div id="mod'.$m_id.'_item'.$item->id.'" class="mod'.$m_id.'_item_box djflyer_item_box" style="'.$st.'">';
			echo '<div class="item_title" >'.$item->cat_name.' <span> '.$item->name.'</span></div>';
	
			if($params->get('show_tooltip') && ($item->tooltip!='')){
				echo '<div class="item_tooltip">'.$item->tooltip.'</div>';
			}
			echo '<div class="item_desc">';
				if($params->get('show_descimg')){
					if($item->image_url){
						if($params->get('descimg_position')=='left'){					
							echo '<a class="item_desc_img float_left modal" style="float:left;" href="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'.thd.jpg" /></a>';
						}elseif($params->get('descimg_position')=='right'){
							echo '<a class="item_desc_img float_right modal" style="float:right;" href="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'.thd.jpg" /></a>';
						}elseif($params->get('descimg_position')=='top'){
							echo '<div class="clearfix" style="text-align:center; clear:both;"><a class="item_desc_img float_top modal" href="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->image_url.'.thd.jpg" /></a></div>';
						}
					}elseif($item->icon_url){
						if($params->get('descimg_position')=='left'){					
							echo '<a class="item_desc_img float_left modal" style="float:left;" href="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'.thsd.jpg" /></a>';
						}elseif($params->get('descimg_position')=='right'){
							echo '<a class="item_desc_img float_right modal" style="float:right;" href="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'.thsd.jpg" /></a>';
						}elseif($params->get('descimg_position')=='top'){
							echo '<div class="clearfix" style="text-align:center; clear:both;"><a class="item_desc_img float_center modal" href="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'"><img src="'.JURI::base().'components/com_djflyer/images/'.$item->icon_url.'.thsd.jpg" /></a></div>';
						}
					}
				}
				echo JHTML::_('content.prepare', $item->description); 
			
			echo '</div>';
			if($item->art_id>0){
				echo '<div class="item_link">';
					$read_more = JRoute::_('index.php?option=com_content&view=article&id='.$item->art_id.':'.$item->a_alias.'&catid='.$item->a_catid.'&Itemid='.$itemid.'');
					echo '<a class="readmore" href="'.$read_more.'">';
					echo ($params->get('readmore_text',0) ? $params->get('readmore_text') : JText::_('MOD_DJFLYER_READMORE'));
					echo '</a>';
				echo '</div>';
			}
		echo '</div>';	
	}
	
	echo '</div></div>';
}
echo '<div style="clear:both"></div></div></div>';
?>

	
<script type="text/javascript">
	
	window.addEvent('domready', function(){
	$('<?php echo 'mod'.$m_id.'_';?>title'+cur<?php echo $m_id;?>).addClass('active');
	//DJCatMatchModules('.djflyer_title');
	var list = $$('.<?php echo 'mod'.$m_id.'_';?>item_box');
    list.each(function(element){	
		element.set("tween", {
    		duration: <?php echo $params->get('djduration')?>

		});
	});

	var list = $$('.<?php echo 'mod'.$m_id.'_';?>djflyer_pag_box');
    list.each(function(element){	
		element.set("tween", {
    		duration: 300

		});
	});
	
	});
	
	/*
	function DJCatMatchModules(className){
		
		var maxHeight = 0;
		if ($$(className)) {
			var divs = $$(className);
			divs.each(function(element){
				if(!isNaN(parseInt(element.getStyle('height')))){
					maxHeight = Math.max(maxHeight, parseInt(element.getStyle('height')));
					alert(element.getStyle('height'));	
				}
				
				
			});
			
			divs.setStyle('height', maxHeight);
		}
	}
	*/
	
	var cur<?php echo $m_id;?>=<?php echo $active_id?>;
	function show<?php echo $m_id;?>(id){
		if(cur<?php echo $m_id;?>!=id){
			document.getElementById('<?php echo 'mod'.$m_id.'_';?>item'+cur<?php echo $m_id;?>).tween("opacity", 0);						
			$('<?php echo 'mod'.$m_id.'_';?>title'+cur<?php echo $m_id;?>).removeClass('active');						
			
			$('<?php echo 'mod'.$m_id.'_';?>title'+id).addClass('active');
			
			setTimeout(function(){
				document.getElementById('<?php echo 'mod'.$m_id.'_';?>item'+cur<?php echo $m_id;?>).setStyle("display","none");
				document.getElementById('<?php echo 'mod'.$m_id.'_';?>item'+id).setStyle("display","block");
				document.getElementById('<?php echo 'mod'.$m_id.'_';?>item'+id).tween("opacity", 1);
				cur<?php echo $m_id;?>=id;				
			},<?php echo $params->get('djduration')?>);			
		}
		
	}
	
	var cur_page<?php echo $m_id;?>=1;
	function show_page<?php echo $m_id;?>(id){
		document.getElementById('<?php echo 'mod'.$m_id.'_';?>pag_box'+cur_page<?php echo $m_id;?>).tween("opacity", 0);	
		$('<?php echo 'mod'.$m_id.'_';?>pag_box'+cur_page<?php echo $m_id;?>).removeClass('active');
		$('<?php echo 'mod'.$m_id.'_';?>pag_link'+cur_page<?php echo $m_id;?>).removeClass('active');
		$('<?php echo 'mod'.$m_id.'_';?>pag_box'+id).addClass('active');
		$('<?php echo 'mod'.$m_id.'_';?>pag_link'+id).addClass('active');
		
		setTimeout(function(){
			document.getElementById('<?php echo 'mod'.$m_id.'_';?>pag_box'+cur_page<?php echo $m_id;?>).setStyle("display","none");
			document.getElementById('<?php echo 'mod'.$m_id.'_';?>pag_box'+id).setStyle("display","block");
			document.getElementById('<?php echo 'mod'.$m_id.'_';?>pag_box'+id).tween("opacity", 1);
			cur_page<?php echo $m_id;?>=id;
			},300);		
	}

	

	
	var Tips<?php echo $m_id; ?> = new Tips($$('.Tips<?php echo $m_id; ?>'),{offsets: {'x': -100, 'y': -105}});
</script>