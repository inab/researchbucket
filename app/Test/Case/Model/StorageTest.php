<?php
App::uses('Storage', 'Model');

/**
 * Storage Test Case
 *
 */
class StorageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.storage',
		'app.project'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Storage = ClassRegistry::init('Storage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Storage);

		parent::tearDown();
	}

}
