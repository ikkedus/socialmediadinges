@extends('admin.template')

@section('content')
    <div data-editable data-name=heading>
        <h1>Content</h1>
    </div>
    <div data-editable data-name="main-content">
        <blockquote>
            Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.
        </blockquote>
        <p>John F. Woods</p>
    </div>
@endsection

@section("scripts")
    <script src="/assets/content-tools.min.js"></script>
    <script src="/assets/editor.js"></script>
@endsection