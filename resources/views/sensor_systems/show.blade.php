<x-app-layout>
    <div class="flex justify-center w-full max-w-screen-xl m-auto bg-white">
        <div class="bg-white w-full max-w-screen-xl rounded shadow-sm text-xl p-4">
            <p class="w-full text-center">{{ucfirst($sensor_system->name)}}</p>

            <table class="w-full text-center m-4">
                <tr>
                    <td>Id</td>
                    <td>Ip Address</td>
                    <td>Status</td>
                </tr>

                <tr>
                    <td>{{$sensor_system->id}}</td>
                    <td>{{$sensor_system->ip_address}}</td>
                    <td>{{ucfirst($sensor_system->status)}}</td>
                </tr>
            </table>

            <table class="w-full text-center">
                <tr>
                    <td></td>
                    <td>Green</td>
                    <td>Yellow</td>
                    <td>Red</td>
                </tr>

                <tr>
                    <td>Lower</td>
                    <td>{{$sensor_system->green_lower}} °C</td>
                    <td>{{$sensor_system->yellow_lower}} °C</td>
                    <td>{{$sensor_system->red_lower}} °C</td>
                </tr>

                <tr>
                    <td>Upper</td>
                    <td>{{$sensor_system->green_upper}} °C</td>
                    <td>{{$sensor_system->yellow_upper}} °C</td>
                    <td>{{$sensor_system->red_upper}} °C</td>
                </tr>
            </table>
        </div>
    </div>
</x-app-layout>
