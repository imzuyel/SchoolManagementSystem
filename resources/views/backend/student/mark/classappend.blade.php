 <div class="form-group ">
   <label class="col-form-label">Subject</label>
   <select class="single-select @error('assignsubject_id') is-invalid @enderror"
     name="assignsubject_id"
     id="assignsubject_id">
     @forelse ($subjects as $subject)
       <option value="{{ $subject->get_subject->id }}">{{ $subject->get_subject->name }}</option>
     @empty
     @endforelse
   </select>
   @error('class_id')
     <span class="text-danger"
       role="alert">
       <strong>{{ $message }}</strong>
     </span>
   @enderror
 </div>
