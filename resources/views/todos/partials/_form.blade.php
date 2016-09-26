{{ Form::label('name', 'List Title') }}
{{ Form::text('name') }}
{{ $errors->first('name') }}
{{ Form::submit('update', array('class' => 'button')) }}