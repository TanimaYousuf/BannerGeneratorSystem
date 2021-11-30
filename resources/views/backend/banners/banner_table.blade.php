<table class="table">
    <thead>
    <tr>
        <th>SL</th>
        <th  style="width:45%; word-break:break-word;">Title</th>
        <th  style="width:10%;">Impressions</th>
        <th  style="width:10%;">Clicks</th>
        <th  style="width:10%;">CTR</th>
        <th  style="width:10%;">Created At</th>
        <th  style="width:15%;">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($banners as $banner)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$banner->title}}</td>
            <td>{{($banner->impressions > 0) ? $banner->impressions : '0'}}</td>
            <td>{{($banner->clicks > 0) ? $banner->clicks : '0'}}</td>
            <td>{{($banner->impressions > 0) ? $banner->clicks/$banner->impressions : '0'}}</td>
            <td>{{empty($banner->created_at) ? '' : date('d M, Y', strtotime($banner->created_at))}}</td>
            <td>
                <a class="Rectangle-Edit btn-hover2" style="text-decoration: none;" href="{{route('banners.show', $banner->id)}}"><i class="fa fa-eye" style="margin-right: 5px;"></i>View</a>
                <a class="Rectangle-Edit btn-hover2" style="text-decoration: none;" href="{{route('banners.edit', $banner->id)}}"><i class="fa fa-pencil" style="margin-right: 5px;"></i>Edit</a>
                <a class="Rectangle-Delete btn-hover2" style="text-decoration: none;" href="{{ route('banners.destroy', $banner->id) }}"
                    onclick="deleteData('delete-form-{{$banner->id}}')"><i class="fa fa-trash"></i>
                    Delete
                </a>

                <form id="delete-form-{{$banner->id}}" action="{{ route('banners.destroy', $banner->id) }}" method="POST" class="d-none" style="display: none">
                    @method('DELETE')
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>