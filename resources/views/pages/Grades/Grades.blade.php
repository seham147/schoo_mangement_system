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






{{-- <section class="content"> --}}
    <div class="row mycon" >
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
          </div>

          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
            اضافه مرحله دراسيه
          </button>

         

          @if ($errors->any())
          
          <div class="alert alert-danger" style="margin:auto ">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif



          @if (session()->has('success'))
    <div class="fixed bg-green-600 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{ session()->get('success') }}</p>
    </div>
@endif



          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>id</th>
                <th>المراحل الدراسيه</th>
                <th>ملاحظات</th>
                <th>Engine version</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($Grades as $g)
                  
                
              <tr>
                <td>{{ $g->id }}</td>
                <td>{{ $g->Name }}
                </td>
                <td>{{ $g->Note }}</td>
                <td> 
                  <button type="button" class="btn btn-sm  btn-sm btn-primary" data-toggle="modal" data-target="#edit{{ $g->id }}">
                    تعديل مرحله دراسيه
                  </button>


                </td>
                <td> 
                  <button type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#delete{{ $g->id }}">
                    مسح مرحله دراسيه
                  </button>
              </tr>
 
              </tbody>
              <div class="modal fade" id="edit{{ $g->id }}">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">تعديل المرحله الدراسيه</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('grades.update',$g->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                      <p>One fine body&hellip;</p>
                      <input type="text" placeholder="add name" value="{{ $g->id }}" name="id">
                      <input type="text" placeholder="add name" value="{{ $g->getTranslation('Name','ar') }}" name="Name">
                      <input type="text" placeholder="add name" value="{{ $g->getTranslation('Name','en') }}" name="Name_en">
                      <input type="text" placeholder="add note"value="{{ $g->Notes }}"  name="Notes">
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>


                <!-- deletttttttttttttttttttttttte   -->
              


              </td>
            </tr>

            </tbody>
            <div class="modal fade" id="delete{{ $g->id }}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">مسحpppppppppp المرحله الدراسيه</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form action="{{ route('grades.destroy',$g->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                    <p>DO YOU WANNA DELETEEEE&hellip;</p>
                    <input type="text" placeholder="add name" value="{{ $g->getTranslation('Name','ar') }}" name="Name">
                    <input class="form-control" type="hidden" name="id"  value="{{ $g->id }}"/>

                       
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">delete</button>
                  </div>
              </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
              @endforeach
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Large Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('grades.store') }}" method="POST">
                        @csrf
                  <p>One fine body&hellip;</p>
                  <input type="text" placeholder="add name" name="Name">
                  <input type="text" placeholder="add name" name="Name_en">
                  <input type="text" placeholder="add note" name="Notes">
                    
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->












@endsection



@section('scipts')
    
@endsection