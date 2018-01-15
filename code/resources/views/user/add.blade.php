{{Form::open(array('url' => '/user/save','style'=>"display: inline-grid;")) }}
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
    {{Form::label("username","Gebruikersnaam")}}
    {{Form::text("username")}}
    {{Form::label("firstname","voornaam")}}
    {{Form::text("firstname")}}
    {{Form::label("lastname","achternaam")}}
    {{Form::text("lastname")}}
    {{Form::label("prefix","tussenvoegsel")}}
    {{Form::text("prefix")}}
    {{Form::label("email","email")}}
    {{Form::text("email")}}
    {{Form::label("password","wachtwoord")}}
    {{Form::password("password")}}

    {{Form::label("password2","controle wachtwoord")}}
    {{Form::password("password2")}}

    {{Form::submit("Opslaan")}}
{{Form::close()}}