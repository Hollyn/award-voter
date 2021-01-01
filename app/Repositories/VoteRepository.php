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

    public function saveManyVotes($votes)
    {
        $toSave = [];
        foreach ($votes as $vote) {
            // $voteEntity = new Vote;
            // $voteEntity->candidate_category_id = $vote;

            array_push($toSave, ['candidate_category_id' => $vote]);
        }

        try {
            return (Vote::insert($toSave)) ? $toSave : null;
        } catch (\Exception $e) {
            dd('error: db' . $e);
        }
    }
}
