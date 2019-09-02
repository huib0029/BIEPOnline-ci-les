
<?php
use App\Author
Class AuthorTest extends TestCase;
{
	function post_something
	{
		//given
		factory(Author::class, 3)->create();
		//when
		$authors = Author::fillable();
		//then
		$this->assertEquals($mostPopular->id, $authors->first()->id);
	}
}
