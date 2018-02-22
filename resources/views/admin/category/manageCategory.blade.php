@extends('admin.master')

@section('content')



<div class="row">
              
            <hr/>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <h3 class="text-center">{{ Session::get('message') }}</h3>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Category Id</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($categories as $category)
                                    <tr class="odd gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->category_description }}</td>
                                        <td>{{ $category->publication_status == 1 ? 'Published':'Unpublished'}}</td>
                                        <td class="center">
                                            @if($category->publication_status == 1)
                                            <a href="" title="Unpublished" class="btn btn-primary btn-sm">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                            @else

                                            <a href="" title="Published" class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>

                                            @endif

                                            <a href="{{ url('/category/edit/'.$category->id) }}" title="Edit" class="btn btn-success btn-sm">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>

                                            <a href="{{ url('/category/delete/'.$category->id) }}" title="Edit" onclick="return confirm('Are you sure to delete this')" class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>

                                          


                                          

                                        </td>
                                    </tr>
                                      <?php $i++; ?>
                                   @endforeach
                                </tbody>
                             </table>
                            <!-- /.table-responsive -->
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

@endsection