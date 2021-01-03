<?php

namespace App\Repositories;

use App\Models\Vote;

class VoteRepository
{
    public function getAllVote()
    {
        $votes = Vote::get();
        return $votes;
    }

    public function saveManyVotes($votes, $userId)
    {
        $toSave = [];
        foreach ($votes as $vote) {
            // $voteEntity = new Vote;
            // $voteEntity->candidate_category_id = $vote;

            array_push($toSave, [
                'candidate_category_id' => $vote,
                'user_id' => $userId
            ]);
        }

        try {
            return (Vote::insert($toSave)) ? $toSave : null;
        } catch (\Exception $e) {
            dd('error: db' . $e);
        }
    }

    public function deleUserVote($userId)
    {
        try {
            Vote::where('user_id', $userId)->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getUserVotes($userId)
    {
        $votes = Vote::where('user_id', $userId)->get();
        return ($votes) ? $votes : null;
    }

    public function hasUserVoted($userId)
    {
        return (Vote::where('user_id', $userId)->first() != null) ? true : false;
    }
}
