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


            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('My_Classes_trans.add_class') }}
            </button>

            <button type="button" class="button x-small" id="btn_delete_all">
                {{ trans('My_Classes_trans.delete_checkbox') }}
            </button>


            <br><br>


            <br><br>


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                        onclick="CheckAll('box1', this)" /> </th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Class_rooms as $My_Class)
                                <tr>
                                    <td><input type="checkbox" value="{{ $My_Class->id }}" class="box1"></td>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $My_Class->Name_Class }}</td>
                                    <td>{{ $My_Class->Grade->Name }}</td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm  btn-sm btn-primary" data-toggle="modal"
                                            data-target="#edit{{ $My_Class->id }}">
                                            تعديل الفصول دراسيه
                                        </button>


                                        <button type="button" class="btn btn-sm  btn-sm btn-danger" data-toggle="modal"
                                            data-target="#delete{{ $My_Class->id }}">
                                            مسح الفصول دراسيه
                                        </button>

                                    </td>
                                </tr>


                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Grades_trans.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('Classrooms.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="repeater">
                                                            <div data-repeater-list="List_Classes">
                                                                <div data-repeater-item>
                                                                    <div class="row">

                                                                        <div class="col">
                                                                            <label for="Name"
                                                                                class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}
                                                                                :</label>
                                                                            <input class="form-control" type="text"
                                                                                name="Name" />
                                                                        </div>


                                                                        <div class="col">
                                                                            <label for="Name"
                                                                                class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
                                                                                :</label>
                                                                            <input class="form-control" type="text"
                                                                                name="Name_class_en" />
                                                                            <input class="form-control" type="hidden"
                                                                                name="id"
                                                                                value="{{ $My_Class->id }}" />
                                                                        </div>


                                                                        <div class="col">
                                                                            <label for="Name_en"
                                                                                class="mr-sm-2">{{ trans('My_Classes_trans.Name_Grade') }}
                                                                                :</label>

                                                                            <div class="box">
                                                                                <select class="fancyselect" name="Grade_id">
                                                                                    @foreach ($Grades as $Grade)
                                                                                        <option
                                                                                            value="{{ $Grade->id }}">
                                                                                            {{ $Grade->Name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                        </div>

                                                                        <div class="col">
                                                                            <label for="Name_en"
                                                                                class="mr-sm-2">{{ trans('My_Classes_trans.Processes') }}
                                                                                :</label>
                                                                            <input class="btn btn-danger btn-block"
                                                                                data-repeater-delete type="button"
                                                                                value="{{ trans('My_Classes_trans.delete_row') }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-20">
                                                                <div class="col-12">
                                                                    <input class="button" data-repeater-create
                                                                        type="button"
                                                                        value="{{ trans('My_Classes_trans.add_row') }}" />
                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                            </div>


                                                        </div>
                                                    </div>>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="delete{{ $My_Class->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">مسحpppppppppp المرحله الدراسيه</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Classrooms.destroy', 'test') }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <p>DO YOU WANNA DELETEEEE&hellip;</p>
                                                    {{-- <input type="text" placeholder="add name" value="{{ $g->getTranslation('Name','ar') }}" name="Name"> --}}
                                                    <input class="form-control" type="hidden" name="id"
                                                        value="{{ $My_Class->id }}" />

                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->





<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ trans('My_Classes_trans.delete_class') }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="{{ route('delete_all') }}" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">
            {{ trans('My_Classes_trans.Warning_Grade') }}
            <input class="text" type="hidden" id="delete_all_id" name="delete_all_id"
                value=''>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
            <button type="submit" class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
        </div>
        </form>
    </div>
</div>
</div>



    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('My_Classes_trans.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('Classrooms.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name" />
                                            </div>


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name_class_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_Grade') }}
                                                    :</label>

                                                <div class="box">
                                                    <select class="fancyselect" name="Grade_id">
                                                        @foreach ($Grades as $Grade)
                                                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Processes') }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="{{ trans('My_Classes_trans.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ trans('My_Classes_trans.add_row') }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                </div>


                            </div>
                        </div>
                    </form>




                </div>


            </div>



   


      

@endsection



@section('scripts')
    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                $("#datatable input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });
                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });
    </script>
@endsection
