<?php
/**
 * oms - TestCommand.php
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

class TestCommand extends BaseCommand{
	
	protected function validate ($params)
	{
		// TODO: Implement validate() method.
	}
	
	protected function process ($params)
	{
		// TODO: Implement process() method.
		echo "123123123\n";
	}
}