<?php
App::uses('Dataset', 'Model');

/**
 * Dataset Test Case
 *
 */
class DatasetTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dataset',
		'app.project'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dataset = ClassRegistry::init('Dataset');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dataset);

		parent::tearDown();
	}

}
