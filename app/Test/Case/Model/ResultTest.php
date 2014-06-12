<?php
App::uses('Result', 'Model');

/**
 * Result Test Case
 *
 */
class ResultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.result'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Result = ClassRegistry::init('Result');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Result);

		parent::tearDown();
	}

}
