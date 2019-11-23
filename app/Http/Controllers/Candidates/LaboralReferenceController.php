<?php

namespace App\Http\Controllers\Candidates;

use App\CandidateLaboralReference;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidateLaboralReferenceResource;
use Illuminate\Http\Request;

class LaboralReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboralReferences = CandidateLaboralReference::all();
        return CandidateLaboralReferenceResource::collection($laboralReferences);
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
            'company_name' => ['required', 'string'],
            'contact_name' => ['required', 'string'],
            'start_at' => 'required|date_format:Y-m-d',
            'leave_at' => 'required|date_format:Y-m-d',
        ]);

        $laboralReference = CandidateLaboralReference::make($data);
        $laboralReference->candidate()->associate($request->candidate_id);
        $laboralReference->saveOrFail();

        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laboralReference = CandidateLaboralReference::where('id', $id)->first();

        if (is_null($laboralReference)) {
            return response()->json([
                'message' => 'The laboral reference does not exists',
            ], 404);
        }

        return new CandidateLaboralReferenceResource($laboralReference);
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
        $laboralReference = CandidateLaboralReference::where('id', $id)->first();

        $data = $request->validate([
            'company_name' => ['required', 'string'],
            'contact_name' => ['required', 'string'],
            'start_at' => 'required|date_format:Y-m-d',
            'leave_at' => 'required|date_format:Y-m-d',
        ]);

        $laboralReference->candidate()->associate($request->candidate_id);

        $laboralReference->update([
            'company_name' => $request->company_name,
            'contact_name' => $request->contact_name,
            'start_at' => $request->start_at,
            'leave_at' => $request->leave_at,
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
        $laboralReference = CandidateLaboralReference::where('id', $id)->first();
        $laboralReference->delete();
    }
}
