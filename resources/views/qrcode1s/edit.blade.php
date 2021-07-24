@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Qrcode1
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($qrcode1, ['route' => ['qrcode1s.update', $qrcode1->id], 'method' => 'patch']) !!}

                        @include('qrcode1s.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection