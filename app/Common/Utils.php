<?php

namespace App\Common;

class Utils
{
    public function formatCandidateCategorNames($candidateCategoryNames)
    {
        $result = [];
        foreach ($candidateCategoryNames as $index => $candidateCategoryName) {

            if (isset($result[$candidateCategoryName->categoryName])) {
                $result[$candidateCategoryName->categoryName] = array_merge(
                    $result[$candidateCategoryName->categoryName],
                    array($candidateCategoryName->candidateName => $candidateCategoryName->id)

                );
            } else {
                $result[$candidateCategoryName->categoryName] = array_merge(
                    [],
                    [$candidateCategoryName->candidateName  => $candidateCategoryName->id]
                );
            }
        }

        return $result;
    }

    public function getIdOfAllUserVotes($votes)
    {
        $result = array_map(function ($vote) {
            return $vote['candidate_category_id'];
        }, $votes);

        return ($result);
    }
}
