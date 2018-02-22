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
                            <h3>{{ Session::get('message') }}</h3>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Manufacture Name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($products as $product)
                                    <tr class="odd gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->manufacturer_name }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->product_quantity }}</td>
                                        <td>{{ $product->publication_status == 1 ? 'Published':'Unpublished'}}</td>
                                        <td class="center">
                                                 @if($product->publication_status == 1)
                                            
                                            <a href="" title="view" class="btn btn-primary btn-sm">
                                                 <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>

                                         
                                            @else

                                            <a href="" title="view"  class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>

                                           

                                            @endif

                                             <a href="{{ url('/product/view/'.$product->id) }}" title="view" class="btn btn-success btn-sm">
                                                <span class="glyphicon glyphicon-info-sign"></span>
                                            </a>


                                             <a href="{{ url('/product/edit/'.$product->id) }}" title="Edit" class="btn btn-success btn-sm">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>

                                             <a href="{{ url('/product/delete/'.$product->id) }}" title="delete" class="btn btn-danger btn-sm">
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