@extends('templates.admin.master.layout') 

@section('seo-title') 
<title>All courses {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
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
        <h1 class="page-header">All courses </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
@include('templates.admin.partials.message')
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="padding: 10px;"> 
            @if(count($data)>0)
            <table width="100%" class="table table-striped table-bordered table-hover" id="students-table">
                <thead>
                    <tr> 
                        <th style="text-align: center">Duration srp</th>
                        <th style="text-align: center">Title srp</th>
                        <th style="text-align: center">Class</th>
                        <th style="text-align: center">Akcija</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr class="odd gradeX">
                        <td style='text-align: center'>{{$value->duration_srp}}</td>
                        <td style="text-align: center">{{$value->title_srp}}</td>
                        <td style="text-align: center">{{$value->class}}</td>
                        <td class="center mojtip" style="text-align: center">
                            <a data-toggle="tooltip" data-placement="top" data-original-title="edit course" class="btn btn-sm btn-success" href="{{route('courses-edit',['course'=>$value->id])}}"><i class="fa fa-wrench"></i></a> 
                            <a data-button-title='Delete' data-placement="top" data-original-title="delete course {{$value->name}}" class="btn btn-sm btn-danger" data-href="{{route('courses-delete',['course'=>$value->id])}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-warning">
                Nema unetih kurseva
                <a href="{{route('courses-create')}}"> >> unesi kurs  <<</a>
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
    $('#students-table').DataTable({
        responsive: true,
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
    modal.find('.modal-body').text('Are you shure you want to : ' + originalTitle + '?');
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

















