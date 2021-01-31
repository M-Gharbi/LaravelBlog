@extends('index')
@section('title',"")
@section('contant')

<div class="ml-auto">
<a href="{{ route('contacts.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
</div>
@include('contacts._filter')
<table class="table table-striped table-hover">

    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Post</th>
        <td scope="col">View </td>
      </tr>
    </thead>
    <tbody>
  @if ($message = session('message'))
      <div class="alert alert-success">{{ $message }}</div>
  @endif
@if ($contacts->count())
    @foreach ($contacts as $index => $contact)
        <tr>
            <th scope="row">{{ $index + $contacts->firstItem() }}</th>
            <td>{{ $contact->first_name }}</td>
            <td>{{ $contact->last_name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->post->title }}</td>
            <td width="150">
            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>  
            <a href="{{ route('contacts.destroy', $contact->id) }}" class="btn-delete btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>  
          </td>
        </tr>
    @endforeach

    <form id="form-delete" method="POST" style="display: none">
        @csrf
        @method('DELETE')
    </form> 
@endif
</tbody>

</table> 
</div>

</div>

</div>
@endsection
