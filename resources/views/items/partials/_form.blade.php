{{ Form::label('content', 'Task') }}
{{ Form::text('content') }}
{{ $errors->first('content') }}
{{ Form::submit('submit', array('class' => 'button')) }}