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
 * @version 0.04
 * @package yiiext.image-component
 */
class ImageComponent extends CApplicationComponent
{
	/**
	 * @var string driver. Defaults to 'Gd'.
	 */
	public $driver='Gd';
	private $_class;

	/**
	 * Initializes the application component.
	 */
	public function init()
	{
		parent::init();
		$class="Imagine\\{$this->driver}\\Imagine";
		$this->_class=new $class;
	}

	/**
	 * Calls the named method which is not a class method.
	 * @param string $name the method name
	 * @param array $params method parameters
	 * @return mixed the method return value
	 */
	public function __call($name,$params)
	{
		if(method_exists($this->_class,$name))
			return call_user_func_array(array($this->_class,$name),$params);

		return parent::__call($name,$params);
	}
}
