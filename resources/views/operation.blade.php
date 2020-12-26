@extends('layouts.app')
@section('title', config('operation.'.$purpose.'.'.$operation.'.title'))
@section('blade', config('operation.'.$purpose.'.'.$operation.'.blade'))
@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h2>{{ config('operation.'.$purpose.'.'.$operation.'.header') }} - <small class="text-muted">{{ config('operation.'.$purpose.'.'.$operation.'.header-muted') }}</small></h2>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title"></h5> -->
            <!-- <p class="card-text">Book your stay now at the most magnificent resort in the world!</p> -->
            @if($operation != 'edit')
            <form action="{{ route(config('operation.'.$purpose.'.'.$operation.'.form.action')) }}" method="POST">
            @else
            <form action="{{ route(config('operation.'.$purpose.'.'.$operation.'.form.action'),['id' => $values->id]) }}" method="POST">
            @endif
                @csrf
                <div class="row">
                  @foreach (config('operation.'.$purpose.'.'.$operation.'.form.inputs') as $key => $input)
                  {{--dd($input)--}}
                  @if($input['newrow'])
                </div>
                <div class="row">
                  @endif
                    <div class="col-sm-{{$input['size']}}">
                        <div class="form-group">
                          @if($input['label'])
                            <label for="{{$input['for']}}">{{$input['label']}}</label>
                          @endif
                          {{--dd($values)--}}
                          @if(isset($values))
                            @php
                              $value = $input['value'];
                            @endphp
                          @endif
                            <{{$input['input']}} {{ $input['type'] ? 'type='.$input['type'] : '' }} class="{{$input['class']}}" name="{{$input['name']}}"
                            {{ ($input['value'] && isset($values)) ? 'value='.$values->$value : ($input['value'] ? 'value='.$input['value'] : '') }} {{ $input['placeholder'] ? 'placeholder='.$input['placeholder'] : '' }}>
                              @if($input['text'])
                                {{$input['text']}}
                              @endif
                          @if(isset($input['options']) && !empty($input['options']))
                            @foreach ($input['options'] as $key => $value)
                              <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                          @elseif(isset($input['option']) && !is_null($input['option']))
                          @php
                          $options = $input['option'];
                          @endphp
                            @foreach ($$options as $option)
                              <option value="{{$option->id}}">{{$option->name}}</option>
                            @endforeach
                            {{--var_dump($input['option'])--}}
                          @endif
                            </{{$input['input']}}>
                        </div>
                    </div>
                  @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
