<?php
App::uses('TagType', 'Model');

/**
 * TagType Test Case
 *
 */
class TagTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tag_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TagType = ClassRegistry::init('TagType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TagType);

		parent::tearDown();
	}

}
