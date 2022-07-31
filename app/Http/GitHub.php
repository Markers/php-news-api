namespace App\Http;

use GrahamCampbell\GitHub\GitHubManager;

class Github
{
public $username;

public $repository;

public function __construct($username, $repository, GitHubManager $github)
{
$this->username = $username;

$this->repository = $repository;

$this->github = $github;
}

public static function make($username, $repository)
{
return new static($username, $repository, app(GitHubManager::class));
}

/**
* Checks that a given path exists in a repository.
*
* @param  string  $path
* @return bool
*/
public function exists($path)
{
return $this->github->repository()->contents()->exists($this->username, $this->repository, $path);
}
}
