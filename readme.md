ImageComponent
==============

Image processing with Imagine.

Installation and configuration
------------------------------

Copy component to `extensions/image` directory located inside your application and add
it to the application configuration the following way:

```php
<?php
return array(
...
	'components'=>array(
		...
		'image'=>array(
			'class'=>'ext.image.ImageComponent',
			'driver'=>'Gd',
		),
		...
	),
...
);
```

Usage example
-------------

```php
<?php
$image=Yii::app()->image->open('example.png');
$thumbnail=$image->thumbnail(new Imagine\Image\Box(100,100));
$thumbnail->save('example.thumb.png');
```