<?php

namespace App\Http\Controllers;

use App\Repositories\VoteRepository;
use App\Repositories\CandidateCategoryRepository;
use App\Common\Utils;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $candidateCategoryRepository;
    private $utils;
    private $voteRepository;
    public function __construct(
        CandidateCategoryRepository $candidateCategoryRepository,
        Utils $utils,
        VoteRepository $voteRepository
    ) {
        $this->candidateCategoryRepository = $candidateCategoryRepository;
        $this->utils = $utils;
        $this->voteRepository = $voteRepository;
    }

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {

            $arrayOfVote = array_filter($request->input(), function ($vote) {
                return is_numeric($vote);
            });
            $arrayOfVote = array_values($arrayOfVote);

            // save vote

            $newVotes = $this->voteRepository->saveManyVotes($arrayOfVote);
            if ($newVotes != null) {
                return redirect('/');
            }
        }

        $candidateCategoryNames = $this->candidateCategoryRepository->getAllCandidateCategoriesName();

        if ($candidateCategoryNames != null and count($candidateCategoryNames)) {
            $candidateCategoryNames = $this->utils->formatCandidateCategorNames($candidateCategoryNames);
        }

        return view('pages.index')->with('candidateCategoryNames', $candidateCategoryNames);
    }
}
