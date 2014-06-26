<?php
App::uses('Vocabulary', 'Model');

/**
 * Vocabulary Test Case
 *
 */
class VocabularyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vocabulary'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vocabulary = ClassRegistry::init('Vocabulary');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vocabulary);

		parent::tearDown();
	}

}
