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
        <h1 class="page-header">All users </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
@include('templates.admin.partials.message')
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="padding: 10px;"> 
            @if(count($data)>0)
            <table width="100%" class="table table-striped table-bordered table-hover" id="users-table">
                <thead>
                    <tr>
                        <th style="text-align: center">Ime i Prezime</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Telefon</th>
                        <th style="text-align: center">Rola</th>
                        <th style="text-align: center">Akcija</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr class="odd gradeX">
                        <td style="text-align: center">{{$value->name}}</td>
                        <td style="text-align: center">{{$value->email}}</td>
                        <td style="text-align: center">{{$value->phone}}</td>
                        <td style="text-align: center">{{ucfirst($value->role)}}</td>
                        <td class="center mojtip" style="text-align: center">
                            <a data-toggle="tooltip" data-placement="top" data-original-title="edit user" class="btn btn-sm btn-success" href="{{route('users-edit',['user'=>$value->id])}}"><i class="fa fa-wrench"></i></a> 
                            <a data-toggle="tooltip" data-placement="top" data-original-title="change password" class="btn btn-sm btn-warning" href="{{route('users-change-password',['user'=>$value->id])}}"><i class="fa fa-unlock"></i></a>
                            <a data-href="{{route('users-delete',['user'=>$value->id])}}" data-username="{{$value->name}}" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-warning">
                Nema unetih korisnika
            </div>
            @endif
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    $('#users-table').DataTable({
        responsive: true,
        "columnDefs": [
            {'orderable': false, 'targets': [2, 3, 4]},
            {'searchable': false, 'targets': [2, 4]}
        ]
    });
});

$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var userName = button.data('username'); // Extract info from data-* attributes
    //var userId = button.data('userid');
    var userHref = button.data('href');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-body').text('Da li ste sigurni da zelite da obrisete korisnika: ' + userName + '?');
    //modal.find('.modal-footer .btn-danger').attr('href','/users/delete/'+userId);jedan od primera
    modal.find('.modal-footer .btn-danger').attr('href', userHref);
});

$('.mojtip').tooltip({
    selector: "[data-toggle=tooltip]",
    container: "body"
});
</script>
@endsection

@section('custom-js') 

@endsection

















