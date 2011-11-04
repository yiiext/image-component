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
 * @version 0.03
 * @package yiiext.image-component
 */
class ImageComponent extends CApplicationComponent
{
	/**
	 * @var string driver. Defaults to 'Gd'.
	 */
	public $driver='Gd';
	private $_imagine;

	/**
	 * Initializes the application component.
	 */
	public function init()
	{
		Yii::setPathOfAlias('Imagine',__DIR__.'/Imagine');
		$className="Imagine\\{$this->driver}\\Imagine";
		$this->_imagine=new $className;
		parent::init();
	}

	/**
	 * Calls the named method which is not a class method.
	 * @param string $name the method name
	 * @param array $parameters method parameters
	 * @return mixed the method return value
	 */
	public function __call($name,$parameters)
	{
		if(method_exists($this->_imagine,$name))
			return call_user_func_array(array($this->_imagine,$name),$parameters);

		return parent::__call($name,$parameters);
	}
}