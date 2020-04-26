<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Illuminate\Support\Str;
use Livewire\Component;

class Todos extends Component
{
	public $name = '';

    public function render()
    {
        return view('livewire.todos', [
        	'todos' => auth()->user()->todos
        ]);
    }

    public function addTodo() {
    	$this->validate([
    		'name' => 'required|unique:todos'
    	]);

    	Todo::create([
    		'user_id' => auth()->id(),
	    	'name' => $this->name,
	    	'slug' => Str::slug($this->name, '-'),
    	]);

    	$this->name = '';
    }

    public function toggleTodo($id) {
    	$todo = Todo::find($id);
    	$todo->completed = !$todo->completed;
    	$todo->save();
    }

    public function updateTodo($id, $name) {
    	$todo = Todo::find($id);
    	$todo->name = $name;
    	$todo->save();
    }

    public function deleteTodo($id) {
    	Todo::find($id)->delete();
    }
}
