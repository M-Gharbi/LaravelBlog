@extends('index')
@section('title',"")
@section('contant')
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
            </td>
        </tr>
    @endforeach
@endif
</tbody>

</table> 
</div>

</div>

</div>
@endsection
