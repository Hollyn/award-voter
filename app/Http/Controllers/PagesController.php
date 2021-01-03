<?php

namespace App\Http\Controllers;

use App\Repositories\VoteRepository;
use App\Repositories\CandidateCategoryRepository;
use App\Common\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

            // delete the user votes
            $this->voteRepository->deleUserVote(Auth::user()->id);


            // save votes
            $newVotes = $this->voteRepository->saveManyVotes($arrayOfVote, Auth::user()->id);
            if ($newVotes != null) {
                return redirect('voted');
            }
        }

        // get the user votes
        $votes = $this->voteRepository->getUserVotes(Auth::id());

        if (count($votes) > 0) $votes = $this->utils->getIdOfAllUserVotes($votes->toArray());

        $candidateCategoryNames = $this->candidateCategoryRepository->getAllCandidateCategoriesName();

        if ($candidateCategoryNames != null and count($candidateCategoryNames)) {
            $candidateCategoryNames = $this->utils->formatCandidateCategorNames($candidateCategoryNames);
        }

        return view('pages.index')->with([
            'votes' => (array) $votes,
            'candidateCategoryNames' => $candidateCategoryNames
        ]);
    }

    public function voted()
    {
        return view('pages.voted');
    }
}
