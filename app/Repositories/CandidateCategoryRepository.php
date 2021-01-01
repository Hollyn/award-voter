<?php

namespace App\Repositories;

use App\Models\CandidateCategory;
use DB;

class CandidateCategoryRepository
{
    public function getAllCandidateCategories()
    {
        $categries = CandidateCategory::get();
        return $categries;
    }

    public function saveCandidateCategory($candidateId, $categoryId)
    {
        $candidateCategory = new CandidateCategory;

        $candidateCategory->candidate_id = $candidateId;
        $candidateCategory->category_id = $categoryId;


        try {
            return ($candidateCategory->save()) ? $candidateCategory : null;
        } catch (\Exception $e) {

            dd("Error: DB" . $e);
        }
    }

    public function getAllCandidateCategoriesName()
    {
        $response = DB::select("SELECT
                cand_cat.id AS id,
                cat.name AS categoryName,
                cand.name AS candidateName,
                (
                    SELECT
                        count(*)
                    FROM
                        votes
                    WHERE
                        candidate_category_id = cand_cat.id) AS nbrVote
                FROM
                    candidate_categories cand_cat
                    INNER JOIN categories cat ON cat.id = cand_cat.category_id
                    INNER JOIN candidates cand ON cand.id = cand_cat.candidate_id
                ORDER BY
                    category_id ASC,
                    nbrVote DESC;", array());

        return $response;
    }
}
