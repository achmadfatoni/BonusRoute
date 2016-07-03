<table>
    <tr>
        <td class="text-center">Description</td>
        <td class="text-center">Name</td>
        <td class="text-center">Email</td>
        <td class="text-center">Mobile Number</td>
        <td class="text-center">Total</td>
        <td class="text-center">Due Date</td>
        <td class="text-center">ID Number</td>
        <td class="text-center">Bank Account Number</td>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->description }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->total }}</td>
        <td>{{ $user->due_date }}</td>
        <td>{{ $user->id_number }}</td>
        <td>{{ $user->bank_account }}</td>
    </tr>
    @endforeach

</table>