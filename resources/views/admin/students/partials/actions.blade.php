<td class="center mojtip" style="text-align: center">
    <a data-toggle="tooltip" data-placement="top" data-original-title="edit student" class="btn btn-sm btn-success" href="{{route('students-edit',['student'=>$student->id])}}"><i class="fa fa-wrench"></i></a> 
    <a data-button-title='Delete' data-placement="top" data-original-title="Delete student {{$student->name}}" class="btn btn-sm btn-danger" data-href="{{route('students-delete',['student'=>$student->id])}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i></a>
</td> 