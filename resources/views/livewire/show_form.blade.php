@extends('layouts.project.master')
@section('title')
@endsection


@section('css')
@endsection



@section('page_title1')
@endsection

@section('page_title2')
@endsection




@section('content')
    
       
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mb-30">

                            <livewire:add-parent />


                        </div>
                    </div> <!-- /.row (main row) -->

                </div><!-- /.container-fluid -->

            </section> <!-- /.content -->
         </div>  <!-- /.content-wrapper --


@endsection



@section('scripts')
@livewireScripts


@endsection
