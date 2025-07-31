<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Track;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::with('track')->paginate(5); // 5 per page
    return view('students.index', compact('students'));
    }

    // Show create form
    public function create()
    {
        $tracks = Track::all();
        return view('students.create', compact('tracks'));
    }

    // Store student in database
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'address' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'gender' => 'required|in:male,female',
        'image' => 'nullable|image|max:1024',
        'track_id' => 'required|exists:tracks,id',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/students'), $filename);
        $validated['image'] = $filename;
    } else {
        $validated['image'] = 'default.png';
    }

    Student::create($validated);

    return redirect()->route('students.index')->with('success', 'Student created successfully!');

}


    // Show one student
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    // Show edit form
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name'    => 'required',
            'address' => 'required',
            'email'   => 'required|email|unique:students,email,' . $id,
            'gender'  => 'required|in:male,female',
            'phone'   => 'required',
            'image'   => 'nullable|image|max:1024',
        ]);

        $imagePath = $student->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('students', 'public');
        }

        $student->update([
            'name'    => $request->name,
            'address' => $request->address,
            'email'   => $request->email,
            'gender'  => $request->gender,
            'phone'   => $request->phone,
            'image'   => $imagePath,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Delete student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }


}
