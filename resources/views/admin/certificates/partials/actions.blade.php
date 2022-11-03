<td class="center mojtip" style="text-align: center">
    <a data-toggle="tooltip" data-placement="top" data-original-title="edit certificate" class="btn btn-sm btn-success" href="{{route('certificates-edit',['certificate'=>$certificate->id])}}"><i class="fa fa-wrench"></i></a> 
    <a data-button-title='Delete' data-placement="top" data-original-title="Delete certificate {{$certificate->title_eng}}" class="btn btn-sm btn-danger" data-href="{{route('certificates-delete',['certificate'=>$certificate->id])}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i></a>
</td>