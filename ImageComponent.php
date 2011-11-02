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
 * @version 0.01
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
		Yii::registerAutoloader(array(__CLASS__,'autoload'),true);
		$className="Imagine\\{$this->driver}\\Imagine";
		$this->_imagine=new $className;
	}

	public static function autoload($className)
	{
		include(__DIR__.'/'.str_replace('\\','/',$className).'.php');
	}

	public function create($size,$color=null)
	{
		return $this->_imagine->create($size,$color);
	}

	public function open($path)
	{
		return $this->_imagine->open($path);
	}

	public function load($string)
	{
		return $this->_imagine->load($string);
	}

	public function read($resource)
	{
		return $this->_imagine->load($resource);
	}

	public function font($file,$size,$color)
	{
		return $this->_imagine->font($file,$size,$color);
	}
}