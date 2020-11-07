<?php
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //show index ar aris shesacvleli
    {
        $applicant = Applicant::latest()->paginate(5);

        return view('applicants.index', compact('applicants'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // create html shi shecvalo unda
    {
        return view('applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'is_hired' => 'required',
        ]);

        Applicant::create($request->all());

        return redirect()->route('applicants.index')
            ->with('success', 'Applicant created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        return view('applicants.show', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        return view('applicants.edit', compact('applicant'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'is_hired' => 'required',
        ]);
        $applicant->update($request->all());

        return redirect()->route('applicants.index')
            ->with('success', 'Applicant updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();

        return redirect()->route('applicants.index')
            ->with('success', 'applicant deleted successfully');
    }
}
