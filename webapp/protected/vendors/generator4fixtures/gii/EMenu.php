<?php
Yii::import('zii.widgets.CMenu');
/**
 * Extension of CMenu. EMenu can render 
 * some one level of nesting.
 * Exemple:
 * $menuStruct = array(...);
 * 
 * render only 1 level of menu
 * $this->widget('zii.widgets.EMenu',array(
 *		'items'=>$menuStruct,
 *		'level' => 1
 *		));
 * 
 * render only 2 level of menu
 * $this->widget('zii.widgets.EMenu',array(
 *		'items'=>$menuStruct,
 *		'level' => 2
 *		));
 *
 *  work as old CMenu:
 *  $this->widget('zii.widgets.EMenu',array(
 *		'items'=>$menuStruct
 *	));

 * @author denis <theBuCeFaL@gmail.com>
 * @link https://bitbucket.org/BuCeFaL/ext4yii/src
 */
class EMenu extends CMenu
{
	/**
	 * default is 0 - render all levels
	 * @var integer
	 */
	public $level = 0;
	/**
	 * nesting level
	 * @var integer
	 */
	protected $_nestingLvl = 0;
	/**
	 * if @property $level is not 0
	 * method offset parents menu item and 
	 * not rander childs
	 * @see CMenu::renderMenuRecursive()
	 */
	protected function renderMenuRecursive($items)
	{
		if($this->level>0){
			++$this->_nestingLvl;
			if($this->_nestingLvl < $this->level){
				foreach ($items as $item)
					if(isset($item['items']) && count($item['items']))
						$this->renderMenuRecursive($item['items']);
			}else if($this->_nestingLvl === $this->level){
				$count=0;
				$n=count($items);
				foreach($items as $item)
				{
					$count++;
					$options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
					$class=array();
					if($item['active'] && $this->activeCssClass!='')
						$class[]=$this->activeCssClass;
					if($count===1 && $this->firstItemCssClass!='')
						$class[]=$this->firstItemCssClass;
					if($count===$n && $this->lastItemCssClass!='')
						$class[]=$this->lastItemCssClass;
					if($class!==array())
					{
						if(empty($options['class']))
							$options['class']=implode(' ',$class);
						else
							$options['class'].=' '.implode(' ',$class);
					}
					if($this->_nestingLvl === 1 || ( isset($item['parentIsActive']) && $item['parentIsActive'] )){
						echo CHtml::openTag('li', $options);
			
						$menu=$this->renderMenuItem($item);
						if(isset($this->itemTemplate) || isset($item['template']))
						{
							$template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
							echo strtr($template,array('{menu}'=>$menu));
						}
						else
							echo $menu;
			
						if(isset($item['items']) && count($item['items']))
							$this->renderMenuRecursive($item['items']);
			
						echo CHtml::closeTag('li')."\n";
					}
				}
			}
			--$this->_nestingLvl;
		}else 
			parent::renderMenuRecursive($items);
	}
	/**
	 * show items only of it's first level
	 * of parent active
	 * @see CMenu::normalizeItems()
	 */
	protected function normalizeItems($items,$route,&$active)
	{	
		if($this->level > 0){
			foreach($items as $i=>$item)
			{
				if(isset($item['visible']) && !$item['visible'])
				{
					unset($items[$i]);
					continue;
				}
				if($this->encodeLabel)
					$items[$i]['label']=CHtml::encode($item['label']);
				$hasActiveChild=false;
				$isActive=$this->isItemActive($item,$route);
				if(isset($item['items']))
				{
					$items[$i]['items']=$this->normalizeItems($item['items'],$route,$hasActiveChild);
					if(empty($items[$i]['items']) && $this->hideEmptyItems)
						unset($items[$i]['items']);
				}
				if($hasActiveChild && !empty($items[$i]['items']))
					foreach ($items[$i]['items'] as &$subItem)
						$subItem['parentIsActive']=true;
				
				if(!isset($item['active']))
				{
					if($this->activateParents && $hasActiveChild || $this->activateItems && $this->isItemActive($item,$route))
						$active=$items[$i]['active']=true;
					else
						$items[$i]['active']=false;
				}
				else if($item['active'])
					$active=true;
			}
			return array_values($items);
		}else
			parent::normalizeItems($items,$route,$active);
	}
}