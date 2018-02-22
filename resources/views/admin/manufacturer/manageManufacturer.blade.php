@extends('admin.master')

@section('content')



<div class="row">
              
            <hr/>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="text-center">{{ Session::get('message') }}</h5>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>manufacturer Id</th>
                                        <th>manufacturer Name</th>
                                        <th>manufacturer Description</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($manufacturer as $manufacturer)
                                    <tr class="odd gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $manufacturer->manufacturer_name }}</td>
                                        <td>{{ $manufacturer->manufacturer_description }}</td>
                                        <td>{{ $manufacturer->publication_status == 1 ? 'Published':'Unpublished'}}</td>
                                        <td class="center">
                                            @if($manufacturer->publication_status == 1)
                                            <a href="" title="Unpublished" class="btn btn-primary btn-sm">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                            @else

                                            <a href="" title="Published" class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>

                                            @endif

                                            <a href="{{ url('/manufacturer/edit/'.$manufacturer->id) }}" title="Edit" class="btn btn-success btn-sm">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>

                                            <a href="{{ url('/manufacturer/delete/'.$manufacturer->id) }}" title="Edit" onclick="return confirm('Are you sure to delete this')" class="btn btn-danger btn-sm">
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