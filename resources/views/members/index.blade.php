@extends('layouts.app')
@section('title', 'Members')
@section('blade', 'members.index')
@section('content')
  <h1 class="mt-4">Members List</h1>
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  {{ $table }}
@endsection
