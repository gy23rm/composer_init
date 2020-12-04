<?php
/**
 * oms - BaseCommand.php
 *
 * PHP Version 5.5
 *
 * @author    zhao <gy23rm@163com>
 * @copyright 2020 ec3s.com
 * @license   Copyright (c) 2013 ec3s (http://www.ec3s.com)
 * @link      http://www.ec3s.com
 * @date      2020/12/4
 */

namespace Command;

abstract class BaseCommand
{
	/**
	 * BaseCommand constructor.
	 */
	public function __construct ()
	{
	}
	
	/**
	 * @param $params
	 */
	public function run ($params)
	{
		$this->validate($params);
		$this->process($params);
	}
	
	/**
	 * @param $params
	 * @return mixed
	 */
	abstract protected function validate ($params);
	
	/**
	 * @param $params
	 * @return mixed
	 */
	abstract protected function process ($params);
	
	/**
	 * @param $message
	 * @param string $type
	 */
	protected function output ($message, $type = "info")
	{
		switch (strtolower($type)) {
			case 'warning':
				echo $this->_addFontColor("[WARNING]", "yellow") . $message . PHP_EOL;
				break;
			case 'info':
				echo $this->_addFontColor("[INFO]   ", "cyan") . $message . PHP_EOL;
				break;
			case 'success':
				echo $this->_addFontColor("[SUCCESS]", "green") . $message . PHP_EOL;
				break;
			case 'error' :
				echo $this->_addFontColor("[ERROR]  ", "red") . $message . PHP_EOL;
				break;
			case 'ignore':
				echo $this->_addFontColor("[IGNORE] ", "purple") . $message . PHP_EOL;
				break;
			default:
				echo $message . PHP_EOL;
				break;
		}
	}
	
	/**
	 * @param string $message
	 * @param string $color
	 * @return string
	 */
	private function _addFontColor ($message, $color = "white")
	{
		switch ($color) {
			case "red" :
				$color_head = "\033[1;31m";
				break;
			case "green" :
				$color_head = "\033[1;32m";
				break;
			case "yellow" :
				$color_head = "\033[1;33m";
				break;
			case "blue" :
				$color_head = "\033[1;34m";
				break;
			case "purple" :
				$color_head = "\033[1;35m";
				break;
			case "cyan" :
				$color_head = "\033[1;36m";
				break;
			default:
				$color_head = "\033[1;37m";
				break;
		}
		
		$color_end = "\033[0m";
		
		return $color_head . $message . $color_end;
	}
}