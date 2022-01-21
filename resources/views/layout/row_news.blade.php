<tr>
    <td>{{$news->title}}</td>
    <td>{{$news->user_id()->first()->name}}</td>
    <td>{{$news->desc}}</td>
    <td>{{!empty($news->deleted_at)?'Trashed':'published'}}</td>
    <td>{{$news->status}}</td>
    <td>

        <input type="checkbox" name="id[]" value="{{$news->id}}" >

    </td>
</tr>
