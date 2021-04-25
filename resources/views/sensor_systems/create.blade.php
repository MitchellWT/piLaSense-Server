<x-app-layout>
    <div class="w-full max-w-screen-xl bg-white rounded shadow-sm text-xl p-4 m-auto mb-4">
        <form action="{{route('sensor_systems.store')}}" method="POST" class="w-full max-w-screen-xl bg-white">
            @csrf

            <div class="py-2">
                <label class="w-full" for="name">Name</label>
                <input class="w-full" type="text" name="name" id="name"/>
            </div>

            <div class="py-2">
                <label class="w-full" for="ip_address">Ip Address</label>
                <input class="w-full" type="text" name="ip_address" id="ip_address"/>
            </div>

            <p>Green LED</p>
            <div class="flex py-2">
                <div class="w-1/2 pr-2">
                    <label class="w-full" for="green_lower">Lower Temperature</label>
                    <input class="w-full" type="number" name="green_lower" id="green_lower"/>
                </div>

                <div class="w-1/2 pl-2">
                    <label class="w-full" for="green_upper">Upper Temperature</label>
                    <input class="w-full" type="number" name="green_upper" id="green_upper"/>
                </div>
            </div>

            <p>Yellow LED</p>
            <div class="flex py-2">
                <div class="w-1/2 pr-2">
                    <label class="w-full" for="yellow_lower">Lower Temperature</label>
                    <input class="w-full" type="number" name="yellow_lower" id="yellow_lower"/>
                </div>

                <div class="w-1/2 pl-2">
                    <label class="w-full" for="yellow_upper">Upper Temperature</label>
                    <input class="w-full" type="number" name="yellow_upper" id="yellow_upper"/>
                </div>
            </div>

            <p>Red LED</p>
            <div class="flex py-2">
                <div class="w-1/2 pr-2">
                    <label class="w-full" for="red_lower">Lower Temperature</label>
                    <input class="w-full" type="number" name="red_lower" id="red_lower"/>
                </div>

                <div class="w-1/2 pl-2">
                    <label class="w-full" for="red_upper">Upper Temperature</label>
                    <input class="w-full" type="number" name="red_upper" id="red_upper"/>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-black text-white rounded shadow-sm text-center w-full p-2">Create Sensor System</button>
            <div>
        </form>
    </div>
</x-app-layout>
