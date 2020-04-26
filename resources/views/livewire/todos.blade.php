<div class="row">
	<div class="col-md-6 mx-auto">
		<div>
		    <div class="mb-3">
	    		<div class="d-flex">
	    			<input type="text" name="name" class="form-control form-control-lg" id="name" placeholder="What need to be done?" value="{{ old('addTodo') }}" wire:model="name" {{-- wire:keydown.enter="addTodo" --}}>
	    			<button class="btn btn-primary" wire:click="addTodo">Add</button>
	    		</div>

	    		
	    		@error('name')
	                <div class="text-danger" role="alert">
	                    <strong>{{ $message }}</strong>
	                </div>
	            @enderror
	    	</div>

		    <ul class="list-group">
		    	@forelse ($todos as $todo)
			    	<li class="list-group-item d-flex justify-content-between align-items-center">
			    		<div>
			    			<input type="checkbox" name="status" class="mr-2" {{ $todo->completed ? 'checked': '' }} wire:change="toggleTodo({{ $todo->id }})">
			    			<a href="#"
			    				class="{{ $todo->completed? 'completed' : '' }}"
			    				onClick="updateTodoPrompt('{{ $todo->name }}') || event.stopImmediatePropagation()"
			    				wire:click="updateTodo({{ $todo->id }}, todoUpdated)">{{ $todo->name }}</a>
			    		</div>
			    		<div>
			    			<button
			    				class="btn btn-sm btn-danger"
			    				onClick="confirm('Are you sure you want to delete this Todo?') || event.stopImmediatePropagation()"
			    				wire:click="deleteTodo({{ $todo->id }})">
			    				&times;
			    		</button>
			    		</div>
			    	</li>
		    	@empty
		    		<p class="text-danger">Nothing here! Seems you have no todo list yet...</p>
		    	@endforelse
		    </ul>
		</div>

		<script>
			let todoUpdated = '';

			function updateTodoPrompt(title) {
				event.preventDefault();
				todoUpdated = '';

				const todo = prompt('Update Todo', title);

				if (todo == null || todo.trim() == '') {
					// console.log('cancel or empty');
					todoUpdated = '';
					return false;
				}

				todoUpdated = todo;
				return true; 
			}
		</script>
	</div>
</div>
