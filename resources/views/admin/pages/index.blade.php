@extends('templates.admin.master.layout') 

@section('seo-title') 
<title>All users {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
@endsection 
<!-- DataTables CSS -->
<link href="/templates/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="/templates/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
@section('plugins-css') 

@endsection 

@section('custom-css') 

@endsection 

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Pages</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
@include('templates.admin.partials.message')
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="padding: 10px;"> 
            @if(count($data)>0)
            <table width="100%" class="table table-striped table-bordered table-hover" id="pages-table">
                <thead>
                    <tr>
                        <th style="text-align: center">Image</th>
                        <th style="text-align: center">Title</th>
                        <th style="text-align: center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr class="odd gradeX">
                        <td>{{$value->image}}</td>
                        <td>{{$value->title}}</td>
                        <td class="center mojtip" style="text-align: center">
                            @if($value->page_id==0)
                            <a data-placement="top" data-original-title="Subpages" class="btn btn-sm btn-info" href="{{route('pages',['page'=>$value->id])}}"><i class="fa fa-list-ol"></i></a>
                            @endif
                            &nbsp;
                            <a data-placement="top" data-original-title="edit page" class="btn btn-sm btn-success" href="{{route('pages-edit',['page'=>$value->id])}}"><i class="fa fa-wrench"></i></a>
                            @if($value->active==0)
                            &nbsp;
                            <a data-button-title='Show' data-placement="top" data-original-title="Show page {{$value->title}}" class="btn btn-sm btn-warning" data-href="{{route('pages-active',['page'=>$value->id])}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-calendar-plus-o"></i></a>
                            &nbsp;
                            @else
                            &nbsp;
                            <a data-button-title='Hide' data-placement="top" data-original-title="Hide page {{$value->title}}" class="btn btn-sm btn-success" data-href="{{route('pages-active',['page'=>$value->id])}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-calendar-minus-o"></i></a>
                            &nbsp;
                            @endif
                            <a data-button-title='Delete' data-placement="top" data-original-title="Delete page {{$value->title}}" data-href="{{route('pages-delete',['page'=>$value->id])}}"  data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-warning">
                Nema unetih stranica
                <a href="{{route('pages-create')}}">Create page</a>
            </div>
            @endif
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete admin user</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('plugins-js')
<!-- DataTables JavaScript -->
<script src="/templates/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/templates/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="/templates/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
$(document).ready(function () {
    $('#pages-table').DataTable({
        responsive: true,
        "columnDefs": [
            {'orderable': false, 'targets': [0, 2]},
            {'searchable': false, 'targets': [0, 2]}
        ]
    });
});

$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var originalTitle = button.data('original-title'); // Extract info from data-* attributes
    //var userId = button.data('userid');
    var href = button.data('href');
    var buttonTitle = button.data('button-title');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text(originalTitle);
    modal.find('.modal-body').text('Da li ste sigurni da zelite da : ' + originalTitle + '?');
    //modal.find('.modal-footer .btn-danger').attr('href','/users/delete/'+userId);jedan od primera
    modal.find('.modal-footer .btn-danger').attr('href', href);
    modal.find('.modal-footer .btn-danger').text(buttonTitle);
});

$('.mojtip').tooltip({
    selector: "[data-placement=top]",
    container: "body"
});
</script>
@endsection

@section('custom-js') 

@endsection

















