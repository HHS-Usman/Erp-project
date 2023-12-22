@php
    use App\Helpers\MasterFormsHelper;
    $master = new MasterFormsHelper();
    
@endphp
@foreach ($data as $key => $row)
    @php
        $type = $row->type->type;
    @endphp
    <tr id="{{ $row->id }}">
        <td>{{ ++$key }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $type }}</td>

        <td>

            @if (!$row->tso)
                <div>
                    @can('User_List_Edit')
                        <a href="{{ route('users.edit', $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    @endcan
                    @can('User_List_Delete')
                        <button type="button" id="delete-user" data-url="{{ route('users.destroy', $row->id) }}"
                            class="btn btn-danger btn-sm">Delete</button>
                    @endcan
                </div>
            @endif
        </td>

    </tr>
@endforeach
