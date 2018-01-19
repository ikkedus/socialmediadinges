@extends('admin.template')

@section('content')
    <div class="col-md-4">
        {{Form::open(array('class'=>"form",'url' => '/user/save')) }}
        @if(isset($message))
            <div class="primary alert-info">
               {{$message}}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{Form::hidden("id",$id )}}
        <div class="form-group">
            {{Form::label("username","Gebruikersnaam")}}
            {{Form::text("username",null,array_merge(['class' => 'form-control']))}}
        </div>
        <div class="form-group">
            {{Form::label("firstname","voornaam")}}
            {{Form::text("firstname",null,array_merge(['class' => 'form-control']))}}
        </div>
        <div class="form-group">
            {{Form::label("lastname","achternaam")}}
            {{Form::text("lastname",null,array_merge(['class' => 'form-control']))}}
        </div>
        <div class="form-group">
            {{Form::label("prefix","tussenvoegsel")}}
            {{Form::text("prefix",null,array_merge(['class' => 'form-control']))}}
        </div>
        <div class="form-group">
            {{Form::label("email","email")}}
            {{Form::text("email",null,array_merge(['class' => 'form-control']))}}
        </div>
        <div class="form-group">
            {{Form::label("password","wachtwoord")}}
            {{Form::password("password",array_merge(['class' => 'form-control']))}}
        </div>
        <div class="form-group">
            {{Form::label("password2","controle wachtwoord")}}
            {{Form::password("password2",array_merge(['class' => 'form-control']))}}
        </div>
        {{Form::submit("Opslaan")}}
        {{Form::close()}}
    </div>
    <table class="col-md-7 table-condensed table-striped">
        <tr>
            <th>
                id
            </th>
            <th>
                gebruikersnaam
            </th>
            <th>
                admin
            </th>
            <th>
                aangemaakt op
            </th>
            <th>
                edit
            </th>
        </tr>
        @foreach($users As $user)
            <tr>
                <td>
                    {{$user->getId()}}
                </td>
                <td>
                    {{$user->getUserName()}}
                </td>
                <td>
                    @if($user->getAdmin())
                        <p class='label bg-primary'>ja</p>

                    @else

                        <p class='label bg-red'>nee</p>
                        @endif
                </td>
                <td>
                    {{$user->getCreatedOn()}}
                </td>
                <td>
                    <a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    @if($user->getId() !== \App\Helpers\CurrentUser::GetUser()->getId())
                        <a href="/user/lock/{{$user->getId()}}" class="btn btn-warning"><i class="fa fa-{{$user->getLocked() ? "lock" : "unlock"}}"></i></a>
                        <a href="/user/delete/{{$user->getId()}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        @else
                        <a href="#" class="disabled btn btn-warning"><i class="fa fa-{{$user->getLocked() ? "lock" : "unlock"}}"></i></a>
                        <a href="#" class="disabled btn btn-danger"><i class="fa fa-trash"></i></a>
                    @endif

                </td>
            </tr>
        @endforeach
    </table>
@endsection