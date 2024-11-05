<table class="table-auto w-full text-center">
    <thead>
        <tr>
            <th class="p-5">Email</th>
            <th class="p-5">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($emails as $email)
        <tr class="bg-white py-2 gap-2">
            <td class="p-3 border-solid border-2">{{$email->email}}</td>
            <td class="p-3 border-solid border-2 flex align-center justify-center">
                <x-nav-link :href="route('email.edit', $email->id)" class="text-xl p-2"><i class="fa-solid fa-pen-to-square"></i></x-nav-link>
                <form method="POST" action="{{route('email.destroy', $email->id)}}" class="text-xl p-2 flex-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
