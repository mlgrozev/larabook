<?php


use Larabook\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends \Codeception\TestCase\Test {
	/**
	 * @var \IntegrationTester
	 */
	protected $tester;

	/**
	 * @var Status Repository
	 */
	protected $repo;

	protected function _before()
	{
		$this->repo = new UserRepository();
	}

	/** @test */
	public function it_paginates_all_users()
	{
		TestDummy::times(4)->create('Larabook\Users\User');

		$results = $this->repo->getPaginated(2);

		$this->assertCount(2, $results);
	}

	/** @test */
	public function it_finds_with_statuses_by_username()
	{
		$statuses = TestDummy::times(3)->create('Larabook\Statuses\Status');
		$username = $statuses[0]->user->username;
		
		$user = $this->repo->findByUsername($username);
		
		$this->assertEquals($username, $user->username);
		$this->assertCount(3, $user->statuses);
	}
	
	/** @test */
	public function it_follows_another_user()
	{
		//given I have two users
		list($john, $susan) = TestDummy::times(2)->create('Larabook\Users\User');
		
		//and one user follows another user
		$this->repo->follow($john->id, $susan);

		$this->tester->seeRecord('follows', [
			'follower_id' => $susan->id,
			'followed_id' => $john->id,
		]);
	}

	/** @test */
	public function it_unfollows_another_user()
	{
		//given I have two users
		list($john, $susan) = TestDummy::times(2)->create('Larabook\Users\User');

		//and one user follows another user
		$this->repo->follow($john->id, $susan);
		
		$this->repo->unfollow($john->id, $susan);

		$this->tester->dontSeeRecord('follows', [
			'follower_id' => $susan->id,
			'followed_id' => $john->id,
		]);
	}
	
}