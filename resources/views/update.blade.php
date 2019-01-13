@extends('layouts.app')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">


@section('content')


<div class="container">

    <form action="{{$todo->id}}" method="post">

        @csrf
        @method("PATCH")

<div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input name="todoName" class="input" type="text" placeholder="Text input" value="{{$todo->todoName}}">
  </div>
</div>


<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">Submit</button>
  </div>
  <div class="control">
    <button onclick="location.href='/todolist/public'" class="button is-text">Cancel</button>
  </div>
</div>

</form>

@if ($errors->any())
<!-- <ul>   -->
<br> @foreach($errors->all() as $error)
<!-- <li>    -->


<div class="notification is-danger">
    <!-- <button class="delete"></button> -->
    {{$error}}
</div>


<!-- </li> -->


@endforeach
<!-- </ul> -->
@endif


</div>






@endsection                