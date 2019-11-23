<?php

namespace App\Http\Controllers\Candidates;

use App\Candidate;
use App\CandidateLaboralReference;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidateLaboralReferenceResource;
use App\Http\Resources\CandidateResource;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        return CandidateResource::collection($candidates);
    }

    /**
     * Display laboral references list of a candidate
     */
    public function getLaboralReferences($id)
    {
        $candidates = CandidateLaboralReference::where('candidate_id', $id)->get();
        return CandidateLaboralReferenceResource::collection($candidates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        $candidate = Candidate::make($data);
        $candidate->saveOrFail();

        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::where('id', $id)->first();

        if (is_null($candidate)) {
            return response()->json([
                'message' => 'The candidate does not exists',
            ], 404);
        }

        return new CandidateResource($candidate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidate = Candidate::where('id', $id)->first();

        $data = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $candidate->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::where('id', $id)->first();
        CandidateLaboralReference::where('candidate_id', $id)->delete();
        $candidate->delete();
    }
}
