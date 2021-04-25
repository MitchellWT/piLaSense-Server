<x-app-layout>
    <div class="flex flex-col justify-center w-full gap-4">
        <div class="bg-white flex justify-center w-full rounded shadow-sm text-xl p-4">
            <a href="{{route('sensor_systems.create')}}" class="px-2">Create</a>
        </div>

        @forelse ($sensor_systems as $sensor_system)
            <div class="bg-white flex justify-between w-full rounded shadow-sm text-xl p-4">
                <p class="">{{ucfirst($sensor_system->name)}}</p>
                <p class="">{{ucfirst($sensor_system->status)}}</p>
                <p class="">{{$sensor_system->ip_address}}</p>

                <div class="flex justify-between">
                    <a href="{{route('sensor_systems.show', $sensor_system->id)}}" class="px-2">Inspect</a>
                    <a href="{{route('sensor_systems.edit', $sensor_system->id)}}" class="px-2">Edit</a>

                    <form action="{{route('sensor_systems.destroy', $sensor_system->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="px-2">Delete</a>
                    </form>
                </div>
            </div>


            <div class="w-full text-xl bg-white rounded shadow-sm">
                <p class="p-4">Recent reading for {{ucfirst($sensor_system->name)}}!</p>
                <div class="flex justify-between w-full p-4">
                    @forelse ($sensor_system->recent_sensor_datas(1) as $recent_sensor_data)
                        <table class="w-full text-center">
                            <tr>
                                <td>Time</td>
                                <td>DHT22 Temperature</td>
                                <td>DHT22 Humidity</td>
                                <td>BMP388 Temperature</td>
                                <td>BMP388 Pressure</td>
                                <td>BMP388 Altitude</td>
                            </tr>

                            <tr>
                                <td>{{$recent_sensor_data->created_at->format('d/m/Y h:i:s A')}}</td>
                                <td>{{$recent_sensor_data->dht22_temperature}} °C</td>
                                <td>{{$recent_sensor_data->dht22_humidity}} %</td>
                                <td>{{$recent_sensor_data->bmp388_temperature}} °C</td>
                                <td>{{$recent_sensor_data->bmp388_pressure}} hPa</td>
                                <td>{{$recent_sensor_data->bmp388_altitude}} M</td>
                            </tr>
                        </table>
                    @empty
                        <p>No data collected for {{$sensor_system->name}}!</p>
                    @endforelse
                </div>
            </div>

        @empty
            <div class="bg-white flex justify-center w-full rounded shadow-sm text-xl p-4">
                <p>No sensors found!</p>
            </div>

        @endforelse

    <div>
</x-app-layout>
