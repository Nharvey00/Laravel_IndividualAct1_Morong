<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $candidates = Candidate::when($search, function ($query, $search) {
                $query->where('first_name', 'LIKE', "%{$search}%")
                      ->orWhere('middle_name', 'LIKE', "%{$search}%")
                      ->orWhere('last_name', 'LIKE', "%{$search}%")
                      ->orWhere('gender', 'LIKE', "%{$search}%")
                      ->orWhere('address', 'LIKE', "%{$search}%")
                      ->orWhere('position', 'LIKE', "%{$search}%")
                      ->orWhere('party', 'LIKE', "%{$search}%");
            })->get();

        return view('index', compact('candidates'));
    }

    public function store(Request $request)
    {
        Candidate::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'position' => $request->position,
            'party' => $request->party
        ]);
        return redirect('/candidates');
    }

    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('edit', compact('candidate'));
    }

    public function update(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'position' => $request->position,
            'party' => $request->party
        ]);
        return redirect('/candidates');
    }

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();
        return redirect('/candidates');
    }
}