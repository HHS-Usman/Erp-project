@foreach ($roles as $key => $row)
    <tr class="text-center">
        <td>{{ ++$key }}</td>
        <td>{{ $row->name }}</td>
        <td>
            <div>
                @can('Role_Edit')
                    <a href="{{ route('role.edit', $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                @endcan
                {{-- s<button type="button" id="delete-user" data-url="{{ route('designation.destroy', $row->id) }}"  class="btn btn-danger btn-sm">Delete</button> --}}
            </div>
        </td>
    </tr>
@endforeach
