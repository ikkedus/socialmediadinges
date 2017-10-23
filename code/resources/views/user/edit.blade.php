{{Form::open(array('url' => '/user/update')) }}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{Form::hidden("id",$id)}}
{{Form::label("oldpassword","oude wachtwoord")}}
{{Form::password("oldpassword")}}

{{Form::label("password","nieuwe wachtwoord")}}
{{Form::password("password")}}

{{Form::label("password2","controle wachtwoord")}}
{{Form::password("password2")}}

{{Form::submit("Opslaan")}}
{{Form::close()}}