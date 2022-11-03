@if(session()->has('message'))
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                System message
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="alert alert-{{ session()->get('message')['type']}} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('message')['message']}}
                </div>
            </div>
            <!-- .panel-body -->
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endif