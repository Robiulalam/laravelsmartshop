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
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Order Total</th>
                                        <th>Order Status</th>
                                        <th>Payment Type</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($orders as $orders)
                                    <tr class="odd gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $orders->order_id }}</td>
                                        <td>{{ $orders->first_name.' '.$orders->last_name }}</td>
                                        <td>{{ $orders->order_total }}</td>
                                        <td>{{ $orders->order_status }}</td>
                                        <td>{{ $orders->payment_type }}</td>
                                        <td>{{ $orders->payment_status }}</td>
    
                                        
                                        <td class="center">
                                              

                                             <a href="" title="view order" class="btn btn-success btn-sm">
                                                <span class="glyphicon glyphicon-zoom-in"></span>
                                            </a>


                                             <a href="" title="view order invoice" class="btn btn-primary btn-sm">
                                                <span class="glyphicon glyphicon-zoom-out"></span>
                                            </a>

                                             <a href="" title="download order" class="btn btn-success btn-sm">
                                                <span class="glyphicon glyphicon-download"></span>
                                            </a>

                                            <a href="" title="edit order" class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>

                                            <a href="" title="delete order" class="btn btn-danger btn-sm">
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