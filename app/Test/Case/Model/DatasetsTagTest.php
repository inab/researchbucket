<?php
App::uses('DatasetsTag', 'Model');

/**
 * DatasetsTag Test Case
 *
 */
class DatasetsTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.datasets_tag',
		'app.dataset',
		'app.project',
		'app.storage',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DatasetsTag = ClassRegistry::init('DatasetsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DatasetsTag);

		parent::tearDown();
	}

}
