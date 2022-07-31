<?php

namespace App\Services;

use GrahamCampbell\GitHub\Facades\GitHub;

class GithubService
{
    protected GitHub $github;

    public function __construct()
    {
        $this->github = new GitHub();
    }

    public function commitFiles(string $github_nickname, string $repo_name, string $branch, string $commit_message, array $files)
    {
        try {
            $master_branch = $this->github::repo()->branches($github_nickname, $repo_name, $branch);
            $commit_parent = $master_branch["commit"]["sha"];
            $base_tree = $master_branch["commit"]["commit"]["tree"]["sha"];

            $commit_tree = array();
            foreach ($files as $file) {
                $file_blob = [
                    "path" => $file["path"],
                    "mode" => "100644",
                    "type" => "file",
                    "content" => $file["content"],
                ];
                $commit_tree[] = $file_blob;
            }

            $new_commit_tree_response = $this->github::git()->trees()->create($github_nickname, $repo_name, [
                "base_tree" => $base_tree,
                "tree" => $commit_tree
            ]);

            $new_commit_response = $this->github::git()->commits()->create($github_nickname, $repo_name, [
                "message" => $commit_message,
                "parents" => [$commit_parent],
                "tree" => $new_commit_tree_response["sha"],
            ]);
            $this->github::git()->references()->update($github_nickname, $repo_name, "heads/" . $branch, [
                "sha" => $new_commit_response["sha"],
                "force" => false,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
