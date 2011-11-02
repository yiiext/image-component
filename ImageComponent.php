<?php
/**
 * ImageComponent class file.
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 * @link https://github.com/yiiext/image-component
 */

/**
 * Image processing with Imagine.
 *
 * @version 0.02
 * @package yiiext.image-component
 */
class ImageComponent extends CApplicationComponent
{
	/**
	 * @var string driver. Defaults to 'Gd'.
	 */
	public $driver='Gd';
	private $_imagine;

	public function init()
	{
		Yii::setPathOfAlias('Imagine',__DIR__.'/Imagine');
		$className="Imagine\\{$this->driver}\\Imagine";
		$this->_imagine=new $className;
	}

	public function __call($name,$args)
	{
		return call_user_func_array(array($this->_imagine,$name),$args);
	}
}