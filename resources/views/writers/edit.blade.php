@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Writer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($writer, ['route' => ['writers.update', $writer->id], 'method' => 'patch']) !!}

                        @include('writers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection