<table class="table  table-borderless table-responsive">
    <tbody>
        <tr>
            <th>
                {{ trans('cruds.user.fields.id') }}
            </th>
            <td>
                {{ $user->id }}
            </td>
            <th class="border-left">
                Gender
            </th>
            <td>
                {{ $user->sex }}
            </td>
        </tr>
        <tr>
            <th>
                Name
            </th>
            <td>
                {{ $user->name }}
            </td>
            <th rowspan="2" class="border-left">
                Bio
            </th>
            <td rowspan="2" style="  white-space: normal !important; word-wrap: break-word;  ">
                {{ $user->bio }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.user.fields.email') }}
            </th>
            <td>
                {{ $user->email }}
            </td>
        </tr>
        <tr >
            <th>
                {{ trans('cruds.user.fields.created_at') }}
            </th>
            <td>
                {{ $user->created_at->format('Y-m-d')  }}
            </td>
            <th class="border-left">
                Phone Number
            </th>
            <td>
                {{ $user->phone }}
            </td>
        </tr>
        <tr>
            <th>
                Roles
            </th>
            <td>
                @foreach($user->roles as $id => $roles)
                  <span class="badge badge-info">{{ $roles->title }}</span>
                @endforeach
            </td>
            <th class="border-left">
                DOB
            </th>
            <td >
                {{ $user->dob  }}
            </td>
        </tr>
        <tr>
            <th>
                Country
            </th>
            <td>
                {{ $user->country }}
            </td>
            <th class="border-left">
                State
            </th>
            <td>
                {{ $user->state }}
            </td>
        </tr>
    </tbody>
</table>