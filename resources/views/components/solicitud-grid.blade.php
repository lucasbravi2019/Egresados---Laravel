@props(['editable' => false, 'solicitudes', 'text'])


@if (count($solicitudes) > 0)
    <h3 class="font-semibold text-xl text-gray-800 leading-tight text-center py-2 my-2">{{ $text }}</h3>
    <table class="table-auto w-full text-center">
        <thead>
            <tr>
                <th class="p-5">Carrera</th>
                <th class="p-5">Usuario</th>
                <th class="p-5">Estado</th>
                @if ($editable)
                    <th class="p-5">Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
            <tr class="bg-white py-2 gap-2">
                <td class="p-3 border-solid border-2">{{$solicitud->career->description}}</td>
                <td class="p-3 border-solid border-2">{{$solicitud->user->email}}</td>
                <td class="p-3 border-solid border-2">{{$solicitud->status}}</td>
                @if ($editable)
                    <td class="p-3 border-solid border-2 flex align-center justify-center">
                        <form method="POST" action="{{route('solicitud.approve', $solicitud->id)}}" class="text-xl p-2 flex-inline">
                            @csrf
                            @method('PUT')

                            <button type="submit">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>
                        <form method="POST" action="{{route('solicitud.reject', $solicitud->id)}}" class="text-xl p-2 flex-inline">
                            @csrf
                            @method('PUT')

                            <button type="submit">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
