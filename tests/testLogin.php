<?php

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
	public function testLength()
	{
		$sql = "SELECT * FROM USERS where id = '1234'";
		$data = getData($sql);
		$this->assertEquals("No Data Found.", $data);
	}
}
