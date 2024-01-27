<?php

namespace App\Http\Livewire;

use App\Models\TestSeeder;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $email, $phone_number, $address, $city, $student_id;
    public $search = "";

    public function render()
    {
        $students = TestSeeder::where('name', 'like', '%' . $this->search . '%')->orderByDesc('id')->paginate(4);

        return view('livewire.student', compact('students'));
    }

    // Check validated
    protected $rules = [
        'name' => 'required|string|min:6',
        'email' => 'required|email',
        'phone_number' => 'required|numeric',
        'address' => 'required|string',
        'city' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Save student
    public function saveStudent()
    {
        $validatedData = $this->validate();
        Log::info($validatedData);

        TestSeeder::create($validatedData);
        session()->flash('message', 'Create Student Success');
        $this->resetInput();
        // Gọi sự kiện ẩn modal sau khi tạo student
        $this->dispatchBrowserEvent('close-modal');
    }

    // Khi bật popup thì gán student = id
    public function editStudent($id)
    {
        $student = TestSeeder::findOrFail($id);
        if ($student) {
            $this->student_id = $student->id;
            $this->name = $student->name;
            $this->email = $student->email;
            $this->phone_number = $student->phone_number;
            $this->address = $student->address;
            $this->city = $student->city;
        } else {
            return redirect()->route('admin.student.index');
        }
    }

    // Click Edit thì update trong DB
    public function updateStudent()
    {
        $validatedData = $this->validate();

        TestSeeder::whereId($this->student_id)->update($validatedData);
        session()->flash('message', 'Update Student Success');
        $this->resetInput();
        // Gọi sự kiện ẩn modal sau khi tạo student
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteStudent($id)
    {
        $this->student_id = $id;
    }

    public function destroyStudent()
    {
        TestSeeder::whereId($this->student_id)->delete();
        session()->flash('message', 'Delete Student Success');
        // Gọi sự kiện ẩn modal sau khi tạo student
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->address = '';
        $this->city = '';
    }
}
